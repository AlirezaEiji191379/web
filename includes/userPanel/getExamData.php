<?php
include_once ("../DBInformation/dbInf.php");
$mysql=new mysqli(host,username,password,dbname);
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$examId=$_SESSION["examId"];
$username=$_SESSION["username"];
$result=$mysql->query("SELECT `points`,`endTime` FROM `exam` WHERE `examId`='$examId'");
$row=$result->fetch_assoc();
$points=$row["points"];
$endTime=$row["endTime"];
$time=$endTime-time();
$arr["time"]=$time;
$arr["points"]=$points;
$x=$mysql->query("SELECT `question`,`answer` FROM `userkey` WHERE `examId`='$examId' AND `username`='$username'");
if($x->num_rows==0){}
else{
    while ($row = $x->fetch_assoc()) {
        $question = $row["question"];
        $answer = $row["answer"];
        $arr[$question] = $answer;
    }
}
echo json_encode($arr);
$mysql->close();