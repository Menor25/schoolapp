<?php
session_start();
require "private/database.php";


// function for Parent login
function parentLogin($username = NULL, $password = NULL){
    global $connection;
    global $Error;


    $stmt = $connection->prepare('SELECT * FROM parent WHERE username = ? AND password = ?');
    $stmt->bind_param('ss', $username, $password,);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 0){
        $_SESSION[$Error] = "Username or password is incorrect";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
        header('Location: login.php');
    }
        
    else{
        while($rows = $result->fetch_assoc()){
            $_SESSION['parent']['id'] = $rows['id'];
            $_SESSION['fname']['id'] = $rows['fname'];
            $_SESSION['gender']['id'] = $rows['gender'];
            $_SESSION['religion']['id'] = $rows['religion'];
            $_SESSION['country']['id'] = $rows['country'];
            $_SESSION['parent_state']['id'] = $rows['parent_state'];
            $_SESSION['occupation']['id'] = $rows['occupation'];
            $_SESSION['address']['id'] = $rows['address'];
            $_SESSION['username']['id'] = $rows['username'];
            $_SESSION['parent_phone']['id'] = $rows['parent_phone'];
            $_SESSION['parent_photo']['id'] = $rows['parent_photo'];
            

            header('Location: ../parent/index.php');
        }
    }
    
    $stmt->close();

}

//function for admin logout
function parentLogout(){
    global $Error;

    unset($_SESSION['parent']);
    $_SESSION[$Error] = "You have logged out successfully.";
    $_SESSION['msg_type'] = "success";
    header('Location: login.php');
    exit();
}

//select function for parent kids
function selectKid(){
    global $connection;
    $data = array();

    $parent = $_SESSION['fname']['id'];

    $stmt = $connection->prepare('SELECT * FROM admin_new');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//select function for school fees payment
function selectSchoolFees(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM admin_new');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}