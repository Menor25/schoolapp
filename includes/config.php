<?php
    $connection = new mysqli("localhost", "root", "system25$", "smsdb");
    if($connection->connect_error){
        exit('Error connecting to database');
    }
?>