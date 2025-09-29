<?php

session_start();

require_once("assests/dbconnect.php");//gets file access
require_once("assests/common.php");//gets acess to common

if ($_SERVER["REQUEST_METHOD"] == "POST"){//checking a super globle to see if the request methord is post to call the page

        $_SESSION['usermessage'] = "result of user check:". username_check(dbconnect_insert(), $_POST["username"]);//gives and formats the resutle of the check from common username_check

}

echo "<!DOCTYPE html>";//required tag
echo "<html>";//opens page content
echo "<head>";//opens the head of the code

echo "<title> games console </title>";//titles the page
echo "<link rel='stylesheet' type='text/css' href='css/stylesheet.css'/>";//links to style sheet

echo "</head>";// closes the head of the page
echo "<body>";//opens the body of the page

echo "<div class='container'>";//dive alows you to split your page up and class allows you to style that div

require_once "assests/topbar.php";// gets and displays the top bar
require_once "assests/nav.php";// gets and displays nav bar

echo "<div class='content'>";// this class is a box that i can put content for my page into

echo "<h2> User register </h2>";//heading
echo "<p> welcome we are so glad your joining us, please fill in the form below </p>";//paragh of text to instruct


echo "<br>";// breaks for readability
echo "<form method='post' action=''>"; //this creates the form

echo "<input type='text' name='username' placeholder='userName' </input>";//allows intput into form
echo "<br>";
echo "<input type='text' name='sign_up_date' placeholder='sign up date' <input/>";
echo "<br>";
echo "<input type='text' name='password' placeholder='password' </input>";
echo "<br>";
echo "<input type='text' name='d_o_b' placeholder='date of birth' <input/>";
echo "<br>";
echo "<input type='text' name='country' placeholder='country' </input>";
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
