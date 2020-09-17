<?php
include_once ("../../includes/DBInformation/dbInf.php");
$mysql=new mysqli(host,username,password,dbname);

$result=$mysql->query("SELECT `qDir`,`aDir` FROM `exam` WHERE `accept`=0");
while ($rows=$result->fetch_assoc()){
    unlink($rows["qDir"]);
    unlink($rows["aDir"]);
}
$result=$mysql->query("SELECT `examId` FROM `exam` ORDER BY (`examId`) DESC LIMIT 1 ");
while($rows=$result->fetch_assoc()){
    echo $rows["examId"];
}

$mysql->query("DELETE FROM `exam` WHERE `accept`=0");







