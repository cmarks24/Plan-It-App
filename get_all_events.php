<?php

/*
    lists all events
*/

// array for json response
$response = array();

// include db connect class
require_once __DIR__.'/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$result = mysql_query("SELECT * FROM events") or die(mysql_error());

// check for empty result
if(mysql_num_rows($result) > 0){
    // looping through all results
    // products node
    $response["events"] = array();
    
    while($row = mysql_fetch_array($result)){
        // temp user array
        $event = array();
        $event["date"] = $row["date"];
        $event["description"] = $row["description"];
        $event["endtime"] = $row["endtime"];
        $event["name"] = $row["name"];
        $event["starttime"] = $row["starttime"];
        
        // push single event into final response array
        array_push($response["events"], $event);
    }
    
    // success
    $response["success"] = 1;
    
    // echoing json response
    echo json_encode($response);
} else {
    // no events found
    $response["success"] = 0;
    $response["message"] = "No products found";
    
    echo json_encode($response);
}

?>