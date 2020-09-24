<?php
include_once(__DIR__."/../DBInformation/dbInf.php");
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$examId=$_SESSION["examId"];
$mysql=new mysqli(host,username,password,dbname);
$result=$mysql->query("SELECT `endTime` FROM `exam` WHERE `examId`='$examId'");
$row=$result->fetch_assoc();
$endTime=$row["endTime"];
if(time()>=$endTime){
    header("location: ../before_exam/student.php");
}





