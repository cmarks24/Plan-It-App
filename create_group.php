<?php

/*
creates a new group row
all group details are read from HTTP Post request
*/

// array for JSOn response
$response = array();

// check for required fields
if(isset($_POST['member']) && isset($_POST['groupid'])){
    
    $member = $_POST['member'];
    $groupid = $_POST['groupid'];
    
    // include db connect class
    require_once __DIR__.'/db_connect.php';
    
    // connecting to db
    $db = new DB_CONNECT();
    
    // mysql inserting a new row
    $result mysql_query("INSERT INTO groups(member, groupid) VALUES('$member', '$groupid')");
    
    // check if row inserted or not
    if($result){
        // success
        $response["success"] = 1;
        $response["message"] = "Group successfully created.";
    } else {
        // failed
        $response["success"] = 0;
        $response["message"] = "Group was not created.";
        
        // echo JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"]= "Required field(s) missing.";
    
    // echoing JSON response
    echo json_encode($response);
}

?>