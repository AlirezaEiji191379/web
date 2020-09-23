<?php
include_once ("../DBInformation/dbInf.php");
$mysql=new mysqli(host,username,password,dbname);
$json=file_get_contents('php://input');
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$update=null;
$examId=$_SESSION["examId"];
$username=$_SESSION["username"];
$obj=json_decode($json);
$arr=$obj->answers;
$time=$obj->time;
$result=$mysql->query("SELECT `username` FROM `userkey` WHERE `username`='$username' AND `examId`='$examId'");
if($result->num_rows==0) $update=0;
else $update=1;
$mysql->query("UPDATE `examrequest` SET `time`='$time' WHERE `username`='$username' AND `examId`='$examId'");

for($i=1;$i<count($arr);$i++){
    if(isset($arr[$i])==false){
        $ans=0;
    }else{$ans=$arr[$i];}
    if($update==0){
        $mysql->query("INSERT INTO `userkey` (`examId`,`username`,`question`,`answer`) VALUES ('$examId','$username','$i','$ans')");
    }else{
        $mysql->query("UPDATE `userkey` SET `answer`='$ans' WHERE `username`='$username' AND `examId`='$examId' AND `question`='$i'");
    }
}

$mysql->close();