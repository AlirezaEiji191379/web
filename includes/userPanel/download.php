<?php
include_once ("../DBInformation/dbInf.php");
function downloadExamFile($examId){
    $mysql=new mysqli(host,username,password,dbname);
    $result=$mysql->query("SELECT `qDir` FROM `exam` WHERE `examId`='$examId'");
    $row=$result->fetch_assoc();
    $qDir=$row["qDir"];
    $filename="raamaanExam.pdf";
    $len=filesize($qDir);
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Type:application/pdf");
    header("Content-Disposition: attachment; filename=$filename;");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$len);
    @readfile($qDir);
    exit();
}

function downloadAnswerFile($examId){
    $mysql=new mysqli(host,username,password,dbname);
    $result=$mysql->query("SELECT `aDir` FROM `exam` WHERE `examId`='$examId'");
    $row=$result->fetch_assoc();
    $aDir=$row["aDir"];
    $filename="raamaanExam.pdf";
    $len=filesize($aDir);
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Type:application/pdf");
    header("Content-Disposition: attachment; filename=$filename;");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$len);
    @readfile($aDir);
    exit();
}
function validation($username,$examId,$type){
    $mysql=new mysqli(host,username,password,dbname);
    $result=$mysql->query("SELECT * FROM `examrequest` WHERE `username`='$username' AND `examId`='$examId'");
    if($result->num_rows==0) return false;
    $rows=$result->fetch_assoc();
    $accept=$rows["accept"];
    if($accept==0) return false;
    $exam=$mysql->query("SELECT `endTime`,`startTime` FROM `exam` WHERE `examId`='$examId'");
    $rows=$exam->fetch_assoc();
    $start=$rows["startTime"];
    $end=$rows["endTime"];
    if($type=="qDir" && time()<$start) return false;
    if($type=="aDir" && time()<$end) return  false;
    return true;
}


if(isset($_GET["file"])){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    if(isset($_SESSION["examId"]))$examId=$_SESSION["examId"];
    else{
        $examId=$_GET["examId"];
    }
    echo $_SESSION["username"];
    if($_GET["file"]=="qDir"){
        if(validation($_SESSION["username"],$examId,"qDir")==true)downloadExamFile($examId);

    }elseif($_GET["file"]=="aDir"){
        if(validation($_SESSION["username"],$examId,"aDir")==true)downloadAnswerFile($examId);
    }
}


