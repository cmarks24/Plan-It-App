<?php

/*
    will create a new event row
    All event details are from HTTP Post Request
*/

// array for JSON response
$response = array();

// check for required fields
if(isset($_POST['date']) && isset($_POST['description']) && isset($_POST['name']) && isset($_POST['starttime']) && isset($_POST['endtime'])){
    
    $date = $_POST['date'];
    $description = $_POST['description'];
    $name = $_POST['name'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    
    // include db connect class
    require_once __DIR__.'/db_connect.php';
    
    // connecting to db
    $db = new DB_CONNECT();
    
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO events(date, description, name, starttime, endtime) VALUES('$date', '$description', '$name', '$starttime', '$endtime')");
    
    // check if was inserted
    if($result){
        // successful
        $response["success"] = 1;
        $response["message"] = "Event successfully created.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed
        $response["success"] = 0;
        $response["message"] = "Event was not created.";
        
        // echo response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing.";
    
    // echoing JSON response
    echo json_encode($response);
}

?>