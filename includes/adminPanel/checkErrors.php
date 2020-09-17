<?php

if(isset($_GET["error"])){
    if($_GET["error"]=="empty"){
        echo "لطفا همه فیلد ها را پر کنید!";
    }elseif($_GET["error"]=="emptyQFile"){
        echo "لطفا فایل آزمون را انتخاب کنید!";
    }elseif($_GET["error"]=="wrongAppt"){
        echo "زمان شروع و پایان را درست انتخاب کنید!";
    }elseif($_GET["error"]=="date"){
        echo "تاریخ آزمون را درست انتخاب کنید!";
    }elseif ($_GET["error"]=="time"){
        echo "زمان آزمون را درست وارد کنید!";
    }elseif ($_GET["error"]=="points"){
        echo "تعداد سوالات را درست وارد کنید!";
    }elseif($_GET["error"]=="fileSize"){
        echo "فایل وارد شده حجمش زیاد است!";
    }elseif($_GET["error"]=="fileExt"){
        echo "فایل باید با فرمت pdf باشد!";
    }elseif ($_GET["error"]=="fileCancel"){
        echo "فایل آپلود نشد لطفا بعدا اقدام کنید!";
    }elseif($_GET["error"]=="emptyOption"){
        echo "لطفا به تعداد سوالات کلید پر کنید!";
    }elseif($_GET["error"]=="emptyAFile"){
        echo "لطفا فایل پاسخنامه را آپلود کنید!";
    }elseif($_GET["error"]=="duration"){
        echo "زمان آزمون نامناسب است!";
    }elseif($_GET["error"]=="timeUp"){
        echo "لطفا مجددا اقدام به ثبت آزمون نمایید!";
    }

}







