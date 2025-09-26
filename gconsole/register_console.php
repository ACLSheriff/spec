<?php
session_start();

require_once("assests/dbconnect.php");
require_once("assests/common.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    try{
        new_console(dbconnect_insert(), $_POST);
        $_SESSION['usermessage'] = "SUCESS; Console created!";
    }catch (PDOException $e){
        $_SESSION['usermessage'] = $e->getMessage();
    }
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

if ($_SERVER['REQUEST_METHOD'] === 'POST'){  #selection statement to ensure POST has been used (submit button on a form)
    echo "manufacture: " . $_POST['manufacture'];  # uses the full stop to concatenate the text and the post value from the form
    echo "<br>";
    echo "c_name: "  . $_POST['c_name'];
    echo "<br>";
    echo "relase_date: "  . $_POST['relse_date'];
    echo "<br>";
    echo "controller_no: "  . $_POST['ctrl_no'];
    echo "<br>";
    echo "bits : "  . $_POST['bit'];
}

echo "<br>";
echo user_message();
echo "<br>";

echo "<br>";
echo "<form method='post' action=''>"; //this creates the form

echo "<input type='text' name='manufacturer' placeholder='manufaturer' </input>";
echo "<br>";
echo "<input type='text' name='c_name' placeholder='c_name' <input/>";
echo "<br>";
echo "<input type='text' name='relse_date' placeholder='relse_date' </input>";
echo "<br>";
echo "<input type='number' name='controller_no' placeholder='controller_no' <input/>";
echo "<br>";
echo "<input type='text' name='bit' placeholder='bit' </input>";
echo "<br>";
echo "<input type='submit' name='submit' value='submit' />";

echo "</form>";

echo "<br>";
echo "<br>";

echo "</div>";//closes each class
echo "</div>";
echo "<body>";// closes the body of code
echo "<html>";// end of html code
