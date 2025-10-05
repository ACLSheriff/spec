<?php
session_start();//starts the session

session_destroy();//stops and gets rid of the session

header("location:index.php?message=You have been logged out");//sends back to index page and sends message to be printed