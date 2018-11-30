<?php

/*
    will get a single event detail
    event is identified by name and date
*/

// array for JSON response
$response = array();

// include db connect class
$db - new DB_CONNECT();

// check for post data
if(isset($_GET["name"]) && isset($_GET["date"])){
    
    $name = $_GET['name'];
    $date = $_GET['date'];
    
    // get an event from events table
    $result = mysql_query("SELECT * FROM events WHERE name = $name AND date = $date");
    
    if(!empty($result)){
        // check for empty result
        if(mysql_num_rows($result) > 0){
            
            $result = mysql_fetch_array($result);
            
            $event = array();
            $event["date"] = $result["date"];
            $event["description"] = $result["description"];
            $event["name"] = $result["name"];
            $event["starttime"] = $result["starttime"];
            $event["endtime"] = $result["endtime"];
            
            // success
            $response["success"] = 1;
            
            // user node
            $response["event"] = array();
            
            array_push($response["event"], $event);
            
            // echo json response
            echo json_encode($response);
        } else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "No product found.";
            
            // echo no uesrs json
            echo json_encode($response);
        }
    }
} else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "Required field(s) missing.";
        
        echo json_encode($response);
}
?>
