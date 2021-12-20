<?php session_start(); $connect = new mysqli("localhost:3306","secretgist_Orbvibeser2","Pass@123@1", "secretgist_Orbvibes2");
$token=$_GET["verify-token"];
$sql="select token from verify where token=$token";
$result=$connect->query($sql);
$row=$result->fetch_assoc();echo "shit";
if($result->num_rows==0){$_SESSION["danger"]="Wrong Command Please Register";header("location:message.php");}
else{
    $email=$row["email"];
    $password=$row["password"];
    $name=$row["name"];
    $sql="insert into user(email,name,password) values('$email','$name','$password')";
    if($connect->query($sql)===TRUE){
        $sql="select * from user where password=$password and email=$email";
        if($connect->query($sql)===TRUE){
            $row=$result->fetch_assoc();
            $userid=$row["id"];
            echo "shit";
            header("location:setup.php");
        }
        else{
            $_SESSION["Error"]="Error while Creating a Account";
            header("location:message.php");
        }
    }
    else{
        $_SESSION["Error"]="Error while Creating a Account";
        header("location:message.php");
    }
    
}
?>