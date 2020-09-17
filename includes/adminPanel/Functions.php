<?php
include_once ("../DBInformation/dbInf.php");

function checkNotEmptyForm($arr){
    foreach ($arr as $key=>$value){
        if(empty($arr[$key])){
            return false;
        }
    }
    return true;
}

function checkNotEmptyFile($filename){
    if(empty($_FILES[$filename]["name"])){
        return false;
    }
    return true;
}

function compareDates($date,$start,$end,$now){
    $startTime=strtotime($date." ".$start);
    if($now==false){
        $endTime=strtotime($date." ".$end);
        if($startTime<$endTime){
            return true;
        }else return  false;

    }else{
        if($startTime>time()){
            return  true;
        }else return  false;
    }
}

function returnFormattedDate($date,$time){
    return strtotime($date." ".$time);
}

function saveToSession($start,$end){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $_SESSION["fname"]=$_POST["fname"];
    $_SESSION["points"]=$_POST["points"];
    $_SESSION["time"]=$_POST["time"];
    $_SESSION["startTime"]=$start;
    $_SESSION["endTime"]=$end;
}

function uploadExamFile(){
    $targetDir=ini_get("upload_tmp_dir");
    $target_File=ini_get("upload_tmp_dir")."/upload/".$_FILES["myFile"]["name"];
    $pdfFileType = strtolower(pathinfo($target_File,PATHINFO_EXTENSION));
    if($_FILES["myFile"]["size"]>40000000){
        header("location: ../../Pages/adminPanel/createExam.php?error=fileSize");
        die();
    }
    if($pdfFileType!="pdf"){
        header("location: ../../Pages/adminPanel/createExam.php?error=fileExt");
        die();
    }
    if(move_uploaded_file($_FILES["myFile"]["tmp_name"],$target_File)==false){
        header("location: ../../Pages/adminPanel/createExam.php?error=fileCancel");
        die();
    }else{
        $id=1;
        $mysql=new mysqli(host,username,password,dbname);
        $result=$mysql->query("SELECT `examId` FROM `exam` ORDER BY (`examId`) DESC LIMIT 1 ");

        while($rows=$result->fetch_assoc()){
                $id=$rows["examId"]+1;
            }

        $newDir=ini_get("upload_tmp_dir")."/upload/"."Q".$id.".pdf";
        rename($target_File,$newDir);
        $_FILES["myFile"]["name"]="Q".$id.".pdf";
    }
}

function uploadKeyFile(){
    $targetDir=ini_get("upload_tmp_dir");
    $target_File=ini_get("upload_tmp_dir")."/upload/".$_FILES["myFile2"]["name"];
    $pdfFileType = strtolower(pathinfo($target_File,PATHINFO_EXTENSION));
    if($_FILES["myFile2"]["size"]>40000000){
        header("location: ../../Pages/adminPanel/createExam.php?error=fileSize");
        die();
    }
    if($pdfFileType!="pdf"){
        header("location: ../../Pages/adminPanel/createExam.php?error=fileExt");
        die();
    }
    if(move_uploaded_file($_FILES["myFile2"]["tmp_name"],$target_File)==false) {
        header("location: ../../Pages/adminPanel/createExam.php?error=fileCancel");
        die();
    }else{
        $id=1;
        $mysql=new mysqli(host,username,password,dbname);
        $result=$mysql->query("SELECT `examId` FROM `exam` ORDER BY (`examId`) DESC LIMIT 1 ");
        if($result==false){
            $id=1;
        }else{
            while($rows=$result->fetch_assoc()){
                $id=$rows["examId"]+1;
            }
        }
        $newDir=ini_get("upload_tmp_dir")."/upload/"."A".$id.".pdf";
        rename($target_File,$newDir);
        $_FILES["myFile2"]["name"]="A".$id.".pdf";
    }
}

function checkSelectedOptions(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $points=$_SESSION["points"];
    $str="Question:";
    for ($i=1 ; $i<$points+1;$i++){
        if(isset($_POST[$str.$i])==false){
            header("location: ../../Pages/adminPanel/inputForm.php?error=emptyOption");
            die();
        }
    }
}

function addExamToDb()
{
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $fname=makeSafe($_SESSION["fname"]);
    $duration=makeSafe($_SESSION["time"]);
    $points=makeSafe($_SESSION["points"]);
    $startTime=makeSafe($_SESSION["startTime"]);
    $endTime=makeSafe($_SESSION["endTime"]);
    $qDir=ini_get("upload_tmp_dir")."/upload/".$_FILES["myFile"]["name"];
    $aDir=ini_get("upload_tmp_dir")."/upload/".$_FILES["myFile2"]["name"];
    $mysql=new mysqli(host,username,password,dbname);
    $accept=0;
    $statement=$mysql->prepare("INSERT INTO `exam` (`fname`,`points`,`duration`,`startTime`,`endTime`,`qDir`,`aDir`,`accept`) VALUES (?,?,?,?,?,?,?,?)");
    $statement->bind_param("siiiissi",$fname,$points,$duration,$startTime,$endTime,$qDir,$aDir,$accept);
    $statement->execute();
    $id=$statement->insert_id;
    $_SESSION["insert_Id"]=$id;
    $mysql->close();
}
function addKeyToDB(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $points=makeSafe($_SESSION["points"]);
    $mysql=new mysqli(host,username,password,dbname);
    $str="Question:";
    $result=$mysql->query("SELECT `examId` FROM `exam` ORDER BY (`examId`) DESC LIMIT 1 ");
    while($rows=$result->fetch_assoc()){
         $id=$rows["examId"];
    }
    for($i=1 ; $i<$points+1;$i++){
        $answer=$_POST[$str.$i];
        $mysql->query("INSERT INTO `answerkey` (`examId`,`question`,`answer`) VALUES ($id,$i,$answer)");
    }
    foreach($_SESSION as $key => $value){
        if($key=="username" || $key=="type" || $key=="logged_in") continue;
        else{
            unset($_SESSION[$key]);
        }
    }
    $mysql->query("UPDATE `exam` SET accept=1 WHERE `examId`=$id");
    $mysql->close();
}

function makeSafe($input){
    return stripcslashes(htmlspecialchars(trim($input)));
}

