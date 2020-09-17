<?php include_once("../../includes/checkValidation/adminValidation.php");

if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(isset($_SESSION["fileUpload"])==false){
    header("location: ../../Pages/adminPanel/createExam.php");
}


?>
    <!DOCTYPE html>
    <html>
        <header>
     <link rel="stylesheet" type="text/css" href="style.css"/>
           
             </header>

        <body>
<div class="topNav">
<h1 style="color: #000000;">Raman Exams</h1>
<div class="timerContainer">
<label id="minutes" style="color: #000000;">00</label>:<label id="seconds" style="color: #000000;">00</label>
</div> 

</div>

<!-- -->

<form action="../../includes/adminPanel/inputFormValidation.php" method="post" class="form-horizontal" enctype="multipart/form-data">
    <p style="color: red"><?php include_once ("../../includes/adminPanel/checkErrors.php");?></p>
    <div class="userpassContainer">
     <!-- <input type="text" name="username" placeholder="Username">
      <input type="text" name="password" placeholder="Password"> -->
      
      <label for="fname" class="formLabel">کلید آزمون</label><br>
      </div> 
      


      <div id="container">
     
      <div class="qBox">
           <div style="margin: 10px 0 10px 0;" class="radioId">
            <div class="custom-radios">
      <div>
        <input type="radio" name="name1" value="1" class="radioInputs color-1">
        <label for="color-1" class="radioLabels">
          <span>
            <img src="images/circle_check.png" alt="Checked Icon" />
          </span>
        </label>
      </div>

      <div>
        <input type="radio" name="name1" value="2" class="radioInputs color-2">
        <label for="color-2" class="radioLabels">
          <span>
            <img src="images/circle_check.png" alt="Checked Icon" />
          </span>
        </label>
      </div>

      <div>
        <input type="radio" name="name1" value="3" class="radioInputs color-3">
        <label for="color-3" class="radioLabels">
          <span>
            <img src="images/circle_check.png" alt="Checked Icon" />
          </span>
        </label>
      </div>

          <div>
        <input type="radio" name="name1" value="4" class="radioInputs color-4">
        <label for="color-4" class="radioLabels">
          <span>
            <img src="images/circle_check.png" alt="Checked Icon" />
          </span>
        </label>
      </div>
    </div>
       </div>
          
          </div>
          
            </div>
             <input type="submit" class="btn btn-default getStartedButton">
            </form>
           
           

 <script type="text/javascript" src="script.js"></script>
        </body>

        <footer>

        </footer>
    </html>


