<?php
    include('private/database.php');
    include('private/functions.php');

if(!empty($_POST["schoolId"])) 
{
    $sid=$_POST['schoolId'];
    if(is_numeric($sid)){
    
        echo htmlentities("invalid Class");exit;
    }
    else{
    $stmt = $connection->prepare("SELECT class_name,id FROM class");
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <option value="">Select Class </option>
    <?php
    while ($row = $result->fetch_assoc()) {
        $studentClass = $row['class_name'];

    ?>
    <option value="<?= $studentClass ?>"><?= $studentClass ?></option>
    <?php

    }
    }
}

//for due amount
if(!empty($_POST["classId"])) 
{
    $sid=$_POST['classId'];
    if(is_numeric($sid)){
    
        echo htmlentities("invalid Class");exit;
    }
    else{
    $stmt = $connection->prepare("SELECT * FROM school_fees WHERE className = ?");
    $stmt->bind_param('s', $sid);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <option value="">Select Amount </option>
    <?php
    while ($row = $result->fetch_assoc()) {
        $studentFee = $row['feeAmount'];

    ?>
    <option value="<?= $studentFee ?>"><?= $studentFee ?></option>
    <?php

    }
    }
}

?>