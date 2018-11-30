<?php

/*
lists all members of a group
determines group by groupid
*/

// array for JSON response
$response = array();

// include db connect class
require_once __DIR__.'/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all members of a group
$result = mysql_query("SELECT * FROM groups WHERE groupid = $groupid") or die(mysql_error());

// check for empty result
if(mysql_num_rows($result) > 0){
    // looping through all results 
    // groups node
    $response["groups"] = array();
    
    while($row = mysql_fetch_array($result)){
        // temp user array
        $group = array();
        $group["member"] = $row["member"];
        $group["groupid"] = $row["groupid"];
        
        // push single group into final response array
        array_push($response["groups"], $group);
    }
    
    // success
    $response["success"] = 1;
    
    // echo no users JSON
    echo json_encode($response);
}

?>