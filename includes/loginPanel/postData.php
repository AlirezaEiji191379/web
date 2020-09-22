<?php

include_once("../DBInformation/dbInf.php");

function makeSafe($input){
    return stripcslashes(htmlspecialchars(trim($input)));
}

$username=makeSafe($_POST["username"]);
$password=makeSafe($_POST["password"]);

$mysql=new mysqli(host,username,password,dbname);

$statement=$mysql->prepare("SELECT `username`,`password`,`type` FROM `users` WHERE `username`=? AND `password`=?");
$statement->bind_param("ss",$username,$password);
$statement->execute();
$result=$statement->get_result();
if($result->num_rows==1){
    $row=$result->fetch_assoc();
        session_start();
        $_SESSION["username"] = $row["username"];
        $_SESSION["logged_in"] = 1;
        if ($row["type"] === "Admin") {
            $_SESSION["type"] = "Admin";
            header("location: ../../Pages/adminPanel/adminPanel.php");
        } elseif ($row["type"] === "User") {
            $_SESSION["type"] = "User";
            header("location: ../../Pages/userPanel/Student/before_exam/student.php");
        }
}else{
    header("location: ../../Pages/loginPanel/login.php?error=1");
}


