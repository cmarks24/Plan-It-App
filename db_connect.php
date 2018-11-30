<?php

class DB_CONNECT {
    
    // constructor
    function __construct(){
        // connects to db
        $this->connect();
    }
    
    // destructor
    function __destruct(){
        // closing the connection
        $this->close();
    }
    
    // function to connect with db
    function connect(){
        // import db connection variables
        require_once __DIR__.'/db_config.php';
        
        // connecting to mysql database
        $con = mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die(mysql_error());
        
        // returning connection cursor
        return $con;
    }
    
    // function to close connection to db
    function close(){
        // closing db connection
        mysql_close();
    }
    
}

?>