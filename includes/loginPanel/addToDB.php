<?php

if(session_status()==PHP_SESSION_NONE) {
    session_start();
}
include_once("../DBInformation/dbInf.php");

$mysql=new mysqli(host,username,password,dbname);
$statement=$mysql->prepare("INSERT INTO `users` (`username`,`password`,`email`,`phone`,`firstname`,`lastname`,`type`) VALUES (?,?,?,?,?,?,?)");
function makeSafe($input){
    return stripcslashes(htmlspecialchars(trim($input)));
}

$username=makeSafe($_SESSION["username"]);
$password=makeSafe($_SESSION["password"]);
$email=makeSafe($_SESSION["email"]);
$phone=makeSafe($_SESSION["phone"]);
$firstName=makeSafe($_SESSION["firstName"]);
$lastName=makeSafe($_SESSION["lastName"]);
$type="User";

$statement->bind_param("sssssss",$username,$password,$email,$phone,$firstName,$lastName,$type);
$statement->execute();
$mysql->close();
if(isset($_COOKIE[session_name()])){
    session_destroy();
    setcookie(session_name(),"",time()-3600,"/");
}
header("location: ../../Pages/loginPanel/login.php?register=1");




