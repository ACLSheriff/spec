<?php

function digit_check($_POST['pwd'])
{
    if (preg_match('/[0-9]/', $_POST['pwd'])) {
        return " ";
    } else {
        return " your password should contain numbers.";
    }
}