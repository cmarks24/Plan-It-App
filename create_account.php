<?php

    /*
        code creates a new account row
        all account details are read from HTTP Post request
    */

    // JSON response array
    $response = array();

    // check for required fields
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phonenumber'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        
        // include db connect class
        require_once __DIR__.'/db_connect.php';
        
        // connecting to db
        $db = new DB_CONNECT();
        
        // mysql inserting a new row
        $result = mysql_query("INSERT INTO account(username, password, email, phonenumber) VALUES('$username', '$password', '$email', '$phonenumber')");
        
        // check if row inserted or not
        if($result){
            // succesfullt inserted into database
            $response["success"] = 1;
            $response["message"] = "ERROR: Account was not inserted into database.";
            
            // echo JSON response
            echo json_encode($response);
        }
    } else {
        // required field missing
        $response["success"] = 0;
        $response["message"] = "Required field(s) missing.";
        
        // echo JSON response
        echo json_encode($response);
    }
?>