<?php 

include "connection.php";
session_start();

if(isset($_GET["id"])){
    $id=$_GET["id"];

    $sql="DELETE FROM student WHERE id={$id}";
    $run_sql=mysqli_query($conn,$sql);
    if($run_sql){
        $_SESSION["success"]="Data Delete Successfully";
        header("location:../index.php");
    }
}


?>