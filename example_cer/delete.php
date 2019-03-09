<?php 
include("./include/connect.php");
$id = $_GET['book_id'];
// echo $id;

$sql = "DELETE FROM book where book_id=$id";
$result = mysqli_query($con,$sql);
header("Location:index.php");
                
?>