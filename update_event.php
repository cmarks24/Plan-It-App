<?php

/*
Following code will update a event information
an event is identified by name and date
*/

// array for json response
$response = array();

// check for required fields
if(isset($_POST['name']) && isset(&_POST['date']) && isset($_POST['starttime']) && isset($_POST['endtime'])){
    $name = $_POST['name'];
    $date = $_POST['date'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    if(isset($_POST['description'])){
        $description = $_POST['description'];
    } else {
        $description = "No description given.";
    }
    
    // include db connect class
    require_once __DIR__.'/db_connect.php';
    
    // connecting to db
    $db = new DB_CONNECT();
    
    //mysql update row with matched name and date
    $result = mysql_query("UPDATE events SET name = '$name', date = '$date', starttime = '$starttime', endtime = '$endtime', description = '$description' WHERE name = $name AND date = $date");
    
    // check if row inserted or not
    if($result){
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Event updated.";
        // echo JSON response
        echo json_encode($response);
    } else {
        
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) missing.";
    
    // echoing JSON response
    echo json_encode($response);
}

?>