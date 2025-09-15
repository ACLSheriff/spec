<?php

echo "<!DOCTYPE html>";
    echo "<html>";
        echo "<head>";
            echo "<title> project 2 </title>";
            echo "<link rel='stylesheet' type='text/css' href='css/stylesheet.css'/>";
        echo "</head>";
        echo "<body>";

            echo "<div class='container'>";

                require_once "assests/topBar.php";
                require_once "assests/nav_bar.php";

            echo "<div class='content'>";
                echo "<br>";
                echo "<h2> GibJohn Tutoring </h2>";

                echo "<p class='content'> Welcome to GibJohn Tutoring – your personalized learning experience! </p> ";
                echo "<br>";
                echo "<p class='content'> We offer interactive tutoring sessions and a wide range of educational resources to help students thrive.</p>";
                echo "<br>";
                echo "<p class='content'> Our platform supports collaborative learning, provides real-time progress tracking, <br> and integrates rewarding gamified features to make learning engaging and fun.</p>";
                echo "<br>";

                echo "<img src='images/peopleTutoring.jfif'>";

            echo "</div>";
            echo "</div>";
        echo "</body>";
    echo "</html>";
?>
