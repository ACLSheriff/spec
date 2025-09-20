<?php


function last_special_char($pwd)
{
    $length = strlen($pwd);
    if ($pwd[$length] == "/[^a-zA-Z0-9_]/") {
        return " your password should not end with a special character ";
    } else {
        return " well done, special characters should not at at the end of your password ";
    }

}