<?php



function len_checker($pwd){//creates a function

    $length = strlen($pwd);

    if ($length < 8 ){
        return "password is too short it should be 8 characters or longer.";
    } else {
        return " ";
    }}

