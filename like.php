<?php 
include "config.php";

    $postid = $_POST['postid'];
    $userid=$_POST['userid'];
    $result = $connect->query("SELECT * FROM post WHERE post_id=$postid");
    $row =$result->fetch_assoc();
    $n = $row['post_like'];
    $result=$connect->query("select * from like_table where user_id=$userid and post_id=$postid");
    if($result->num_rows>0){
    $connect->query("delete from like_table where user_id=$userid and post_id=$postid");
    $type=0;
    }
    else{
    $connect->query("INSERT INTO like_table (user_id, post_id) VALUES(1, $postid)");
    $type=1;
    }
    $sql="select * from like_table where post_id=$postid";
    $result=$connect->query($sql);
    echo json_encode(array("nums"=>$result->num_rows,"type"=>$type));
?>