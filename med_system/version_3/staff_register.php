<?php

session_start();

require_once("assests/dbconnect.php");//gets file access
require_once("assests/staff_common.php");//gets acess to common

if ($_SERVER["REQUEST_METHOD"] == "POST") {//checking a super globle to see if the request methord is post to call the page

    $_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $_POST['role'] = filter_var($_POST['role'], FILTER_SANITIZE_STRING);
    $_POST['surname'] = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
    $_POST['password'] = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $_POST['room'] = filter_var($_POST['room'], FILTER_SANITIZE_STRING);


      if (!username_check(dbconnect_insert(), $_POST['username'])) {//checks the value returned to see if username id avalible
            if (new_user(dbconnect_insert(), $_POST)) {
               auditor(dbconnect_insert(), getnewuserid(dbconnect_insert(), $_POST['username']), "reg", "new user registered");//this logs that a user has registerd and stores in database
                $_SESSION['usermessage'] = "USER REG SUCCESSFUL";//gives and formats the resutle of the check from common username_check
            } else {
                $_SESSION['usermessage'] = "ERROR USER REG FAILED ";//if its not aviblibe it prints this error message
            }
        }
}

echo "<!DOCTYPE html>";//required tag
echo "<html>";//opens page content
echo "<head>";//opens the head of the code

echo "<title> booking system </title>";//titles the page
echo "<link rel='stylesheet' type='text/css' href='css/stylesheet.css'/>";//links to style sheet

echo "</head>";// closes the head of the page
echo "<body>";//opens the body of the page

echo "<div class='container'>";//dive alows you to split your page up and class allows you to style that div

require_once "assests/topbar.php";// gets and displays the top bar

echo "<div class='content'>";// this class is a box that i can put content for my page into

echo "<h2> User register </h2>";//heading
echo "<p> welcome we are so glad your joining us, please fill in the form below </p>";//paragh of text to instruct


echo "<br>";// breaks for readability
echo "<form method='post' action=''>"; //this creates the form

echo "<input type='text' name='username' placeholder='username' </input>";
echo "<br>";
echo "<input type='text' name='role' placeholder='role' </input>";//allows intput into form
echo "<br>";
echo "<input type='text' name='surname' placeholder='surname' <input/>";
echo "<br>";
echo "<input type='text' name='password' placeholder='password' </input>";
echo "<br>";
echo "<input type='text' name='room' placeholder='room' <input/>";
echo "<br>";
echo "<input type='submit' name='submit' value='submit' />";//submit button for form

echo "</form>";//end form


echo "<br>";
echo user_message();//calls the function
echo "<br>";

echo "<br>";
echo "<br>";

echo "</div>";//closes each class
echo "</div>";
echo "<body>";// closes the body of code
echo "<html>";// end of html code
