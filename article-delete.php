<?php 
include "config.php";
session_start();
if($_SESSION["auth"]){
    $id=$_SESSION["userid"];
}
$articleid=$_GET["id"];
$sql="delete from post where post_id=$articleid and user_id=$id";
if($connect->query($sql)===TRUE){
    $_SESSION["msg"]="Successfully Deleted";
    header("location:article-dashboard.php");
}
else{
    $_SESSION["msg"]="Delete Failed";
    header("location:article-dashboard.php");
}
?>