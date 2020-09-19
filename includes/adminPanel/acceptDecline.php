<?php
include_once ("../DBInformation/dbInf.php");

$mysql=new mysqli(host,username,password,dbname);


if(isset($_GET["accept"])){
    $username=$_GET["accept"];
    $result=$mysql->query("UPDATE `users` SET `accept`=1  WHERE `username`='$username' ");
}elseif(isset($_GET["decline"])){
    $username=$_GET["decline"];
    $result=$mysql->query("DELETE FROM `users` WHERE `username`='$username'");
}
$mysql->close();


