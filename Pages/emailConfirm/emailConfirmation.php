<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تایید ایمیل</title>
    <link type="text/css" rel="stylesheet" href="emailConfirmation.css">
    <script src="../../includes/plugin/jQuery/jquery-3.5.1.js"></script>
</head>
<body>
    <?php include_once("../../includes/emailConfirm/resendCode.php");?>
    <div class="container">
        <form method="post" action="../../includes/emailConfirm/postCode.php">
            <h3>کد تاییدی برای پست الکترونیکی شما ارسال شده است!</h3>
            <div class="input-fluid">
                <p id="generalError"><?php include_once("../../includes/emailConfirm/wrongCode.php");?></p>
                <span class="hiddenSpan" id="emailCode">کد تایید</span>
                <input class="emailCode" type="text" name="emailCode" id="codeInput" maxlength="6" placeholder="کد تایید" onkeyup="changeDir(id)">
                <input type="submit" value="ارسال">
               <a href="emailConfirmation.php?resend=1" style="color: dodgerblue;">ارسال مجدد کد تایید</a>
        </form>
    </div>
    <script src="animateSpan.js"></script>
    <script src="input.js"></script>
</body>
</html>
