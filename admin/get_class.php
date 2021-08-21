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
    $stmt = $connection->prepare("SELECT class_name,id FROM class WHERE schoolId = ?");
    $stmt->bind_param('s', $sid);
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
    $stmt->close();
}
?>

<?php
// Code for Subjects
if(!empty($_POST["classId"])) 
{
    $cid=$_POST['classId'];
    if(is_numeric($cid)){
    
        echo htmlentities("invalid Class");exit;
    }
    else{
    $stmt1 = $connection->prepare("SELECT * FROM school_fees WHERE className = ?");
    $stmt1->bind_param('s', $cid);
    $stmt1->execute();
    $result = $stmt1->get_result();
?>
    <option value="">Select Class </option>
<?php
    while ($row = $result->fetch_assoc()) {
        $studentAmount = $row['feeAmount'];

?>
     <option value="<?= $studentAmount ?>"><?= $studentAmount ?></option>
<?php

    }
    }
}

?>