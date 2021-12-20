<?php include "config.php";
$sql="select * from user ";
$result=$connect->query($sql);
echo "number of rows.$result->num_rows";
$row=$result->fetch_assoc();
$userid=$row["fullname"];
echo $userid;
echo "right";
echo$connect->error;
echo"nage";


?>

