<?php 
include "config.php";

if (isset($_POST['follow'])) {
    $followid = $_POST['follow'];
    $followerid= $_POST["follower"];
    $result=$connect->query("select * from  follow where follower_id=$followerid and follows_id=$followid");
    if($result->num_rows>0){
        $connect->query("delete from follow where follower_id=$followerid and follows_id=$followid");
        echo 1;
    }
    else{
    $connect->query("insert into follow(follows_id,follower_id) values($followid,$followerid)");
        echo 2;
    }
}

?>