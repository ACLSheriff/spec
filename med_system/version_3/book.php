<?php

session_start();

require_once "assests/dbconnect.php";
require_once "assests/common.php";


if (!isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "you are not logged in";///checks if user is already logged in and will return message if so
    header("location:index.php");//returns to home page
    exit;//stop further exicution
}

elseif($_SERVER["REQUEST_METHOD"] == "POST"){
//this should be here so if there is a use of headers it can be done so the rest of teh code dosnt load so teh headers will work and change page without errors becuse the header has loaded

    try {
        $tmp = $_POST["appt_date"] . ' ' . $_POST["appt_time"];//cobines it into a single string with a sigle dat and time
        $epoch_time = strtotime($tmp);//converting to epoc time this passing of the veribale is best practice and minimises issues
        if(commit_booking(dbconnect_insert(), $epoch_time)){
            $_SESSION["usermessage"] = "SUCCESS: your booking has been confirmed";
            auditor(dbconnect_insert(),$_SESSION['userid'],"log", "user has booked an appointment". $_SESSION['userid']);
            header("Location: booking.php");
            exit;
        }else{
            $_SESSION["usermessage"] = "ERROR: something went wrong";
        }

    } catch (PDOException $e) {
        $_SESSION["usermessage"] = "Error: " . $e->getMessage();
    } catch(Exception $e) {
        $_SESSION["usermessage"] = "Error: " . $e->getMessage();
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
require_once "assests/navbar.php";// gets and displays nav bar

echo "<div class='content'>";// this class is a box that i can put content for my page into

echo "<h2> Book appiments </h2>";//heading
echo "<p>  </p>";//paragh of text to instruct


echo "<br>";// breaks for readability
echo "<form method='post' action=''>"; //this creates the form

$staff = staff_getter(dbconnect_insert());


echo "<layble for='appt_time'> Appointment time:</lable>";
echo "<input type='time' name='appt_time' required>";
echo "<br>";


echo "<layble for='appt_date'> Appointment date:</lable>";
echo "<input type='date' name='appt_date' required>";
echo "<br>";
echo "<select name='staff'>";

foreach ($staff as $staf){
    if($staf["role"] == "doc"){
        $role = "doctor";
    }else if ($staf["role"] == "nur"){
        $role = "nurse";
    }
    echo "<option value='".$staf["staff_id"]."'>".$role. " ".$staf["surname"]. " Room ".$staf["room"]."</option>";
}
echo "</select>";

echo "<br>";

echo "<input type='submit' name='submit' value='Book Appointment'>";

echo "</form>";//end form

echo "<br>";
echo user_message();//calls the function
echo "<br>";
echo "<br>";

echo "</div>";//closes each class
echo "</div>";
echo "<body>";// closes the body of code
echo "<html>";// end of html code
