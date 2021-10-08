<?php 

$localhost="localhost";
$username="root";
$password="";
$database="testing";


$conn=mysqli_connect($localhost,$username,$password,$database);

$query = "CREATE TABLE IF NOT EXISTS student(
    `id` INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `age` VARCHAR(50),
    `city` VARCHAR(50)
)";
    mysqli_query($conn, $query);