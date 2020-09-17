<?php
include_once("../DBInformation/dbInf.php");

$mysql=new mysqli(host,username,password,dbname);




if(isset($_GET["email"])){
    $email=stripcslashes(htmlspecialchars(trim($_GET["email"])));
    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        echo "لطفا ایمیل معتبر وارد کنید!";
    }
    else {
        $statement = $mysql->prepare("SELECT `email` FROM `users` WHERE `email`=?");
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();
        if ($result->num_rows > 0) {
            echo "این پست الکرونیکی قبلا ثبت شده است!";
        } else {
            echo "";
        }
    }
}


if(isset($_GET["username"])){
    $username=stripcslashes(htmlspecialchars(trim($_GET["username"])));
    $statement=$mysql->prepare("SELECT `username` FROM `users` WHERE `username`=?");
    $statement->bind_param("s",$username);
    $statement->execute();
    $result=$statement->get_result();
    if($result->num_rows>0){
        echo "این نام کاربری قبلا ثبت شده است!";
    }else{
        echo "";
    }
}

if(isset($_GET["phone"])){
    $phone=stripcslashes(htmlspecialchars(trim($_GET["phone"])));
    $statement=$mysql->prepare("SELECT `phone` FROM `users` WHERE `phone`=?");
    $statement->bind_param("s",$phone);
    $statement->execute();
    $result=$statement->get_result();
    if($result->num_rows>0){
        echo "این شماره موجود است!";
    }else{
        echo "";
    }
}




