<?php
session_start();
require "private/database.php";


// function for Teacher login
function studentLogin($username = NULL, $password = NULL){
    global $connection;
    global $Error;


    $stmt = $connection->prepare('SELECT * FROM admin_new WHERE username = ? AND password = ?');
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
            $_SESSION['student']['id'] = $rows['id'];
            $_SESSION['fname']['id'] = $rows['fname'];
            $_SESSION['gender']['id'] = $rows['gender'];
            $_SESSION['dob']['id'] = $rows['dob'];
            $_SESSION['parent']['id'] = $rows['parent'];
            $_SESSION['parent_phone']['id'] = $rows['parent_phone'];
            $_SESSION['username']['id'] = $rows['username'];
            $_SESSION['school']['id'] = $rows['school'];
            $_SESSION['class']['id'] = $rows['class'];
            $_SESSION['admission_Id']['id'] = $rows['admission_Id'];
            $_SESSION['address']['id'] = $rows['address'];
            $_SESSION['phone']['id'] = $rows['phone'];
            $_SESSION['state']['id'] = $rows['state'];
            $_SESSION['st_photo']['id'] = $rows['st_photo'];
            

            header('Location: ../student/index.php');
        }
    }
    
    $stmt->close();

}

//function for Teacher logout
function studentLogout(){
    global $Error;

    unset($_SESSION['student']);
    $_SESSION[$Error] = "You have logged out successfully.";
    $_SESSION['msg_type'] = "success";
    header('Location: login.php');
    exit();
}

//select function for assign class
function selectMyStudent(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM assign_class WHERE teacher = ?');
    $stmt->bind_param('s', $_SESSION['fname']['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}