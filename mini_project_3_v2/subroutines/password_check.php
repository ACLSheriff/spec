<?php

function password_check($_POST['pwd']){
    if (str_contains($_POST['pwd'],"password")){
        return " ";
    } else {
        return " the word 'Password' should not be used in your password ";
    }

}