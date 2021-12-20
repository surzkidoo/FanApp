<?php 
include "config.php";

$id=$_GET["id"];
$sql="delete from post where post_id=$id";
$connect->query($sql);

?>