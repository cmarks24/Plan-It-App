<?php

/*
    gets a single account details
    account is identified by phonenumber
*/

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__.'/db_connect.php';

// connecting to database
$db = new DB_CONNECT();

// check for post data
if(isset($_GET['phonenumber'])){
    $phonenumber = $_GET['phonenumber'];
    
    // get a account from account table
    $result = mysql_query("SELECT *FROM account WHERE phonenumber = $phonenumber");
    
    if(!empty($result)){
        // check for empty result
        if(mysql_num_rows($result) > 0){
            
            $result = mysql_fetch_array($result);
            
            $account = array();
            $product["username"] = $result["username"];
            $product["password"] = $result["password"];
            $product["email"] = $result["email"];
            $product["phonenumber"] = $result["phonenumber"];
            
            // success
            $response["success"] = 1;
            
            // user node
            $response["account"] = array();
            
            array_push($response["account"], $account);
            
            // echoing JSON response
            echo json_encode($response);
        } else {
            // no account found
            $response["success"] = 0;
            $response["message"] = "No account found.";
            // echo no account JSON
            echo json_encode($response);
        }
    } else {
        // no account found
        $response["success"] = 0;
        $response["message"] = "No account found.";
        
        // echo no acouunt json
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