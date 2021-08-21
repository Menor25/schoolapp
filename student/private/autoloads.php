<?php
    // session_start();
    // error_reporting(0);
    include('private/database.php');
    include('private/functions.php');


    if(!isset($_SESSION['student']['id'])){
        header('Location: login.php');
        exit();
    }
?>