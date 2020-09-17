<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>صفحه ورود</title>
    <script src="../../includes/plugin/jQuery/jquery-3.5.1.js"></script>
    <link type="text/css" rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
         <form method="post" id="myForm" action="../../includes/loginPanel/postData.php">
             <p id="generalError"><?php include_once("../../includes/emailConfirm/checkQuery.php");?></p>
             <div class="input-fluid">
                 <span class="hiddenSpan" id="username">نام کاربری</span>
                 <input class="username" type="text" name="username" id="usernameInput" maxlength="20" placeholder="نام کاربری"  onkeyup="changeDir(id)">
            </div>
            <div class="input-fluid">
                 <span class="hiddenSpan" id="password">رمز عبور</span>
                <input class="password" id="passwordInput" type="password" name="password" maxlength="20" placeholder="رمز عبور"  onkeyup="changeDir(id)">
            </div>
             <input type="submit" value="ارسال">
        </form>
    </div>

    <script src="animateSpan.js"></script>
    <script src="input.js"></script>
</body>
</html>


