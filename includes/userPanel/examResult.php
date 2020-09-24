<?php
include_once(__DIR__."/../DBInformation/dbInf.php");
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$username=$_SESSION["username"];
$examId=$_SESSION["examId"];
$mysql=new mysqli(host,username,password,dbname);
$result=$mysql->query("SELECT `percent` FROM `rank` WHERE `username`='$username' AND `examId`='$examId'");
$row=$result->fetch_assoc();
$percent=$row["percent"];






