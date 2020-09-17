<?php
include_once ("Functions.php");
include_once ("../DBInformation/dbInf.php");
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$difference=time()-$_SESSION["uploadTime"];
if($difference>1800){
    $generalDir=ini_get("upload_tmp_dir")."/upload/";
    unlink($generalDir.$_SESSION["qFile"]);
    unlink($generalDir.$_SESSION["aFile"]);
    foreach($_SESSION as $key => $value){
        if($key=="username" || $key=="type" || $key=="logged_in") continue;
        else{
            unset($_SESSION[$key]);
        }
    }
    header("location: ../../Pages/adminPanel/createExam.php?error=timeUp");
    die();
}

checkSelectedOptions();
addAllToDb();
header("location: ../../Pages/adminPanel/adminPanel.php");












