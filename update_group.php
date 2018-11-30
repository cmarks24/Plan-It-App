<?php

/*
updeate a group info
a group is identified by group id
*/

// array for JSON response
$response = array();

// check for required fields
if(isset($_POST['member']) && isset($_POST['groupid'])){
    
    $member = $_POST['member'];
    $groupid = $_POST['groupid'];
    
    // include db connect class
    require_once __DIR__.'/db_connect.php';
    
    // connecting to db
    $db = new DB_CONNECT();
    
    // mysql update row with matched group id
    $result = mysql_query("UPDATE groups SET member = '$member', groupid = '$groupid'");
    
    // check if row inserted or not
    if($result){
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully updated.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) missing.";
    
    // echo json response
    echo json_encode($response);
}

?>