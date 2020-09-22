<?php
include_once ("../DBInformation/dbInf.php");
$mysql=new mysqli(host,username,password,dbname);
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$examId=$_SESSION["examId"];
$result=$mysql->query("SELECT `duration` FROM `exam` WHERE `examId`='$examId'");
$row=$result->fetch_assoc();
$time=$row["duration"];
$arr["time"]=$time;
echo json_encode($arr);


$mysql->close();


