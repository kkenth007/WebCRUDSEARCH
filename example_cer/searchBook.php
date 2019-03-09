<?php 
include("./include/connect.php");
if(isset($_POST['search'])){
    $find = mysqli_real_escape_string($con,trim(stripslashes($_POST['search'])));
    echo $find;
}else{
    $find='';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./include/style.css">
</head>
<body>
    <br><br>

<div class="box-show">
    <table>
    <tr>
        

    <!-- <th>ID</th> -->
    <th>ชื่อหนังสือ</th>
    <th>ราคาหนังสือ</th>
    <th>รูปภาพหนังสือ</th>
    <th>แก้ไข</th>
    <th>ลบ</th>
    </tr>

    <?php
        $sql = "SELECT * FROM book where book_name LIKE '%{$find}%'";
        $result = mysqli_query($con,$sql);
        $numrows = mysqli_num_rows($result);
        while( $row = mysqli_fetch_array($result)){
        ?>
        
<tr>
<!-- <td><?php //echo "{$row['book_id']}";?></td> -->
<td><?php echo "{$row['book_name']}";?></td>
<td><?php echo "{$row['book_price']} ฿";?></td>
<td>3</td>
<td><a href="editBook.php?book_id=<?php echo "{$row['book_id']}";?>" >แก้ไข</a></td>
<td><a href="delete.php?book_id=<?php echo "{$row['book_id']}";?>" >ลบ</a></td>
</tr>
        <?php }?>

</table>
<br><br>
<?php
if($numrows == 0){
    echo "ไม่พบในฐานข้อมูล";
}
?>
    </div>
</body>
</html>