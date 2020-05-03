<?php
$severName = "localhost";
$userName = "root";
$pdword = "";
$dbName = "facebook";

$conn = mysqli_connect($severName,$userName,$pdword,$dbName);

if(!$conn){
    die("It didn't connect with data base");
}
?>
