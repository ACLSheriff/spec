<?php

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

if ($_SERVER['REQUEST_METHOD'] === 'POST'){  #selection statement to ensure POST has been used (submit button on a form)
    echo "Your name: " . $_POST['usernamename'];  # uses the full stop to concatenate the text and the post value from the form
    echo "<br>";
    echo "the date you signed up: "  . $_POST['sign_up_date'];
    echo "<br>";
    echo "Your password: "  . $_POST['password'];
    echo "<br>";
    echo "Your date of birth: "  . $_POST['d_o_b'];
    echo "<br>";
    echo "Your country: "  . $_POST['country'];
}

echo "<br>";
echo "<form method='post' action=''>"; //this creates the form

echo "<input type='text' name='username' placeholder='Name' </input>";
echo "<br>";
echo "<input type='text' name='sign_up_date' placeholder='date' <input/>";
echo "<br>";
echo "<input type='text' name='password' placeholder='pwd' </input>";
echo "<br>";
echo "<input type='text' name='d_o_b' placeholder='d_o_b' <input/>";
echo "<br>";
echo "<input type='text' name='country' placeholder='country' </input>";
echo "<br>";
echo "<input type='submit' name='submit' value='submit' />";

echo "</form>";

echo "<br>";
echo "<br>";

echo "</div>";//closes each class
echo "</div>";
echo "<body>";// closes the body of code
echo "<html>";// end of html code
