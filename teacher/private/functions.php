<?php
session_start();
require "private/database.php";


// function for Teacher login
function teacherLogin($username = NULL, $password = NULL){
    global $connection;
    global $Error;


    $stmt = $connection->prepare('SELECT * FROM staff WHERE username = ? AND password = ? AND staff_role = "Teacher"');
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
            $_SESSION['teacher']['id'] = $rows['id'];
            $_SESSION['fname']['id'] = $rows['fname'];
            $_SESSION['gender']['id'] = $rows['gender'];
            $_SESSION['father_name']['id'] = $rows['father_name'];
            $_SESSION['mother_name']['id'] = $rows['mother_name'];
            $_SESSION['religion']['id'] = $rows['religion'];
            $_SESSION['joined_date']['id'] = $rows['joined_date'];
            $_SESSION['section']['id'] = $rows['section'];
            $_SESSION['staff_role']['id'] = $rows['staff_role'];
            $_SESSION['address']['id'] = $rows['address'];
            $_SESSION['username']['id'] = $rows['username'];
            $_SESSION['staff_phone']['id'] = $rows['staff_phone'];
            $_SESSION['staff_photo']['id'] = $rows['staff_photo'];
            

            header('Location: ../teacher/index.php');
        }
    }
    
    $stmt->close();

}

//function for Teacher logout
function teacherLogout(){
    global $Error;

    unset($_SESSION['teacher']);
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