<?php

session_start();
if ($_SEVER['REQUEST'])


echo "<!DOCTYPE html>";/*required tag*/
echo "<html>";/*opens page content*/
echo "<head>";/*opens the head of the code */

echo "<title> enter title </title>";/*titles the page*/
echo "<link rel='stylesheet' type='text/css' href='css/stylesheet.css'/>";//links to style sheet

echo "</head>";// closes the head of the page
echo "<body>";//opens the body of the page

echo "<div class='container'>";//dive alows you to split your page up and class allows you to style that div

require_once "assests/topBar.php";// gets and displays the top bar
require_once "assests/nav_bar.php";

echo "<div class='content'>";

echo "<h2> session work </h2>";
echo "<form method = 'post' action = ''> <br>";
echo "<input type = 'text' name = 'massage' placeholder='Enter a message here'>";
echo "<input type = 'submit' name = 'submit' value = 'submit'>";
echo "</form>";

echo "</div>";
echo "</div>";
echo "<body>";
echo "<html>";
?>