<?php
function len_checker($_POST['pwd']){//creates a function

    $length = strlen($_POST['pwd']);

    if ($length < 8 ){
        return "password is too short it should be 8 characters or longer.";
    }


}