<?php
include_once("../DBInformation/dbInf.php");
function setRank($examId)
{
    $mysql = new mysqli(host, username, password, dbname);
    $updater = new mysqli(host, username, password, dbname);
    $mysql->query("DELETE FROM `userkey` WHERE `examId`='$examId'");
    $result = $mysql->query("SELECT `username`,`percent` FROM `rank` WHERE `examId`='$examId' ORDER BY `percent` DESC");
    $rank = 0;
    $grade = -100;
    while ($rows = $result->fetch_assoc()) {
        if ($grade != $rows["percent"]) {
            $grade = $rows["percent"];
            $rank++;
        }
        $username = $rows["username"];
        $updater->query("UPDATE `rank` SET `rank`='$rank' WHERE `examId`='$examId' AND `username`='$username'");
    }
    $mysql->query("UPDATE `exam` SET `corrected`=1 WHERE `examId`='$examId'");
    $updater->close();
    $mysql->close();
}

function modifyAllDeprecatedExam(){
    $mysql=new mysqli(host,username,password,dbname);
    $result=$mysql->query("SELECT `examId`,`endTime` FROM `exam` WHERE `corrected`=0");
    while ($rows=$result->fetch_assoc()){
        $id=$rows["examId"];
        $endTime=$rows["endTime"];
        if(time()>$endTime)setRank($id);
    }
    $mysql->close();
}

modifyAllDeprecatedExam();





