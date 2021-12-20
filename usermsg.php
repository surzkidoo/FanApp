<?php


include "config.php";
    $too= $_POST["him"];
    $fromm=$_POST["me"];
    $re=$connect->query("select fromm,too,date,newmsg,msg,fullname,image from messages join user on messages.fromm=user.id where (fromm='$fromm' and too='$too')or (too='$fromm' and fromm='$too') and newmsg=0");
    if($re->num_rows>0){
        $nee= array();
    while($chunk=$re->fetch_assoc()){
        $nee[]=$chunk;
        
    }
   
    echo json_encode($nee);
    }
    
    


?>