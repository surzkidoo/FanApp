<?php session_start();

include "../config.php";
$name=$_POST["fname"];
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$role=$_POST["role"];

$sql="INSERT INTO user(username,fullname,password,email,phone,role)
VALUES('$username','$name','$password','$email','$phone',$role)";
$connect->query($sql);
header("location:../index.php");

?>