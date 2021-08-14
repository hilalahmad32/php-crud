<?php 

include "connection.php";

session_start();
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $age=$_POST["age"];
    $city=$_POST["city"];

    $sql="INSERT INTO student (username,age,city) VALUES ('{$username}',{$age},'{$city}')";
    $run_sql=mysqli_query($conn,$sql);

    if($run_sql){
        $_SESSION["success"]="Data Add Successfully";
        header("location:../index.php");
    }else{
        $_SESSION["error"]="Data Not Add Successfully";
        header("location:../add-data.php");
    }

}


?>