<?php
    
    // define('DB_NAME', 'smsdb');
    // define('DB_USER', 'root');
    // define('DB_PASS', '');
    // define('DB_HOST', 'localhost');

    // $string = "mysql:host = localhost;dbname = smsdb";

    // if(!$connection = new PDO($string, DB_USER, DB_PASS))
    // {
    //     die("Failed to connect to database");
    // }

    $connection = new mysqli('localhost', 'root', 'system25$', 'smsdb');
    if($connection->connect_error){
        exit('Error connecting to database');
    }

?>