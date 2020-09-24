<?php
include_once(__DIR__."/../DBInformation/dbInf.php");
function getPercent($examId,$username){
    $mysql=new mysqli(host,username,password,dbname);
    $result=$mysql->query("SELECT `percent` FROM `rank` WHERE `examId`='$examId' AND `username`='$username'");
    $row=$result->fetch_assoc();
    return $row["percent"];
}

function getRank($examId,$username){
    $mysql=new mysqli(host,username,password,dbname);
    $result=$mysql->query("SELECT `rank` FROM `rank` WHERE `examId`='$examId' AND `username`='$username'");
    $row=$result->fetch_assoc();
    return $row["rank"];
}
function getExamTitle($examId){
    $mysql=new mysqli(host,username,password,dbname);
    $result=$mysql->query("SELECT `fname` FROM `exam` WHERE `examId`='$examId'");
    $row=$result->fetch_assoc();
    return $row["fname"];
}




