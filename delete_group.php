<?php
/*
deletes a product from table
a product is identified by group id
*/

// array for JSON response
$response = array();

// check for JSOn response
if(isset($_POST['groupid'])){
    $groupid = $_POST['groupid'];
    
    // include db connect class
    require_once __DIR__.'/db_connect.php';
    
    // connecting to db
    $db = new DB_CONNECT();
    
    // mysql update row with matched groupid
    $result = mysql_query("DELETE FROM groups WHERE groupid = $groupid");
    
    // check if row deleted or not
    if(mysql_affected_rows() > 0){
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Group successfully deleted.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        // no group found
        $response["success"] = 0;
        $response["message"] = "No group found.";
        
        // echo json
        echo json_encode($response);
    }
} else {
    // required field missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) missing.";
    
    // echoing JSON response
    echo json_encode($response);
}
?>