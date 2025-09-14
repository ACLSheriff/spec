<?php
    echo "<html>";
        echo "<head>";

            echo "<title> this is M&S </title>";
            echo "<link rel='stylesheet' type='text/css' href='css/page_2.css' />";

        echo "</head>";
        echo "<body>";

            echo "<img src='MandS.jfif'>";
            echo "<hr>";
            echo "<b> hello we are M&S and we are ava and ellies favrouite </b>";
            echo "<a href='page3.php'> here is our competior </a>";

            echo "<hr>";
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                echo "Your name: " . $_POST['name'];
                echo "<br>";
                echo "Your Address: "  . $_POST['address'];
                echo "<br>";
                echo "Whats are you ordering : "  . $_POST['order'];
            }
            echo "<form method='post' action=''>";

            echo "<input type='text' name='name' placeholder='Name' />";
            echo "<br>";
            echo "<input type='text' name='address' placeholder='Adress' />";
            echo "<br>";
            echo "<input type='text' name='order' placeholder='order' />";
            echo "<br>";
            echo "<input type='submit' name='submit' value='submit' />";


            echo "<hr>";
            echo "<p> hello we are the best for all sorts of things we are quality and have tasty food </p>";

            echo "<ul>";// make a list with bullet points
                echo "<li> We sell: </li>";
                echo "<li> ready meals </li>";
                echo "<li> collin the caltiplier  </li>";
                echo "<li> amazing bakery </li>";
                echo "<li> clothes </li>";
                echo "<li> and much more </li>";
            echo "</ul>";


        echo "</body>";
        echo "</html>";

?>