<?php

function check_first_num($_POST['pwd'])
{
    if ( $_POST['pwd'][0] == "/[^a-zA-Z0-9_]/" ) {
        return " your password should not start with a special character ";
    }else{
        return " ";
    }

}