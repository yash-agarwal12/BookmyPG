<?php
session_start();
include './class/dbconnect.php';


if(isset($_GET['pgid'])){
    
    if(isset($_SESSION['user_id'])){
        
        $userid = $_SESSION['user_id'];
        $pgid = $_GET['pgid'];
        $q = mysqli_query($connection, "insert into tbl_bookmark (pg_id,user_id) values ('{$pgid}','{$userid}')") or die(mysqli_error($connection));
        header("location:bookmark.php");
    } else {
    
        header("location:login.php");
    }
    
}else
{
    header("location:home.php");
}

?>
