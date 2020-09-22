<?php
include_once ("../DBInformation/dbInf.php");

$mysql=new mysqli(host,username,password,dbname);


if(isset($_GET["accept"])){
    $id=$_GET["accept"];
    $result=$mysql->query("UPDATE `examrequest` SET `accept`=1  WHERE `id`='$id' ");
}elseif(isset($_GET["decline"])){
    $id=$_GET["decline"];
    $result=$mysql->query("DELETE FROM `examrequest` WHERE `id`='$id'");
}
$mysql->close();


