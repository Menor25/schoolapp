<?php
    // session_start();
    error_reporting(0);
    include('private/database.php');
    include('private/functions.php');

    // if(!$_SESSION['username']){
    //     header('Location: login.php');
    // }

    if(!isset($_SESSION['parent']['id'])){
        header('Location: login.php');
        exit();
    }
?>