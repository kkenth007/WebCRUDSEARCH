<?php
$server = "localhost";
$user = "root";
$password = "";
$dbName = "bookdb";
    $con = mysqli_connect($server,$user,$password,$dbName);
    mysqli_set_charset($con,"utf8");
    if(!$con){
        echo "Error ";
    }


?>