<?php
include "config.phpx";

$list=file_get_contents("https://api.printful.com/countries");
$country=json_decode($list);
for($i=0;$i<245;$i++){
$cname=$country->result[$i]->name;
$ccode=$country->result[$i]->code;
$imagelink="https://www.countryflags.io/".$country->result[$i]->code."/shiny/64.png";
$sql="insert into country(name,code,image_link) values('$cname','$ccode','$imagelink')";
$connect->query($sql);
}
?>
