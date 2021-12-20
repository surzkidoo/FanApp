<?php 
include "config.php";

$id=$_GET["id"];
$sql="delete from user where id=$id";
$connect->query($sql);


?>