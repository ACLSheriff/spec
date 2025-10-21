<?php

session_start();

require_once "assests/dbconnect.php";
require_once "assests/common.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
//this should be here so if there is a use of headers it can be done so the rest of teh code dosnt load so teh headers will work and change page without errors becuse the header has loaded

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
require_once "assests/navbar.php";// gets and displays nav bar

echo "<div class='content'>";// this class is a box that i can put content for my page into

echo "<h2> Bookings </h2>";//heading
echo "<p>  </p>";//paragh of text to instruct


echo "<br>";// breaks for readability
echo "<form method='post' action=''>"; //this creates the form



echo "</form>";//end form

echo "<br>";
echo user_message();//calls the function
echo "<br>";
echo "<br>";

echo "</div>";//closes each class
echo "</div>";
echo "<body>";// closes the body of code
echo "<html>";// end of html code
