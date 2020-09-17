<?php

session_start();
$_SESSION["username"]=$_POST["username"];
$_SESSION["password"]=$_POST["password"];
$_SESSION["email"]=$_POST["email"];
$_SESSION["firstName"]=$_POST["firstName"];
$_SESSION["lastName"]=$_POST["lastName"];
$_SESSION["phone"]=$_POST["phoneNumber"];
$emailCode=rand(100000,1000000);
$text="your email code is $emailCode";
mail($_SESSION["email"],"email confirmation code",$text);
$_SESSION["emailCode"]=$emailCode;
$_SESSION["errors"]=0;
$_SESSION["time"]=time();

//setcookie(session_name(),session_id(),time()+1800,"/");

header("location: ../../Pages/emailConfirm/emailConfirmation.php");


