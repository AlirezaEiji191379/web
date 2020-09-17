<?php
include_once ("Functions.php");
if(checkNotEmptyForm($_POST)){
    if(checkNotEmptyFile("myFile")){
        if(checkNotEmptyFile("myFile2")) {
            if ($_POST["time"] > 0) {
                if ($_POST["points"] > 0) {
                    if (compareDates($_POST["birthday"], $_POST["appt"], $_POST["appt2"], false)) {
                        if (compareDates($_POST["birthday"], $_POST["appt"], null, true)) {
                            $startTime = returnFormattedDate($_POST["birthday"], $_POST["appt"]);
                            $endTime = returnFormattedDate($_POST["birthday"], $_POST["appt2"]);;
                            if($_POST["time"]*60 < $endTime-$startTime) {
                                saveToSession($startTime, $endTime);
                                uploadExamFile();
                                uploadKeyFile();
                                $_SESSION["fileUpload"]=1;
                                $_SESSION["uploadTime"]=time();
                                $_SESSION["qFile"]=$_FILES["myFile"]["name"];
                                $_SESSION["aFile"]=$_FILES["myFile2"]["name"];
                                addExamToDb();
                                header("location: ../../Pages/adminPanel/inputForm.php");
                            }else{
                                header("location: ../../Pages/adminPanel/createExam.php?error=duration");
                            }
                        }
                        else {
                            header("location: ../../Pages/adminPanel/createExam.php?error=date");
                        }
                    } else {
                        header("location: ../../Pages/adminPanel/createExam.php?error=wrongAppt");
                    }
                } else {
                    header("location: ../../Pages/adminPanel/createExam.php?error=points");
                }
            } else {
                header("location: ../../Pages/adminPanel/createExam.php?error=time");
            }
        } else{
            header("location: ../../Pages/adminPanel/createExam.php?error=emptyAFile");
        }
    }else{
        header("location: ../../Pages/adminPanel/createExam.php?error=emptyQFile");
    }
}else{
    header("location: ../../Pages/adminPanel/createExam.php?error=empty");
}