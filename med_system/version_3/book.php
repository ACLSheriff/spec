<?php

session_start();

require_once "assests/dbconnect.php";
require_once "assests/common.php";



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

$staff = staff_getter(dbconnect_insert());

echo "<input type='date' name='date' value='".date("Y-m-d")."'>";

echo "<input type='type' name='appt_time' step='600'>";
foreach ($staff as $staf){
    if($staf["role"] == "doc"){
        $role = "doctor";
    }else if ($staf["role"] == "nur"){
        $role = "nurse";
    }
    echo "<option value='".$staf["staff_id"].">".$role. " ".$staf["surname"].
       " Room ".$staf["room"]."</option>";
}
echo "</selected>";

echo "</form>";//end form

echo "<br>";
echo user_message();//calls the function
echo "<br>";
echo "<br>";

echo "</div>";//closes each class
echo "</div>";
echo "<body>";// closes the body of code
echo "<html>";// end of html code
