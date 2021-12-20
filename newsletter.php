<?php
include "config.php";
if(isset($_POST["post"]))
$email=$_POST["email"];
$sql="insert into newsletter(email) values('email')";
$connect->query($sql);
?>