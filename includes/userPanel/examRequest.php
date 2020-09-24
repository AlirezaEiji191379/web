<?php
include_once ("../DBInformation/dbInf.php");
date_default_timezone_set("Asia/Tehran");
$mysql=new mysqli(host,username,password,dbname);
if(isset($_GET["examId"])){
    $examId=$_GET["examId"];
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $username=$_SESSION["username"];
    $select=$mysql->query("SELECT `examId`,`accept`,`finished` FROM `examrequest` WHERE `username`='$username' AND `examId`='$examId'");

    if($select->num_rows==0){
        $result=$mysql->query("SELECT `endTime` FROM `exam` WHERE `examId`=$examId");
        $row=$result->fetch_assoc();
        $result=$mysql->query("INSERT INTO `examrequest` (`examId`,`username`) VALUES ('$examId','$username')");
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
                    $_SESSION["examId"] = $examId;
                    echo "result";
                }
        }
    }
}


$mysql->close();


