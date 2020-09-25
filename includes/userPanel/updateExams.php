<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!--        <link rel="stylesheet" type="text/css" href="../../Pages/userPanel/Student/before_exam/studentStyle.css"/>-->
</head>

<body>
<?php
include_once(__DIR__."/../DBInformation/dbInf.php");
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
$username=$_SESSION["username"];

$selectRequest=new mysqli(host,username,password,dbname);
$selectExam=new mysqli(host,username,password,dbname);

$requestResult=$selectRequest->query("SELECT `examId`,`accept`,`attendance`,`finished` FROM `examrequest` WHERE `username`='$username'");
$examResult=$selectExam->query("SELECT * FROM `exam`");
$addedExams=null;
$examAttendance=null;
$examFinished=null;
if($requestResult->num_rows==0){
$zero=0;
}else{
    $zero=1;
    while ($request=$requestResult->fetch_assoc()){
        $addedExams[$request["examId"]]=$request["accept"];
        $examAttendance[$request["examId"]]=$request["attendance"];
        $examFinished[$request["examId"]]=$request["finished"];
    }
}

if($examResult->num_rows==0){}
else{
    while ($rows=$examResult->fetch_assoc()){
        $btnMessage="ثبت نام";
        $color="blue";
        $id=$rows["examId"];
        $display="block";
        $showLink="none";
        if($zero==1) {
            foreach ($addedExams as $key => $value) {
                if ($id == $key) {
                    if ($value == 0) {
                        $btnMessage = "در حال تایید";
                        $color="gray";
                        if($rows["startTime"]<time()) $display="none";
                    }
                    else if ($value == 1) {
                        if($examAttendance[$key]==0){
                            $btnMessage = "شرکت در آزمون";
                            $color="green";
                            if($rows["startTime"]>time()) $display="none";
                            if($rows["endTime"]<time()) $display="none";
                        }
                        elseif($examAttendance[$key]==1){
                            if($examFinished[$key]==0) {
                                $btnMessage = "ادامه آزمون";
                                $color = "purple";
                                if($rows["endTime"]<time()) $display="none";
                            }else{
                                $corrected=$rows["corrected"];
                                $btnMessage = "نتیجه";
                                $color = "dodgerBlue";
                                if($corrected==0) $display="none";
                                $showLink="inline";
                            }

                        }
                    }
                }
            }
        }
        $title=$rows["fname"];
        $points=$rows["points"];
        $startTime=date('تاریخ آغاز آزمون:Y/m/d ساعت: H:i',$rows["startTime"]);
        $endTime=date('تاریخ پایان آزمون:Y/m/d ساعت: H:i',$rows["endTime"]);
        echo "
        <div class=\"card\" style=\"width: 27rem;\">
        <div class=\"card-body\">
        <h5 class=\"card-title\">$title</h5>
        <h6 class=\"card-subtitle mb-2 text-muted\">اطلاعات آزمون</h6>
        <a href=' ' id='$id' style='color: dodgerblue;display:$showLink' onclick='examDownload(id)'>دانلود سوالات آزمون</a></br>
        <a href=' ' id='$id' style='color: dodgerblue;display:$showLink' onclick='keyDownLoad(id)'>دانلود پاسخ آزمون</a>
        <pre class=\"card-text\" style='width:auto'>
تعداد سوالات:$points
$startTime 
$endTime       
        </pre>
        <button type=\"button\" class=\"btn btn-primary\" style='background-color: $color;display: $display' id='$id' onclick='sendRequest(id)'>$btnMessage</button>
        </div>
        </div>
        ";
    }
}

$selectExam->close();
$selectRequest->close();
?>
</body>
</html>

