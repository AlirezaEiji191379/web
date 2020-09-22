<?php include_once("../../includes/checkValidation/adminValidation.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="../../includes/plugin/jQuery/jquery-3.5.1.js"></script>
</head>

<header>

</header>

    
    <body>
        <div class="topNav">
            <h1 style="color: #000000;">Raman Exams</h1>
        </div> 
        
        <div class="startExamBtn" id="button">
            	<button class="getStartedButton" onClick="parent.location='createExam.php'">ایجاد آزمون</button>
        </div>

        <span id="list">
            <?php  include_once ("../../includes/adminPanel/getInvalidUsers.php");?>
        </span>



    </body>
<!--<script type="text/javascript">-->
<!---->
<!--    window.addEventListener("beforeunload",function (event) {-->
<!--        let deleteXhttp=new XMLHttpRequest();-->
<!--        deleteXhttp.open("GET","../../includes/session/deleter.php",true);-->
<!--        deleteXhttp.send();-->
<!--    })-->
<!---->
<!--</script>-->

<script>
    function updateInvalidUsers() {
        document.getElementById("list").innerHTML="";
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("list").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../../includes/adminPanel/getInvalidUsers.php", true);
        xhttp.send();
    }
    function accept(id) {
        let acceptXhttp=new XMLHttpRequest();
        acceptXhttp.onreadystatechange=function(){
            if (this.readyState == 4 && this.status == 200) {
                updateInvalidUsers();
            }
        };
        acceptXhttp.open("GET","../../includes/adminPanel/acceptDecline.php?accept="+id,true);
        acceptXhttp.send();
    }
    function decline(id) {
        let declineXhttp=new XMLHttpRequest();
        declineXhttp.onreadystatechange=function(){
            if (this.readyState == 4 && this.status == 200) {
                updateInvalidUsers();
            }
        };
        declineXhttp.open("GET","../../includes/adminPanel/acceptDecline.php?decline="+id,true);
        declineXhttp.send();
    }
</script>
    <footer>
    </footer>
</html>