<?php

function check_upper($_POST['pwd']){

    if(preg_match("/[A-Z]/", $_POST['pwd'])){
        return '';
    }else{
        return "password should contain uppercase letters.";
    }

}