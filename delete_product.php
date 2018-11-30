<?php

/*
delets an event from table
a product is identified by name and date
*/

// array for JSON response
$response = array();

// check for required fields
if(isset($_POST['name']) && isset(&_POST['date'])){
    $name = $_POST['name'];
    $date = $_POST['date'];
    
    // include db connect class
    require_once __DIR__.'/db_connect.php';
    
    // connecting to db
    $db = new DB_CONNECT();
    
    // mysql update row with matched name and date
    $result = mysql_query("DELETE FROM products WHERE name = $name AND date = $date");
    
    // check if deleted
    if(mysql_affect_rows() > 0){
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Event successfully deleted.";
        
        // echo JSON response
        echo json_encode($response);
    } else {
        // no event found
        $response["success"] = 0;
        $response["message"] = "No event found.";
        
        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) missing.";
    
    // echoing JSON response
    echo json_encode($response);
}

?>