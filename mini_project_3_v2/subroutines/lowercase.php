<?php

function check_lower($_POST['pwd']){
    if (preg_match("/[a-z]/", $_POST['pwd'])){
        return " ";
    } else {
        return "you need to include lower case letters";
    }
}