<?php



function digit_check($_POST['pwd'])
{
    if (preg_match('/[0-9]/', $_POST['pwd'])) {
        return " ";
    } else {
        return " your password should contain numbers.";
    }
}

function check_first_num($_POST['pwd'])
{
    if ( $_POST['pwd'][0] == '/[0-9]/' ) {
        return " your password should not start with a number";
    }else{
        return " ";
    }

}


function check_first_num($_POST['pwd'])
{
    if ( $_POST['pwd'][0] == "/[^a-zA-Z0-9_]/" ) {
        return " your password should not start with a special character ";
    }else{
        return " ";
    }

}

//function len_checker($pwd){//creates a function

    $length = strlen($pwd);

    if ($length < 8 ){
        return "password is too short it should be 8 characters or longer.";
    } else {
        return " ";
    }


}


function check_lower($_POST['pwd']){
    if (preg_match("/[a-z]/", $_POST['pwd'])){
        return " ";
    } else {
        return "you need to include lower case letters";
    }
}


function password_check($_POST['pwd']){
    if (str_contains($_POST['pwd'],"password")){
        return " ";
    } else {
        return " the word 'Password' should not be used in your password ";
    }

}


function char_special($_POST['pwd'])
{
    if (preg_match("/[^a-zA-Z0-9_]/", $_POST['pwd'])){
        return " ";
    } else {
        return " your password should have a special character";
    }
}


//function check_upper($_POST['pwd']){

    if(preg_match("/[A-Z]/", $_POST['pwd'])){
        return '';
    }else{
        return "password should contain uppercase letters.";
    }

}