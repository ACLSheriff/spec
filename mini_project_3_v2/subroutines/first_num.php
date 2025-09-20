<?php

function check_first_num($_POST['pwd'])
{
    if ( $_POST['pwd'][0] == '/[0-9]/' ) {
        return " your password should not start with a number";
    }else{
        return " ";
    }

}