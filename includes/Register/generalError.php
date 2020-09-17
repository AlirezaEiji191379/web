<?php
if(isset($_GET["error"])==true){
    if($_GET["error"]==1){
        echo "لطفا تمامی فیلد ها رو پر نمایید!";
    }elseif($_GET["error"]==2){
        echo "لطفا فیلد ها را درست پر نمایید!";
    }elseif($_GET["error"]==3){
        echo "کاربر گرامی لطفا مجددا اقدام به ثبت نام نمایید!";
    }elseif($_GET["error"]==4){
        echo "لطفا پست الکترونیکی معتبر وارد نمایید!";
    }
}