<?php

function digit_check($pwd)//names the fuction and brings in input to work with
{
    if (preg_match('/[0-9]/', $pwd)) {
        return " well done, including numbers ";
    } else {
        return " your password should contain numbers.";
    }
}

function check_first_num($pwd) {
    if (is_numeric($pwd[0])) {
        return "Your password should not start with a number.";
    } else {
        return "Good, it doesn’t start with a number.";
    }
}



function check_first_special($pwd)//names the fuction and brings in input to work with
{
    if (preg_match( "/^[^a-zA-Z0-9_]/", $pwd) ) {
        return " your password should not start with a special character ";
    }else{
        return " good, dont put a special character first ";
    }

}

function len_checker($pwd){//creates a function

    $length = strlen($pwd);

    if ($length < 8 ){
        return "password is too short it should be 8 characters or longer.";
    } else {
        return " good length of a password ";
    }


}


function check_lower($pwd){
    if (preg_match("/[a-z]/", $pwd)){
        return " well done for including lower case ";
    } else {
        return "you need to include lower case letters";
    }
}


function password_check($pwd){
    if (str_contains($pwd,"password")){
        return " the word 'Password' should not be used in your password ";
    } else {
        return " good, dont include password in your password ";
    }

}


function char_special($pwd)
{
    if (preg_match("/[^a-zA-Z0-9_]/", $pwd)){
        return " well done for including a special character";
    } else {
        return " your password should have a special character";
    }
}


function check_upper($pwd){

    if(preg_match("/[A-Z]/", $pwd)){
        return " well done for including upper case";
    }else{
        return "password should contain uppercase letters.";
    }

}


function last_special_char($pwd) {
    if (preg_match('/[^a-zA-Z0-9_]$/', $pwd)) {
        return "Your password should not end with a special character.";
    } else {
        return "Well done, it doesn’t end with a special character.";
    }
}
