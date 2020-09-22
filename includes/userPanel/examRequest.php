<?php
include_once ("../DBInformation/dbInf.php");

$mysql=new mysqli(host,username,password,dbname);

if(isset($_GET["examId"])){
    $examId=$_GET["examId"];
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $username=$_SESSION["username"];
    $select=$mysql->query("SELECT `examId`,`accept` FROM `examrequest` WHERE `username`='$username' AND `examId`='$examId'");

    if($select->num_rows==0){
        $result=$mysql->query("INSERT INTO `examrequest` (`examId`,`username`) VALUES ('$examId','$username')");
    }else{



    }

}


$mysql->close();


