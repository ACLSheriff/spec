<?php

session_start();

require_once "assests/dbconnect.php";

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

echo "<h2> Games Consoles </h2>";

echo "<br>";

echo "<p> Looking for the ultimate gaming experience? Game consoles offer powerful performance, exclusive games, and easy plug-and-play fun for all ages. </p>";
echo "<p> Whether you're into solo adventures, online battles, or family game nights, a console is your all-in-one entertainment hub. </p>";

echo "<br>";

echo "<table>";//starts a table
echo "<ul>";//bullit points the list
//these are all items in the list
echo "<h3> We offer:  </h3>";
echo "<br>";
echo "<li> nintendos switch </li>";
echo "<li> switch 2 </li>";
echo "<li> Xbox 2 </li>";
echo "<li> Xbox serise X </li>";
echo "<li> playstation 1&2 </li>";
echo "<ul>";
echo "</table>";//end of table

echo "<br>";
echo "<br>";

echo "<img id='text' src='images/playinggame.jfif' alt='text' />";  #sets a logo up

echo "<br>";

try{
    $conn = dbconnect_insert();
        echo "succsess";
} catch (PDOException $e) {
    echo $e->getMessage();
}

echo "</div>";//closes each class
echo "</div>";
echo "</body>";// closes the body of code
echo "</html>";// end of html code
?>