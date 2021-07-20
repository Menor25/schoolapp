<?php
    $connection = new mysqli("localhost", "root", "", "smsdb");
    if($connection->connect_error){
        exit('Error connecting to database');
    }
?>