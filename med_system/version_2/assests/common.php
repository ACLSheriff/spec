<?php

function new_user($conn, $post)//creates fuction
{
    try{// doing a prepared stament
        $sql = "INSERT INTO users (first_name, surname, username,password, d_o_b, adress) VALUES(?,?,?,?,?,?)";//easy to sql attack
        $stmt = $conn->prepare($sql);//prepare sql

        $stmt->bindValue(1, $post['first_name']);
        $stmt->bindValue(2, $post['surname']);
        $stmt->bindValue(3, $post['username']);
        $hpswd = password_hash($post['password'], PASSWORD_DEFAULT);//built in libray to incrypt
        $stmt->bindValue(4, $hpswd);
        $stmt->bindValue(5, $post['d_o_b']);
        $stmt->bindValue(6, $post['adress']);// binding the data from form to SQL statment this makes it more secure from a SQL injection attack less likly to hijk

        $stmt->execute();// run the query to insert
        $conn = null;// gets rid of connection to make sure no open connection which is secrity breach
    }catch (PDOException $e){
        error_log(" Audit database error:" . $e->getMessage());
        throw new Exception( "Audit database error: " . $e);

    }catch (Exception $e){//catching errors to make robust and giving error messages
        error_log(" Audit  error:" . $e->getMessage());
        throw new Exception( "Audit  error: " . $e);
    }
}

function user_message()
{
    if(isset($_SESSION['usermessage'])){//check if message set
        $message = "<p>". $_SESSION['usermessage']."</p>";//assinges the massage and styles
        unset($_SESSION['usermessage']);//unsets message
        return $message;//return message
    }else{//if not met
        $message = "";//set to blank
        return $message;//returns message
    }

}

function username_check($conn, $username)
{
    try {
        $sql = "SELECT username FROM users where username= ?";//sql stament getting usernames from database
        $stmt = $conn->prepare($sql);//prepare sql
        $stmt->bindValue(1, $username);//subbmits paramitter so its secure
        $stmt->execute();//run sql code
        $result = $stmt->fetch(PDO::FETCH_ASSOC);//brings back results
        $conn = null;// stops the connection so more secure
        if ($result) {//checks if got anything back
            return true;
        } else {
            return false;
        }

    } catch (Exception $e) {//catching errors to make robust and giving error messages
        error_log(" Audit  error:" . $e->getMessage());//logs error
        throw  $e;//throw the exception
    }


}


function login($conn, $post)
{
    try {// try this code
        $conn = dbconnect_insert();//gets database
        $sql = "SELECT * FROM users WHERE username= ?";//set up sql statments
        $stmt = $conn->prepare($sql);//prepares sql quary
        $stmt->bindValue(1, $post['username']);//binds paramiter to execute
        $stmt->execute();//run from sql code
        $result = $stmt->fetch(PDO::FETCH_ASSOC);//brings back resuts
        $conn = null;//stops connection

        if ($result) {//if there is a result returned
            return $result;//returns result
        } else {
            $_SESSION['usermessage'] = "User not found";//send message from error to be printed
            header("Location: login.php");//send back to login page
            exit();//exits code
        }
    } catch (PDOException $e) {
        $_SESSION['usermessage'] = "User login".$e->getMessage();//returns error mesage to output
        header("Location: login.php");//send back to long in page
        exit();//exits code
    }
}

function auditor($conn, $userid, $code, $long)
{
    $sql = "INSERT INTO audit (date,user_id,code,longdesc) VALUES(?,?,?,?)";//is an SQL quary that will insert the data into each coloum of the table
    $stmt = $conn->prepare($sql);  //prepare the SQL
    $date = date("Y-m-d"); //this is the the structer a my sQl feild works and accespts
    $stmt->bindValue(1, $date);  //bind paramiters for security
    $stmt->bindValue(2, $userid);
    $stmt->bindValue(3, $code);
    $stmt->bindValue(4, $long);

    $stmt->execute(); //run the query to insert
    $conn = null;  // close the connection so cant be abused
    return true;  // registration successful

}

function getnewuserid($conn, $username){//gets the id of the new user to be able to enter into audit
    $sql = "SELECT user_id FROM users WHERE username= ?";
    $stmt = $conn->prepare($sql); //prepares SQL
    $stmt->bindValue(1, $username);   //binds paramiters for security
    $stmt->execute(); //run quary to insert
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings array back from database
    $conn = null; //closes connection
    return $result["user_id"];  //returns result
}

function password_check($conn, $pwd){
    correctpwd = 0;
    echo len_checker($_POST['pwd']);//these will call the fuction in common and check the pwd and output infomation based on
    echo check_upper($_POST['pwd']);
    echo check_lower($_POST['pwd']);
    echo char_special($_POST['pwd']);
    echo check_first_num($_POST['pwd']);
    echo password_check($_POST['pwd']);
    echo digit_check($_POST['pwd']);
    echo check_first_special($_POST['pwd']);
    echo last_special_char($_POST['pwd']);

}


function digit_check($pwd)//names the fuction and brings in input to work with
{
    if (preg_match('/[0-9]/', $pwd)) {//this checks if these are any digits 0-9 in the input
        return correctpwd = correctpwd + 1 ;//respose depding on the password input
    } else {
        return " your password should contain numbers.";
    }
}

function check_first_num($pwd) {//names the fuction and brings in input to work with
    if (is_numeric($pwd[0])) {//this checks if the first charter of the input is a number
        return "Your password should not start with a number.";//respose depding on the password input
    } else {
        return "Good, it doesn’t start with a number.";
    }
}



function check_first_special($pwd)//names the fuction and brings in input to work with
{
    if (preg_match( "/^[^a-zA-Z0-9_]/", $pwd) ) {//this will check if the first letter is a special charter
        return " your password should not start with a special character ";//respose depding on the password input
    }else{
        return " good, dont put a special character first ";
    }

}

function len_checker($pwd){//creates a function

    $length = strlen($pwd);// this gets the lngth of the string

    if ($length < 8 ){// checks if the length is 8 or more
        return "password is too short it should be 8 characters or longer.";//respose depding on the password input
    } else {
        return " good length of a password ";
    }


}


function check_lower($pwd){//names the fuction and brings in input to work with
    if (preg_match("/[a-z]/", $pwd)){//this checks to see if there r lowercase atters in the password
        return " well done for including lower case ";//respose depding on the password input
    } else {
        return "you need to include lower case letters";
    }
}


function password_check($pwd){//names the fuction and brings in input to work with
    if (str_contains($pwd,"password")){// checks if the string password is in the input
        return " the word 'Password' should not be used in your password ";//respose depding on the password input
    } else {
        return " good, dont include password in your password ";
    }

}


function char_special($pwd)//names the fuction and brings in input to work with
{
    if (preg_match("/[^a-zA-Z0-9_]/", $pwd)){// checks that the input inclueds a special charter
        return " well done for including a special character";//respose depding on the password input
    } else {
        return " your password should have a special character";
    }
}


function check_upper($pwd){//names the fuction and brings in input to work with

    if(preg_match("/[A-Z]/", $pwd)){// checks to see if capital letters are included in the input
        return " well done for including upper case";//respose depding on the password input
    }else{
        return "password should contain uppercase letters.";
    }

}


function last_special_char($pwd) {//names the fuction and brings in input to work with
    if (preg_match('/[^a-zA-Z0-9_]$/', $pwd)) {// checks if the last letter of the input is a special charter
        return "Your password should not end with a special character.";//respose depding on the password input
    } else {
        return "Well done, it doesn’t end with a special character.";
    }
}
