<?php
include_once ("../DBInformation/dbInf.php");

$mysql=new mysqli(host,username,password,dbname);
if(isset($_GET["examId"])){
    $examId=$_GET["examId"];
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $username=$_SESSION["username"];
    $select=$mysql->query("SELECT `examId`,`accept`,`finished` FROM `examrequest` WHERE `username`='$username' AND `examId`='$examId'");

    if($select->num_rows==0){
        $result=$mysql->query("SELECT `duration` FROM `exam` WHERE `examId`=$examId");
        $row=$result->fetch_assoc();
        $time=$row["duration"]*60;
        $result=$mysql->query("INSERT INTO `examrequest` (`examId`,`username`,`time`) VALUES ('$examId','$username','$time')");
        echo "update";
    }else{
        $row=$select->fetch_assoc();
        if($row["accept"]==0){}
        elseif($row["accept"]==1){
                if($row["finished"]==0) {
                    $_SESSION["examId"] = $examId;
                    $mysql->query("UPDATE `examrequest` SET `attendance`=1 WHERE `username`='$username' AND `examId`='$examId'");
                    echo "exam";
                }else{
                    echo "result";
                }
        }
    }
}


$mysql->close();


