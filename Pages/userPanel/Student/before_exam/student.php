<?php include_once ("../../../../includes/checkValidation/userValidation.php");

?>

    <!DOCTYPE html>
    <html>
        <head>
          <link rel="stylesheet" type="text/css" href="studentStyle.css"/>
           
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
           <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
            <script>
                function updateExam() {
                    let xhttp=new XMLHttpRequest();
                    xhttp.onreadystatechange=function () {
                        if(this.readyState==4 && this.status==200){
                            document.getElementById("list").innerHTML=this.responseText;
                        }
                    };
                    xhttp.open("GET","../../../../includes/userPanel/updateExams.php",true);
                    xhttp.send();
                }
                function sendRequest(id) {
                    let reqXhttp=new XMLHttpRequest();
                    reqXhttp.onreadystatechange=function () {
                        if(this.status==200 && this.readyState==4){
                            if(this.responseText=="update") updateExam();
                            else if(this.responseText=="exam"){
                                location.href="../exam_time/exam.php";
                            }else if(this.responseText=="result"){
                                location.href="../after_exam/afterExam.php";
                            }
                        }
                    };
                    reqXhttp.open("GET","../../../../includes/userPanel/examRequest.php?examId="+id,true);
                    reqXhttp.send();
                }
            </script>
        </head>

<body>

<div class="topNav">
<div class="topTitle">
<img src="../../images/Raman_Logo_Circle.png" class="logoImage"/>
<h1 style="color: #000000;   padding: -20px 0;">Raman Exams</h1>
</div>

</div>

<div class="examsContainer">
    <span id="list">
<?php  include_once ("../../../../includes/userPanel/updateExams.php"); ?>
    </span>

</div>
</body>
</html>