<?php 
include("./include/connect.php");

// $booking = $_POST['imgBook'];
// echo $bookname;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
    <link rel="stylesheet" href="./include/style.css">
</head>
<body>
    <div class="contaniner">
        <form action="searchBook.php" method="post">
        <input type="text" name="search" ><input type="submit" name="submit" value="Search"><br><br>

        </form>
    <form action="index.php" method="post" enctype="multipart/form-data">
    <label for="name">ชื่อหนังสือ :</label> <input type="text" name="nameBook"><br>
    <label for="name">ราคาหนังสือ : </label>  <input type="number"  name="priceBook"><br>
    <label for="file">รูปภาพหนังสือ :</label> <input type="file" name="imgBook"><br>
    <input type="submit" name="submit" value="submit"><br>
    </form>
    <?php 
        if(isset($_POST['nameBook']) && isset($_POST['priceBook'])){
            $bookname = $_POST['nameBook'];
            $bookprice = $_POST['priceBook'];
            if( $bookname != "" && $bookprice != ""){
                $sql = "INSERT INTO book(book_name,book_price,book_img) VALUES('$bookname','$bookprice','')";
                $result = mysqli_query($con,$sql);
                
                if($result){
                    echo "<br/> <span class='success'>เพิ่มข้อมูลสำเร็จ </span>";
                }else{
                    echo "<br/> <span class='danger'>เพิ่มข้อมูลไม่สำเร็จ </span>";
                }
                mysqli_close($con);
                unset($bookname);
                unset($bookprice);

                header("Location:index.php");
            }else{
                echo "<br/> <span class='danger'>กรุณากรอกข้อมูลไห้ครบถ้วน </span>";
            }

        }
        ?>
    </div>
    <h2>รายชื่อหนังสือทั้งหมด</h2> 
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
        $SELECT = "SELECT * FROM book;";
        $data = mysqli_query($con,$SELECT);
        while( $row = mysqli_fetch_array($data)){
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
    </div>
    <br><br>
    


</body>
</html>