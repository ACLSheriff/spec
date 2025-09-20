<?php


function len_checker($pwd){//creates a function

    $length = strlen($pwd);

    if ($length < 8 ){
        return "password is too short it should be 8 characters or longer.";
    } else {
        return " ";
    }
}


function check_upper($pwd){

    if(preg_match("/[A-Z]/", $_POST['pwd'])){
        return '';
    }else{
        return "password should contain uppercase letters.";
    }}

