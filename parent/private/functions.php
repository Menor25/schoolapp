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

//select function for school fees payment
function selectPayment(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM tblpayment');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//Insert payment details
function paymentDetails($fname = NULL, $schoolId = NULL, $className = NULL, $amount = NULL, $pname = NULL, $email = NULL, $phone = NULL)
{
    
    $Error = "";
    global $Error;
    global $connection;

        //Check if it is a valid subject name
        if (!preg_match("/^[A-Za-z A-Za-z]+$/", $pname)) {
            $_SESSION[$Error] = "Your name should contain only words.";
            $_SESSION['msg_type'] = "danger";

        }

    $stmt1 = $connection->prepare('SELECT * FROM payment_details');
    $stmt1->execute();
    $result = $stmt1->get_result();



    if ($Error == "") {
        if ($result->num_rows != 0) {
            $_SESSION[$Error] = "Payment details already exist for this child";
            $_SESSION['msg_type'] = "danger";
        }else{
            $stmt = $connection->prepare('INSERT INTO payment_details (fname, schoolId, className, amount, pname, email, phone)
            VALUES(?,?,?,?,?,?,?)');
            $stmt->bind_param('sssssss', $fname, $schoolId, $className, $amount, $pname, $email, $phone);
            $stmt->execute();
            $stmt->close();
            header('Location: payment.php');  
        }  
       
  
    }

    exit;
    
}

//select function for payment details
function selectPaymentDetails(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM payment_details');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}