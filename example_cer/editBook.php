<?php 
include("./include/connect.php");
$id = $_GET['book_id']; 
$Update = "SELECT * FROM book where book_id='$id'";
$dataUP = mysqli_query($con,$Update)or die($con->error);
// $row = $dataUP->fetch_assoc();    
$row = mysqli_fetch_assoc($dataUP);
print_r($row);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<form action="_updateUser.php" method="post" >
    <label for="name">Book Name :</label> <input type="text" name="nameBook" value="<?php echo $row['book_name']?>"><br>
    <label for="name">Book Prices : </label>  <input type="number"  name="priceBook" value="<?php echo $row['book_price']?>"><br>
    <label for="file">Book Image :</label> <input type="file" name="imgBook" value="<?php echo $id; ?>"><br>
    <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
    <input type="submit" name="submit">
    </form>
   
</body>
</html>