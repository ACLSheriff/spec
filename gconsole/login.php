<?php

session_start();

require_once "assests/dbconnect.php";
require_once "assests/common.php";

if (isset($_SESSION['user'])) {
    $_SESSION['usermessage'] = "you are already logged in";///checks if user is already logged in and will return message if so
    header("location:index.php");//returns to home page
    exit;//stop further exicution
}

elseif ($_SERVER["REQUEST_METHOD"] === "POST") {//verifys the function
    $usr = login(dbconnect_insert(),$_POST);//calls login fuction

    if($usr && password_verify($_POST["password"],$usr["password"])){// checking the username and password match and is present
        $_SESSION["user"] = true;//sets up the session veriable
        $_SESSION['user_id'] = $usr["user_id"];//sets and store user id
        $_SESSION['usermessage'] = "SUCCESSFULLY LOGGED IN";//success message
        header("location:index.php");//send back to home page
        exit;//exits page ends code
    }else{//if username isnt valid
        $_SESSION["usermessage"] = "INVALID USERNAME OR PASSWORD";//send error mesasge to be printed
        header("location:login.php");//gose back to login page
        exit;//ends code
    }
}

echo "<!DOCTYPE html>";//required tag
