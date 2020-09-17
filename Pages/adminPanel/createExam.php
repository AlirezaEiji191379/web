<?php include_once("../../includes/checkValidation/adminValidation.php"); ?>
<!DOCTYPE html>
<html>
    <header>
         <link rel="stylesheet" type="text/css" href="style.css"/>
         
    </header>
    
    <body>
        <div class="topNav">
            <h1 style="color: #000000;">Raman Exams</h1>
        </div> 
        
       <form  method="post"  enctype="multipart/form-data" action="../../includes/adminPanel/examFormValidation.php">
           <p style="color:red;"><?php include_once ("../../includes/adminPanel/checkErrors.php");?></p>
  <label for="fname" class="formLabel">تیتر آزمون</label><br>
  <input type="text" id="fname" name="fname" class="formInput"><br>
  
 <label for="points" class="formLabel">تعداد سوالات</label><br>
  <input type="number" id="points" name="points" step="5" class="formInput"><br>
  
  <label for="points" class="formLabel">زمان آزمون</label><br>
  <input type="number" id="time" name="time" step="1" class="formInput"><br>
  
  <label for="start" class="formLabel">تاریخ آزمون</label><br>
  <input type="date" id="birthday" name="birthday" class="formInput"><br>
  
<label for="appt" class="formLabel">ساعت باز شدن آزمون</label><br>
  <input type="time" id="appt" name="appt" class="formInput"><br>
  
  <label for="appt" class="formLabel">ساعت بسته شدن آزمون</label><br>
  <input type="time" id="appt2" name="appt2" class="formInput"><br>
  
    <label for="appt" class="formLabel">آپلود سوالات آزمون</label><br>
   <input type="file" id="myFile" name="myFile" class="formInput"><br>

   <label for="appt" class="formLabel">آپلود پاسخ آزمون</label><br>
    <input type="file" id="myFile2" name="myFile2" class="formInput"><br>

   <input type="submit" class="getStartedButton" value="ارسال">تایید</input>
</form>
    </body>
    
    <footer>
    </footer>
</html>