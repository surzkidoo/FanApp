<?php session_start();

include "config.php";

$username=$_POST["email"];
$password=$_POST["password"];


$sql="SELECT * from  user WHERE email='$username' and password='$password'";
$result=$connect->query($sql);
$user=$result->fetch_assoc();
if($username==$user["email"] && $password==$user["password"]){
    $_SESSION["userid"]=$user['id'];
    $_SESSION["auth"]=true;
    $_SESSION["role_id"]=$user["role_id"];
    $_SESSION["username"]=$user['stagename'];
    header("location:index.php");


}
else{
    $_SESSION["error"]="Email or password Entered is incorrect";
    header("location:login.php");
}


?>