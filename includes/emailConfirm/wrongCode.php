<?php
if(session_status()==PHP_SESSION_NONE) {
    session_start();
}
if(isset($_COOKIE[session_name()])&& isset($_SESSION["time"]) && isset($_SESSION["emailCode"])) {

    if (isset($_GET["error"])) {
        if ($_GET["error"] == 1 && $_SESSION["errors"] < 3) {
            echo "کد ارسال شده نامعتبر است!";
        }
        if ($_GET["error"] == 1 && $_SESSION["errors"] > 2) {
            echo "کاربر گرامی مجددا اقدام به ثبت نام کنید!";
            if(isset($_COOKIE[session_name()])) {
                session_destroy();
                setcookie(session_name(),"",time()-3600,"/");
                header("location:  ../../Pages/Register/Register.php?error=3");
            }
        }
    }
}else{
    if(isset($_GET["error"])) {
        echo "کاربر گرامی مجددا اقدام به ثبت نام کنید!";
        header("location:  ../../Pages/Register/Register.php?error=3");
    }
}