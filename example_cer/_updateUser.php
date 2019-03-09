<?php 
include("./include/connect.php");

$id = $_POST['book_id'];
$name = $_POST['nameBook'];
$price = $_POST['priceBook'];
$img = $_POST['imgBook'];

$sql = "UPDATE book SET book_name='$name',book_price='$price',book_img='$img' where book_id='$id'";
$result = mysqli_query($con,$sql);
if($result){
    echo "Complete";
}
header("Location:index.php");
                
?>