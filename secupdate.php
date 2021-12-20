<?php include "config.php";
    $me=1;
    
    $re=$connect->query("select distinct
    least(too, fromm) as value1
  , greatest(too, fromm) as value2
from messages where fromm='$me' or too='$me' order by id desc");
$nee= array();
    while($re2=$re->fetch_assoc()){
        $val=$re2["value1"];
        $val2=$re2["value2"];
    if($val!=$val2){
        $jk;
        if($val==$me){
            $jk=$val2;
        }
        else{
            $jk=$val;
        }
    $sql=$connect->query("select user.id,image,msg,date,fullname from messages join user on user.id = ".$jk." where (fromm='$val' and too='$val2' ) or (fromm='$val2' and too='$val' )  order by messages.id desc");


   
$chunk=$sql->fetch_assoc();
    $nee[]=$chunk;
    
    
    }
}

      echo(json_encode($nee));

  
?>