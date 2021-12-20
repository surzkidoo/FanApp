<?php 
include "config.php";
if(isset($_POST["post"])){

$to=$_POST["email"];
$header="";
$tokken=md5($to);
$subject="";
$message="
<p>Your email verification is https://orbvibes.com/verify.php?tokken=".$tokken."</p>";
$from="";
$Sql="insert into verfy_tokens(email,tokken) values('$email','$tokken')";
$connect->query($sql);

mail($to);
}
?>