<?php
include_once ("../DBInformation/dbInf.php");
include_once ("function.php");
$mysql=new mysqli(host,username,password,dbname);
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$update=null;
$examId=$_SESSION["examId"];
$username=$_SESSION["username"];
$mysql->query("UPDATE `examrequest` SET `finished`=1 WHERE `examId`='$examId' AND `username`='$username'");
$result=$mysql->query("SELECT `username` FROM `userkey` WHERE `username`='$username' AND `examId`='$examId'");
if($result->num_rows==0) $update=0;
else $update=1;
$result=$mysql->query("SELECT `points` FROM `exam` WHERE `examId`='$examId'");
$row=$result->fetch_assoc();
$points=$row["points"];
for($i=1;$i<$points+1;$i++){
    if(isset($_POST["Question:".$i])==false){
        $ans=0;
    }else{$ans=$_POST["Question:".$i];}
    if($update==0){
        $mysql->query("INSERT INTO `userkey` (`examId`,`username`,`question`,`answer`) VALUES ('$examId','$username','$i','$ans')");
    }else{
        $mysql->query("UPDATE `userkey` SET `answer`='$ans' WHERE `username`='$username' AND `examId`='$examId' AND `question`='$i'");
    }
}
examCorrection($username,$examId);
$mysql->close();
unset($_SESSION["examId"]);
header("location: ../../Pages/userPanel/Student/before_exam/student.php");









