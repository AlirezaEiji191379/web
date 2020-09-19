<?php

if(isset($_GET["register"])){
    echo "کاربر گرامی ثبت نام شما با موفقیت انجام شد!";
}

if(isset($_GET["error"])){
    echo "نام کاربری یا رمز عبور اشتباه است!";
}

if(isset($_GET["accept"])){
    echo "کاربر گرامی شما در صف تایید مدیر میباشید!";
}




