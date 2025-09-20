<?php

function char_special($_POST['pwd'])
{
    if (preg_match("/[^a-zA-Z0-9_]/", $_POST['pwd'])){
        return " ";
    } else {
        return " your password should have a special character";
    }
}