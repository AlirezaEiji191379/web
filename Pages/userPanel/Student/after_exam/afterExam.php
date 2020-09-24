<?php include_once ("../../../../includes/checkValidation/userValidation.php");
include_once ("../../../../includes/userPanel/examCalculate.php");
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
     <link rel="stylesheet" type="text/css" href="afterExamStyle.css"/>
           <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
           <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
             </header>

        <body>
        
             
<div class="topNav">
<div class="topTitle">
<img src="../../images/Raman_Logo_Circle.png" class="logoImage"/>
<h1 style="color: #000000;   padding: -20px 0;">Raman Exams</h1>
</div>


</div>


<div class="examsContainer" >
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">کارنامه شما</h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo getExamTitle($_SESSION["examId"])?></h6>
    <p class="card-text">رتبه:<?php echo getRank($_SESSION["examId"],$_SESSION["username"])?> <br> درصد:<?php echo getPercent($_SESSION["examId"],$_SESSION["username"])?> <br> Taraz:</p>

<!--  <div class="progress">-->
<!--  <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>-->
<!--</div>-->
  </div>
</div>
</div>
</body>
 </html>