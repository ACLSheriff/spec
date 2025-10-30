<?php

session_start();

require_once "assests/dbconnect.php";
require_once "assests/common.php";


if (!isset($_SESSION['userid'])) {//if the user id is not set
    $_SESSION['usermessage'] = "you are not logged in";///checks if user is already logged in and will return message if so
    unset($_SESSION['appid']);//unsets the appitmnet id
    header("location:index.php");//returns to home page
    exit;//stop further exicution
} elseif($_SERVER["REQUEST_METHOD"] == "POST"){//when form is submitted
//this should be here so if there is a use of headers it can be done so the rest of teh code dosnt load so teh headers will work and change page without errors becuse the header has loaded
    if(isset($_POST['appdelete'])){//if they are deleteing an appoitment
        try{
            if(cancel_appt(dbconnect_insert(), $_POST['appid'])){//it will call function to cancel appoinmet
                $_SESSION['message'] = "appointment has been cancelled.";// send message to print saying its been cancelled
                auditor(dbconnect_insert(),$_SESSION['userid'],"log", "user has cancelled an appointment". $_SESSION['userid']);//audits that the user has cancelled
            }else {
                $_SESSION['message'] = "appointment could not be cancelled.";//prints that the appoiment could not be cancled if there is an issue
            }
            } catch(PDOException $e){
                $_SESSION['message'] = "ERROR: ".$e->getMessage();//catches an other errors that occur
            }catch(Exception $e){
                $_SESSION['message'] = "ERROR: ".$e->getMessage();
            }
        }elseif(isset($_POST['appchange'])){//if they want to change the appoimnet
        $_SESSION['apptid'] = $_POST['appid'];//puts the appointment id in post
        header("location:change_booking.php");//sends the user to the change booking page
        exit;//exits page
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

echo "<h2> Your Bookings </h2>";//heading

echo "<br>";
echo user_message();//calls the function
echo "<br>";

$appts = appt_getter(dbconnect_insert());//getting appoiments from database
if(!$appts){//if there are no appoiments it will tell the user
    echo "no bookings found";
}else{

    echo "<table id='bookings'>";//starts a table for bookings

    foreach($appts as $appt) {// split each appiment to show sepratly and formmat the appoimnet details together
        if ($appt['role'] = "doc") {
            $role = "doctor";
        } else if ($appt['role'] = "nur") {
            $role = "nurse";
        }

        echo "<form action='' method='post'>";// creating a form per row of the table for each appinment

        echo "<tr>";
        echo "<td> Date:" . date('M d, Y @ h:i A', $appt['aptdate']) . "</td>";//using a built in fuction and telling it what format our epoch time should go in for when the apt is
        echo "<td> Made on: " . date('M d, Y @ h:i A', $appt['bookedon']) . "</td>";//using a built in fuction and telling it what format our epoch time should go in for when the apt was made
        echo "<td> with: " . $role . " " . $appt['surname'] . "</td>";//will show the docters surname
        echo "<td> in:" . $appt['room'] . "</td>";//will show the room number
        echo "<td><input type='hidden' name='appid' value=".$appt['booking_id'].">
        <input type='submit' name='appdelete' value='cancel appt' />
        <input type='submit' name='appchange' value='change appt'/></td>";//set the value without needed to input, allows user to submit and change

        echo "</tr>";
        echo "</form>";//closes form and table
    }
}

echo "<br>";
echo "<br>";

echo "</div>";//closes each class
echo "</div>";
echo "<body>";// closes the body of code
echo "<html>";// end of html code
