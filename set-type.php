<?php 
$type=$_GET["type"];
$id=$_GET["id"];
$sql="select id from user where id=$id and type_id is NULL";
if($result=$connect->query($sql)===TRUE){
    if($result->num_rows==0){
        header("location:index.php");
    }
    else{
        $sql="update "
    }
}
?>