<?php 
 include "config.php";
$user_id=$_POST["user_id"];
$post_id=$_POST["post_id"];
$slug=$_POST["slug"];
$content=$_POST["comment"];

$sql="INSERT into comment(user_id,comment_content,post_id) values($user_id,'$content',$post_id)";
$connect->query($sql);
header("location:view-post.php?slug=$slug&id=$post_id");

?>