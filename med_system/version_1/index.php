<?php


require_once "assests/dbconnect.php";//gets file dbconnect
require_once "assests/common.php";

echo "<!DOCTYPE html>";//required tag
echo "<html>";//opens page content
echo "<head>";//opens the head of the code

echo "<title> games console </title>";//titles the page
echo "<link rel='stylesheet' type='text/css' href='css/stylesheet.css'/>";//links to style sheet

echo "</head>";// closes the head of the page
echo "<body>";//opens the body of the page

echo "<div class='container'>";//dive alows you to split your page up and class allows you to style that div

require_once "assests/topbar.php";// gets and displays the top bar
require_once "assests/navbar.php";// gets and displays nav bar

echo "<div class='content'>";// this class is a box that i can put content for my page into


echo "<h2> Booking system </h2>";

echo "<br>";
//paragh text
echo "<p> Looking for the ultimate gaming experience? Game consoles offer powerful performance, exclusive games, and easy plug-and-play fun for all ages. </p>";
echo "<p> Whether you're into solo adventures, online battles, or family game nights, a console is your all-in-one entertainment hub. </p>";


echo "<br>";
echo "<br>";//breaks for readablity

echo "<img id='text' src='images/playinggame.jfif' alt='text' />";  #sets a logo up

echo "<br>";

if (!$message) {//checks message
    echo user_message();//print out message from subroutine
}else {
    echo $message;//prints message
}


try{//error handle
    $conn = dbconnect_insert();
    echo "succsess";//if it works prints succsess message
} catch (PDOException $e) {//catches any other error
    echo $e->getMessage();
}

echo "</div>";//closes each class
echo "</div>";
echo "</body>";// closes the body of code
echo "</html>";// end of html code
