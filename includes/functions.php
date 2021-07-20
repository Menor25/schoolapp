<?php
    include('config.php');

    // insert statement for admission
        function insert($applicant_name = NULL, $applicant_dob = NULL, $applicant_father_name = NULL, $applicant_gender = NULL, $applicant_mobile = NULL, $applicant_address = NULL, $applicant_country = NULL, $applicant_state = NULL){
            global $connection;
            $stmt = $connection->prepare('INSERT INTO admission (applicant_name, applicant_dob, applicant_father_name, applicant_gender, applicant_mobile, applicant_address, applicant_country, applicant_state) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->bind_param('ssssssss', $applicant_name, $applicant_dob, $applicant_father_name, $applicant_gender, $applicant_mobile, $applicant_address, $applicant_country, $applicant_state);
            $stmt->execute();
            $stmt->close();
            header('Location: index.php');
        }

    //Select statement for school details
    function schoolDetails($school_id = NULL){
        global $connection;
        $stmt = $connection->prepare('SELECT * FROM tblschool WHERE school_id = ?');
        $stmt->bind_param('i', $school_id );
        $stmt->execute();
        $result = $stmt->get_result();
    
        if($result->num_rows === 0)
        {
            echo ('No record found');
        }else {
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row;
        }
    }

    // insert statement for General school details
    function insertSchoolSetting($schoolName=NULL, $schoolAddress=NULL, $schoolEmail=NULL, $schoolPhone=NULL, $schoolLogo=NULL){
        global $connection;
        $schoolName = $_POST['schoolName'];
        $schoolAddress = $_POST['schoolAddress'];
        $schoolEmail = $_POST['schoolEmail'];
        $schoolPhone = $_POST['schoolPhone'];

        //Check extensions
        $ext = pathinfo($_FILES['schoolLogo']['name']);
        if($ext['extension']=="jpg" || $ext['extension']=="png" || $ext['extension']=="gif"){
            $schoolLogo = $_FILES['schoolLogo']['name'];
        }else{
            echo "Not a valid image file";
        }

        $schoolLogo_temp = $_FILES['schoolLogo']['tmp_name'];
        move_uploaded_file($schoolLogo_temp, "../images/$schoolLogo");

        $stmt = $connection->prepare('INSERT INTO tblschool (schoolName, schoolAddress, schoolEmail, schoolPhone, schoolLogo) VALUES(?, ?, ?, ?, ?)');
        $stmt->bind_param('sssss', $schoolName, $schoolAddress, $schoolEmail, $schoolPhone, $schoolLogo);
        $stmt->execute();
        $stmt->close();
        header('Location: ./generalinfo.php');
    }

    //update statement for general school details
    function updateSchoolDetails($schoolName=NULL, $schoolAddress=NULL, $schoolEmail=NULL, $schoolPhone=NULL, $schoolLogo=NULL, $school_id){
        global $conn;
        $stmt = $conn->prepare('UPDATE tblschool SET schoolName = ?, schoolAddress = ?, schoolEmail = ?, schoolPhone = ?, schoolLogo = ?, WHERE school_id = ?');
        $stmt->bind_param('sssssi', $schoolName, $schoolAddress, $schoolEmail, $schoolPhone, $schoolLogo, $school_id);
        $stmt->execute();

        if($stmt->affected_rows === 0) echo ('No course was updated');
        $stmt->close();
   }

   // insert statement for registering student
   function registerStudent($full_name = NULL, $dob = NULL, $gender = NULL, $stAddress = NULL, $stLga = NULL, $stateOfOrigin = NULL, $parent_id = NULL, $contact = NULL, $section_id = NULL,  $class_id = NULL, $join_date = NULL, $username = NULL, $password = NULL, $student_img = NULL){
    global $connection;

    //Check extensions
    $ext = pathinfo($_FILES['student_img']['name']);
    if($ext['extension']=="jpg" || $ext['extension']=="png" || $ext['extension']=="gif"){
        $student_img = $_FILES['student_img']['name'];
    }else{
        echo "Not a valid image file";
    }

    $student_img_temp = $_FILES['student_img']['tmp_name'];
    move_uploaded_file($student_img_temp, "./images/$student_img");

    $stmt = $connection->prepare('INSERT INTO student (full_name, dob, gender, stAddress, stLga, stateOfOrigin, parent_id, contact, section_id, class_id, join_date, username, password, student_img) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('sssssssssssssss', $full_name, $dob, $gender, $stAddress, $stLga, $stateOfOrigin, $parent_id, $contact, $section_id, $class_id, $join_date, $username, $password, $student_img);
    $stmt->execute();
    $stmt->close();
    header('Location: ./index.php');
}

//update statement for student details
function updateStudentDetails($full_name = NULL, $dob = NULL, $gender = NULL, $stAddress = NULL, $stLga = NULL, $stateOfOrigin = NULL, $parent_id = NULL, $contact = NULL, $section_id = NULL,  $class_id = NULL, $join_date = NULL, $username = NULL, $password = NULL, $student_img = NULL, $id = NULL){
    global $conn;
    $stmt = $conn->prepare('UPDATE student SET full_name = ?, dob = ?, gender = ?, stAddress = ?, stLga = ?, stateOfOrigin = ?, parent_id = ?, contact = ?, section_id = ?, class_id = ?, join_date = ?, username = ?, password = ?, student_img = ?, WHERE id = ?');
    $stmt->bind_param('ssssssssssssssi', $full_name, $dob, $gender, $stAddress, $stLga, $stateOfOrigin, $parent_id, $contact, $section_id, $class_id, $join_date, $username, $password, $student_img, $id);
    $stmt->execute();

    if($stmt->affected_rows === 0) echo ('No course was updated');
    $stmt->close();
}
        
?>