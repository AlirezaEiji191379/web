<?php include_once ("../../../../includes/checkValidation/userValidation.php");
include_once ("../../../../includes/checkValidation/examTimeValidation.php");
if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(isset($_SESSION["examId"])==false){
    header("location: ../before_exam/student.php");
}


?>
    <!DOCTYPE html>
    <html>
        <header>
     <link rel="stylesheet" type="text/css" href="examStyle.css"/>
        </header>

        <body>
        
             
<div class="topNav">
<div class="topTitle">
<img src="../../images/Raman_Logo_Circle.png" class="logoImage"/>
<h1 style="color: #000000;   padding: -20px 0;">Raman Exams</h1>
</div>
<div class="timerContainer">
<label id="minutes" style="color: #000000;">00</label>:<label id="seconds" style="color: #000000;">00</label>
</div> 

</div>


<!-- -->

<form action="../../../../includes/userPanel/finishExam.php" method="post" class="form-horizontal" id="form">
  <div class="userpassContainer">
     <!-- <input type="text" name="username" placeholder="Username">
      <input type="text" name="password" placeholder="Password"> -->
      <a href="#" style="color:dodgerblue;" onclick="fileDownload()">دانلود سوالات آزمون</a>
      <div class="labelContainer">
      <label for="fname" class="formLabel">پاسخبرگ آزمون</label><br>
      </div>
      </div> 
      


      <div id="container">
     
      <div class="qBox">
           <div style="margin: 10px 0 10px 0;" class="radioId">
            <div class="custom-radios">
      <div>
        <input type="radio" name="name1" value="1" class="radioInputs color-1">
        <label for="color-1" class="radioLabels">
          <span style="padding-right: 20px;">
            <img src="../../images/circle_black.png" alt="Checked Icon" />
          </span>
        </label>
      </div>

      <div>
        <input type="radio" name="name1" value="2" class="radioInputs color-2">
        <label for="color-2" class="radioLabels">
          <span style="padding-right: 20px;">
            <img src="../../images/circle_black.png" alt="Checked Icon" />
          </span>
        </label>
      </div>

      <div>
        <input type="radio" name="name1" value="3" class="radioInputs color-3">
        <label for="color-3" class="radioLabels">
          <span style="padding-right: 20px;">
            <img src="../../images/circle_black.png" alt="Checked Icon" />
          </span>
        </label>
      </div>

          <div>
        <input type="radio" name="name1" value="4" class="radioInputs color-4">
        <label for="color-4" class="radioLabels">
          <span style="padding-right: 20px;">
            <img src="../../images/circle_black.png" alt="Checked Icon" />
          </span>
        </label>
      </div>
    </div>
       </div>
          
          </div>
          
            </div>
             <input type="submit" class="btn btn-default getStartedButton" value="ثبت پاسخ و ارسال"></input>
            </form>
           
           

 <script type="text/javascript" src="examScript.js"></script>
  <script>
      function fileDownload(){
        let xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function () {
          if(this.readyState==4 && this.status==200){
                alert(this.responseText)
          }
        };
        xhttp.open("GET","../../../../includes/userPanel/download.php?file=qDir",true);
        xhttp.send();
      }
  </script>
        </body>
        
        </html>