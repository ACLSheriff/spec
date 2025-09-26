<?php

function new_console($conn, $post)//creates fuction
{
    try{// doing a prepared stament
        $sql = "INSERT INTO console (manufacturer, c_name, relse_date, controller_no, bit) VALUES(?,?,?,?,?)";//easy to sql attack
        $stmt = $conn->prepare($sql);//prepare sql

        $stmt->bindValue(1, $post['manufacturer']);
        $stmt->bindValue(2, $post['c_name']);
        $stmt->bindValue(3, $post['relse_date']);
        $stmt->bindValue(4, $post['controller_no']);
        $stmt->bindValue(5, $post['bit']);// binding the data from form to SQL statment this makes it more secure from a SQL injection attack less likly to hijk

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

function user_message(){
    if(isset($_SESSION['usermessage'])){
        echo "<p>" . $_SESSION['usermessage']."</p>";
        unset($_SESSION['usermessage']);
    }else{
        echo"";
    }
}