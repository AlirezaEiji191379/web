<?php

if(session_status()==PHP_SESSION_NONE){
    session_start();
}

setcookie(session_name(),session_id(),time()-7200,"/");
session_destroy();
echo "alireza";







