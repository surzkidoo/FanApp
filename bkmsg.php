<?php 
include "config.php";

if (isset($_POST['message'])) {
    $message= $_POST['message'];
    $too= $_POST["him"];
    $fromm=$_POST["me"];
    if($connect->query("insert into messages(fromm,too,msg) values('$fromm','$too','$message')")===TRUE){
        echo "success";
    }
    else{
        echo "error";
    }
    
}

?>