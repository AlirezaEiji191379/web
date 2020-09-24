<?php
include_once ("../DBInformation/dbInf.php");

function examCorrection($username,$examId){
    $mysql=new mysqli(host,username,password,dbname);
    $result=$mysql->query("SELECT `question`,`answer` FROM `userkey` WHERE `username`='$username' AND `examId`='$examId'");
    $percent=0;
    if($result->num_rows==0){
        $mysql->query("INSERT INTO `rank` (`examId`,`username`,`percent`) VALUES ('$examId','$username','$percent')");
        return;
    }
    $userAnswer=array();
    while ($rows=$result->fetch_assoc()){
        $userAnswer[$rows["question"]]=$rows["answer"];
    }
    $examAnswer=array();
    $result=$mysql->query("SELECT `question`,`answer` FROM `answerkey` WHERE `examId`='$examId'");
    while ($rows=$result->fetch_assoc()){
        $examAnswer[$rows["question"]]=$rows["answer"];
    }
    $true=0;
    $false=0;
    $empty=0;
    for($i=1;$i<count($examAnswer)+1;$i++){
        if($userAnswer[$i]==0){
            $empty++;
            continue;
        }
        if($userAnswer[$i]==$examAnswer[$i]){
            $true++;
        }else if($userAnswer[$i]!=$examAnswer[$i]) {
            $false++;
        }
    }
    $percent=((($true*3)-$false)/(count($examAnswer)*3))*100;
    $mysql->query("INSERT INTO `rank` (`examId`,`username`,`percent`) VALUES ('$examId','$username','$percent')");
    $mysql->close();
}



