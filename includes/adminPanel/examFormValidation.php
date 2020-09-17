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
                            uploadExamFile();
                            uploadKeyFile();
                            saveToSession($startTime, $endTime);
                            header("location: ../../Pages/adminPanel/inputForm.php");
                        } else {
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








