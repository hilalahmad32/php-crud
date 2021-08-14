<?php 

include "connection.php";
session_start();
if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $username=$_POST["username"];
    $age=$_POST["age"];
    $city=$_POST["city"];

    $sql="UPDATE student SET username='{$username}',age='{$age}',city='{$city}' WHERE id={$id}";

    $run_sql=mysqli_query($conn,$sql);
    if($run_sql){
        $_SESSION["success"]="Data Update Successfully";
        header("location:../index.php");
    }else{
        $_SESSION["error"]="Data Not Update Successfully";
        header("location:../edit-data.php");

    }
}


?>