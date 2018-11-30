<?php

/*
gets single groups detail
group is identified by group id
*/

// array for JSON response
$response = array();

require_once __DIR__.'/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// check for post data
if(isset($_GET["groupid"])){
    $groupid = $_GET['groupid'];
    
    // get a group from groups table
    $result = mysql_query("SELECT *FROM groups WHERE groupid = $groupid");
    
    if(!empty($result)){
        // check for empty result
        if(mysql_num_rows($result) > 0){
            $result = mysql_fetch_array($result);
            
            $group = array();
            $group["member"] = $result["member"];
            $group["groupid"] = $result["groupid"];
            
            // success
            $response["success"] = 1;
            
            // user node
            $response["group"] = array();
            
            array_push($response["group"], $group);
            
            // echoing response
            echo json_encode($response);
        }
    } else {
            // no group found
            $response["success"] = 0;
            $response["message"] = "No group found.";
            
            // echo no users JSON
            echo json_encode($response);
        }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) missing";
        
    // echoing json response
    echo json_encode($response);
}
?>