<?php
session_start();
require "private/database.php";

//Insert Admission form
function admitForm($fname = NULL, $gender = NULL, $dob = NULL, $blood_group = NULL, $religion = NULL, $parent = NULL, $occupation = NULL, $parent_phone = NULL, $username = NUll, $password = NULL, $school = NULL, $class = NULL, $school_fees = NULL, $admission_Id = NULL, $address = NULL, $phone = NULL, $state = NULL, $st_photo = NULL)
{
    $Error = "";
    global $Error;
    global $connection;

    $target_dir = "../images/$fname";
    $st_photo = $target_dir . basename($_FILES["st_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($st_photo, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["st_photo"]["tmp_name"]);
    if ($check == false) {
        $_SESSION[$Error] = "File is not an image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check if file already exists
    if (file_exists($st_photo)) {
        $_SESSION[$Error] = "Sorry, image already exists.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check file size
    if ($_FILES["st_photo"]["size"] > 500000) {
        $_SESSION[$Error] = "Sorry, your image is too large.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION[$Error] = "Sorry, only JPG, JPEG and PNG files are allowed.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid username
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $username)) {
        $_SESSION[$Error] = "Please enter a valid username.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid password
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $password)) {
        $_SESSION[$Error] = "Password must contain number and word";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid school amount
    if (!preg_match("/^[0-9]+$/", $school_fees)) {
        $_SESSION[$Error] = "School fees should contain numbers only";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid phone number
    if (!preg_match("/^[0-9]+$/", $phone)) {
        $_SESSION[$Error] = "Please enter a valid phone number.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    if ($Error == "") {
        move_uploaded_file($_FILES["st_photo"]["tmp_name"], $st_photo);

        $stmt = $connection->prepare('INSERT INTO admin_new (fname, gender, dob, blood_group, religion, parent, occupation, parent_phone, username, password, school, class, school_fees, admission_Id, address, phone, state, st_photo)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('ssssssssssssssssss', $fname, $gender, $dob, $blood_group, $religion, $parent, $occupation, $parent_phone, $username, $password, $school, $class, $school_fees, $admission_Id, $address, $phone, $state, $st_photo);
        $stmt->execute();
        $stmt->close;

        $_SESSION[$Error] = "New student added successfully!";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);

        header('Location: all-student.php');
    }
}

//Select function for New student
function selectStudentNew(){
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

//Edit function for student details
function editStudent($fname = NULL, $gender = NULL, $dob = NULL, $blood_group = NULL, $religion = NULL, $parent = NULL, $occupation = NULL, $parent_phone = NULL, $username = NUll, $password = NULL, $school = NULL, $class = NULL, $school_fees = NULL, $admission_Id = NULL, $address = NULL, $phone = NULL, $state = NULL, $st_photo = NULL, $id){
    $Error = "";
    global $connection;

    $target_dir = "../images/$fname";
    $st_photo = $target_dir . basename($_FILES["st_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($st_photo, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["st_photo"]["tmp_name"]);
    if ($check == false) {
        $_SESSION[$Error] = "File is not an image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check if file already exists
    if (file_exists($st_photo)) {
        $_SESSION[$Error] = "Sorry, image already exists.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check file size
    if ($_FILES["st_photo"]["size"] > 500000) {
        $_SESSION[$Error] = "Sorry, your image is too large.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION[$Error] = "Sorry, only JPG, JPEG and PNG files are allowed.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid username
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $username)) {
        $_SESSION[$Error] = "Please enter a valid username.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid password
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $password)) {
        $_SESSION[$Error] = "Password must contain number and word";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid school amount
    if (!preg_match("/^[0-9]+$/", $school_fees)) {
        $_SESSION[$Error] = "School fees should contain numbers only";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid phone number
    if (!preg_match("/^[0-9]+$/", $phone)) {
        $_SESSION[$Error] = "Please enter a valid phone number.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    if ($Error == "") {
        move_uploaded_file($_FILES["st_photo"]["tmp_name"], $st_photo);

        $stmt = $connection->prepare("UPDATE admin_new SET fname = ?, gender = ?, dob = ?, blood_group = ?, religion = ?, parent = ?, occupation = ?, parent_phone = ?, username = ?, password = ?, school = ?, class = ?, school_fees = ?, admission_Id = ?, address = ?, phone = ?, state = ?, st_photo = ? WHERE id = ?");
        $stmt->bind_param('ssssssssssssssssssi', $fname, $gender, $dob, $blood_group, $religion, $parent, $occupation, $parent_phone, $username, $password, $school, $class, $school_fees, $admission_Id, $address, $phone, $state, $st_photo, $id);
        $stmt->execute();
        
        if ($stmt->affected_rows === 0) {

            $_SESSION[$Error] = "Unable to update student details!";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        } else {
    
            $_SESSION[$Error] = "Student details updated successfully!";
            $_SESSION['msg_type'] = "success";
            // header('Location: all-class.php');
            return ($_SESSION[$Error]);
        }
        $stmt->close();
    }
}

//Delete function for deleting student details
function deleteStudent($id){
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM admin_new WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete student details.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all-class.php');
        } else {
            $_SESSION[$Error] = "Student details deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);


            header('Location: all-student.php');
        }
        $stmt->close();
        header('Location: all-student.php');
    }
}

//Insert function for class
function insertClass($class_name = NULL, $schoolId = NULL, $no_of_subjects = NULL, $form_teacher = NULL, $fees = NULL)
{

    global $Error;
    global $connection;
    $Error = "";

    //Check if it is a valid class name
    if (!preg_match("/^[A-Z A-Z]+ [0-9A-Z]+$/", $class_name)) {
        $_SESSION[$Error] = "Class name must be in capital letter and contain a number";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-class.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid subject number
    elseif (!preg_match("/^[0-9]+$/", $no_of_subjects)) {
        $_SESSION[$Error] = "Please enter a valid number";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-class.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[a-zA-Z]+[0-9]+$/", $fees)) {
        $_SESSION[$Error] = "Please enter a valid fees amount";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-class.php');
        return ($_SESSION[$Error]);
    }


    if ($Error == "") {
        $stmt1 = $connection->prepare('SELECT * FROM class WHERE class_name = ?');
        $stmt1->bind_param('s', $class_name);
        $stmt1->execute();
        $result = $stmt1->get_result();
        if ($result->num_rows != 0) {

            header('Location: add-class.php');
            return ($_SESSION[$Error] = "Class already exist.");
        }

        $stmt = $connection->prepare('INSERT INTO class (class_name, schoolId, no_of_subjects, form_teacher, fees)
            VALUES(?,?,?,?,?)');
        $stmt->bind_param('ssiss', $class_name, $schoolId, $no_of_subjects, $form_teacher, $fees);
        $stmt->execute();
        $stmt->close();
        $_SESSION[$Error] = "Class added successfully.";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);
    }
}

//Select function to display class
function selectClass()
{
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM class');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//update function to Edit class  
function classUpdate($class_name = NULL, $schoolId = NULL, $no_of_subjects = NULL, $form_teacher = NULL, $fees = NULL, $id)
{
    global $connection;
    $Error = "";

    if (!preg_match("/^[A-Z A-Z]+ [0-9A-Z]+$/", $class_name)) {
        $_SESSION[$Error] = "Class name must be in capital letter and contain a number";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-class.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid subject number
    elseif (!preg_match("/^[0-9]+$/", $no_of_subjects)) {
        $_SESSION[$Error] = "Please enter a valid number";
        $_SESSION['msg_type'] = "danger";

        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[a-zA-Z]+[0-9]+$/", $fees)) {
        $_SESSION[$Error] = "Please enter a valid amount";
        $_SESSION['msg_type'] = "danger";

        return ($_SESSION[$Error]);
    }


    $stmt = $connection->prepare("UPDATE class SET class_name = ?, schoolId = ?, no_of_subjects = ?, form_teacher = ?, fees = ? WHERE id = ?");
    $stmt->bind_param('ssissi', $class_name, $schoolId, $no_of_subjects, $form_teacher, $fees, $id);
    $stmt->execute();

    if ($stmt->affected_rows === 0) {

        $_SESSION[$Error] = "Unable to update class!";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    } else {

        $_SESSION[$Error] = "Class updated successfully!";
        $_SESSION['msg_type'] = "success";
        // header('Location: all-class.php');
        return ($_SESSION[$Error]);
    }
    $stmt->close();
}

//Delete function for class
function deleteClass($id)
{
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM class WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete class.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all-class.php');
        } else {
            $_SESSION[$Error] = "Class deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);


            header('Location: all-class.php');
        }
        $stmt->close();
        header('Location: all-class.php');
    }
}

//Insert function for class
function insertLibrary($book_name = NULL, $subject = NULL, $author = NULL, $class = NULL, $published = NULL, $edition = NULL, $book_id = NUll)
{

    global $Error;
    global $connection;
    $Error = "";

    //Check if it is a valid book name
    if (!preg_match("/^[A-Z a-z]+$/", $book_name)) {
        $_SESSION[$Error] = "Book name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid subject name
    if (!preg_match("/^[A-Z a-z]+$/", $subject)) {
        $_SESSION[$Error] = "Subject name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid author name
    if (!preg_match("/^[A-Z. a-z.]+$/", $author)) {
        $_SESSION[$Error] = "Author's name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid published year
    elseif (!preg_match("/^[0-9]+$/", $published)) {
        $_SESSION[$Error] = "Please only number is accepted.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[A-Z a-z 0-9]+$/", $edition)) {
        $_SESSION[$Error] = "Please only numbers or letters are allowed in edition. No special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }
    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[0-9]+$/", $book_id)) {
        $_SESSION[$Error] = "Please only numbers are allowed in ID No. No special characters or letters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }


    if ($Error == "") {
        $stmt1 = $connection->prepare('SELECT * FROM library WHERE book_name = ?');
        $stmt1->bind_param('s', $book_name);
        $stmt1->execute();
        $result = $stmt1->get_result();
        if ($result->num_rows != 0) {

            header('Location: add-class.php');
            return ($_SESSION[$Error] = "Book already exist.");
        }

        $stmt = $connection->prepare('INSERT INTO library (book_name, subject, author, class, published, edition, book_id)
               VALUES(?,?,?,?,?,?,?)');
        $stmt->bind_param('sssssss', $book_name, $subject, $author, $class, $published, $edition, $book_id);
        $stmt->execute();
        $stmt->close();
        $_SESSION[$Error] = "Book added successfully.";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);
    }
}

//Select function to display Library books
function selectLibrary()
{
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM library');
    $stmt->execute();
    $result = $stmt->get_result();

    // if ($result->num_rows === 0){
    //     echo '
    //         <tr>
    //             <td colspan="4">NO DATA</td>
    //         </tr>
    //     ';
    // };
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//Delete function for Library book
function deleteLibrary($id)
{
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM library WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete book.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all-class.php');
        } else {
            $_SESSION[$Error] = "Book deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);


            // header('Location: library.php');
        }
        $stmt->close();
        // header('Location: library.php');
    }
}

//update function to Edit library books
function libraryEdit($book_name = NULL, $subject = NULL, $author = NULL, $class = NULL, $published = NULL, $edition = NULL, $book_id = NUll, $id)
{
    global $connection;
    $Error = "";

    //Check if it is a valid book name
    if (!preg_match("/^[A-Z a-z]+$/", $book_name)) {
        $_SESSION[$Error] = "Book name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-library.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid subject name
    if (!preg_match("/^[A-Z a-z]+$/", $subject)) {
        $_SESSION[$Error] = "Subject name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-library.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid author name
    if (!preg_match("/^[A-Z. a-z.]+$/", $author)) {
        $_SESSION[$Error] = "Author's name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-library.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid published year
    elseif (!preg_match("/^[0-9]+$/", $published)) {
        $_SESSION[$Error] = "Please only number is accepted.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-library.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[A-Z a-z 0-9]+$/", $edition)) {
        $_SESSION[$Error] = "Please only numbers or letters are allowed in edition. No special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-library.php');
        return ($_SESSION[$Error]);
    }
    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[0-9]+$/", $book_id)) {
        $_SESSION[$Error] = "Please only numbers are allowed in ID No. No special characters or letters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-library.php');
        return ($_SESSION[$Error]);
    }


    $stmt = $connection->prepare("UPDATE library SET book_name = ?, subject = ?, author = ?, class = ?, published = ?, edition = ?, book_id = ? WHERE id = ?");
    $stmt->bind_param('ssssssss', $book_name, $subject, $author, $class, $published, $edition, $book_id, $id);
    $stmt->execute();

    if ($stmt->affected_rows === 0) {

        $_SESSION[$Error] = "Unable to update book!";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    } else {

        $_SESSION[$Error] = "Book updated successfully!";
        $_SESSION['msg_type'] = "success";
        // header('Location: all-class.php');
        return ($_SESSION[$Error]);
    }
    $stmt->close();
}  

//Insert function for Bookshop
function insertBookshop($book_name = NULL, $subject = NULL, $author = NULL, $class = NULL, $published = NULL, $edition = NULL, $book_id = NUll)
{

    global $Error;
    global $connection;
    $Error = "";

    //Check if it is a valid book name
    if (!preg_match("/^[A-Z a-z]+$/", $book_name)) {
        $_SESSION[$Error] = "Book name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid subject name
    if (!preg_match("/^[A-Z a-z]+$/", $subject)) {
        $_SESSION[$Error] = "Subject name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid author name
    if (!preg_match("/^[A-Z. a-z.]+$/", $author)) {
        $_SESSION[$Error] = "Author's name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid published year
    elseif (!preg_match("/^[0-9]+$/", $published)) {
        $_SESSION[$Error] = "Please only number is accepted.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[A-Z a-z 0-9]+$/", $edition)) {
        $_SESSION[$Error] = "Please only numbers or letters are allowed in edition. No special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }
    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[0-9]+$/", $book_id)) {
        $_SESSION[$Error] = "Please only numbers are allowed in ID No. No special characters or letters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }


    if ($Error == "") {
        $stmt1 = $connection->prepare('SELECT * FROM bookshop WHERE book_name = ?');
        $stmt1->bind_param('s', $book_name);
        $stmt1->execute();
        $result = $stmt1->get_result();
        if ($result->num_rows != 0) {

            header('Location: add-class.php');
            return ($_SESSION[$Error] = "Book already exist.");
        }

        $stmt = $connection->prepare('INSERT INTO bookshop (book_name, subject, author, class, published, edition, book_id)
               VALUES(?,?,?,?,?,?,?)');
        $stmt->bind_param('sssssss', $book_name, $subject, $author, $class, $published, $edition, $book_id);
        $stmt->execute();
        $stmt->close();
        $_SESSION[$Error] = "Book added successfully.";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);
    }
}

//Select function to display Bookshop books
function selectBookshop()
{
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM bookshop');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//Delete function for Bookshop book
function deleteBookshop($id)
{
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM bookshop WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete book.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all-class.php');
        } else {
            $_SESSION[$Error] = "Book deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);


            header('Location: library.php');
        }
        $stmt->close();
        header('Location: library.php');
    }
}

//update function to Edit bookshop
function bookshopEdit($book_name = NULL, $subject = NULL, $author = NULL, $class = NULL, $published = NULL, $edition = NULL, $book_id = NUll, $id)
{
    global $connection;
    $Error = "";

    //Check if it is a valid book name
    if (!preg_match("/^[A-Z a-z]+$/", $book_name)) {
        $_SESSION[$Error] = "Book name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-bookshop.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid subject name
    if (!preg_match("/^[A-Z a-z]+$/", $subject)) {
        $_SESSION[$Error] = "Subject name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-bookshop.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid author name
    if (!preg_match("/^[A-Z. a-z.]+$/", $author)) {
        $_SESSION[$Error] = "Author's name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-bookshop.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid published year
    elseif (!preg_match("/^[0-9]+$/", $published)) {
        $_SESSION[$Error] = "Please only number is accepted.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-bookshop.php');
        return ($_SESSION[$Error]);
    }

    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[A-Z a-z 0-9]+$/", $edition)) {
        $_SESSION[$Error] = "Please only numbers or letters are allowed in edition. No special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-bookshop.php');
        return ($_SESSION[$Error]);
    }
    // //Check if it is a valid fees amount number
    elseif (!preg_match("/^[0-9]+$/", $book_id)) {
        $_SESSION[$Error] = "Please only numbers are allowed in ID No. No special characters or letters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-bookshop.php');
        return ($_SESSION[$Error]);
    }


    $stmt = $connection->prepare("UPDATE bookshop SET book_name = ?, subject = ?, author = ?, class = ?, published = ?, edition = ?, book_id = ? WHERE id = ?");
    $stmt->bind_param('ssssssss', $book_name, $subject, $author, $class, $published, $edition, $book_id, $id);
    $stmt->execute();

    if ($stmt->affected_rows === 0) {

        $_SESSION[$Error] = "Unable to update book!";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    } else {

        $_SESSION[$Error] = "Book updated successfully!";
        $_SESSION['msg_type'] = "success";
        header('Location: bookshop.php');
        return ($_SESSION[$Error]);
    }
    $stmt->close();
}  

//Insert function for subject
function insertSubject($subjectName = NULL, $school = NULL, $classSub = NULL, $subjectTeacher = NULL)
{

    global $Error;
    global $connection;
    $Error = "";

    //Check if it is a valid book name
    if (!preg_match("/^[A-Z a-z]+$/", $subjectName)) {
        $_SESSION[$Error] = "Subject name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: all-subject.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid subject name
    if (!preg_match("/^[A-Z a-z]+$/", $subjectTeacher)) {
        $_SESSION[$Error] = "Subject teacher name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: all-subject.php');
        return ($_SESSION[$Error]);
    }


    if ($Error == "") {
        $stmt1 = $connection->prepare('SELECT * FROM subject WHERE subjectName = ?');
        $stmt1->bind_param('s', $subjectName);
        $stmt1->execute();
        $result = $stmt1->get_result();
        if ($result->num_rows != 0) {

            header('Location: all-subject.php');
            return ($_SESSION[$Error] = "Subject already exist.");
        }

        $stmt = $connection->prepare('INSERT INTO subject (subjectName, school, classSub, subjectTeacher)
               VALUES(?,?,?,?)');
        $stmt->bind_param('ssss', $subjectName, $school, $classSub, $subjectTeacher);
        $stmt->execute();
        $stmt->close();
        $_SESSION[$Error] = "Subject created successfully.";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);
    }
}

//Select function for subject
function selectSubject(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM subject');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//Edit function for subject
function subjectEdit($subjectName = NULL, $school = NULL, $classSub = NULL, $subjectTeacher = NULL, $id){
    global $Error;
    global $connection;
    $Error = "";

    //Check if it is a valid book name
    if (!preg_match("/^[A-Z a-z]+$/", $subjectName)) {
        $_SESSION[$Error] = "Subject name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: all-subject.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid subject name
    if (!preg_match("/^[A-Z a-z]+$/", $subjectTeacher)) {
        $_SESSION[$Error] = "Subject teacher name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: all-subject.php');
        return ($_SESSION[$Error]);
    }


    $stmt = $connection->prepare("UPDATE subject SET subjectName = ?, school = ?, classSub = ?, subjectTeacher = ? WHERE id = ?");
    $stmt->bind_param('ssssi', $subjectName, $school, $classSub, $subjectTeacher, $id);
    $stmt->execute();

    if ($stmt->affected_rows === 0) {

        $_SESSION[$Error] = "Unable to update book!";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    } else {

        $_SESSION[$Error] = "Book updated successfully!";
        $_SESSION['msg_type'] = "success";
        header('Location: bookshop.php');
        return ($_SESSION[$Error]);
    }
    $stmt->close();
    
}

//Delete function for subject
function deleteSubject($id){
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM subject WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete subject.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all-class.php');
        } else {
            $_SESSION[$Error] = "Subject deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);


            header('Location: all-subject.php');
        }
        $stmt->close();
        header('Location: all-subject.php');
    }
}

// function for admin login
function adminLogin($username = NULL, $password = NULL){
    global $connection;
    global $Error;


    $stmt = $connection->prepare('SELECT * FROM staff WHERE username = ? AND password = ? AND staff_role = "Admin"');
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
            $_SESSION['staff']['id'] = $rows['id'];
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
            

            header('Location: ../admin/index.php');
        }
    }
    
    $stmt->close();

}

//function for admin logout
function adminLogout(){
    global $Error;

    unset($_SESSION['staff']);
    $_SESSION[$Error] = "You have logged out successfully.";
    $_SESSION['msg_type'] = "success";
    header('Location: login.php');
    exit();
}

//insert function for staff
function insertStaff($fname = NULL, $gender = NULL, $father_name = NULL, $mother_name = NULL, $dob = NULL, $marital_status = NULL, $religion = NULL, $country = NULL, $staff_state = NULL, $section = NULL, $staff_type = NULL, $staff_role = NULL, $qualification = NULL, $graduated_from = NULL, $course_study = NULL, $graduation_year = NULL, $certificate = NULL, $department = NULL, $username = NULL, $password = NULL, $address = NULL, $staff_phone = NULL, $referee = NULL, $ref_address  = NULL, $ref_phone = NULL, $staff_photo = NULL){
    global $Error;
    global $connection;
    $Error = "";

        // Staff certificate
        $target_dir1 = "../images/$fname";
        $certificate = $target_dir1 . basename($_FILES["certificate"]["name"]);
        $imageFileType = strtolower(pathinfo($certificate, PATHINFO_EXTENSION));
    
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["certificate"]["tmp_name"]);
        if ($check == false) {
            $_SESSION[$Error] = "Staff certificate is not an image.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Check if file already exists
        if (file_exists($certificate)) {
            $_SESSION[$Error] = "Sorry, staff certificate already exists.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Check file size
        if ($_FILES["certificate"]["size"] > 500000) {
            $_SESSION[$Error] = "Sorry, your certificate is too large.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION[$Error] = "Sorry, only JPG, JPEG and PNG files are allowed for certificate.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }

    // Staff Image
    $target_dir = "../images/$fname";
    $staff_photo = $target_dir . basename($_FILES["staff_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($staff_photo, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["staff_photo"]["tmp_name"]);
    if ($check == false) {
        $_SESSION[$Error] = "Staff image is not a valid image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check if file already exists
    if (file_exists($staff_photo)) {
        $_SESSION[$Error] = "Sorry, staff image already exists.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check file size
    if ($_FILES["staff_photo"]["size"] > 500000) {
        $_SESSION[$Error] = "Sorry, your staff image is too large.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION[$Error] = "Sorry, only JPG, JPEG and PNG files are allowed in staff image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    //Check for input validity
    if (!preg_match("/^[A-Za-z a-z]+$/", $fname)) {
        $_SESSION[$Error] = "Full Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $father_name)) {
        $_SESSION[$Error] = "Father's Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $mother_name)) {
        $_SESSION[$Error] = "Mother's Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $course_study)) {
        $_SESSION[$Error] = "Mother's Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $graduation_year)) {
        $_SESSION[$Error] = "Only number is allowed in graduation year.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $staff_phone)) {
        $_SESSION[$Error] = "Only number is allowed in phone number.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $staff_phone)) {
        $_SESSION[$Error] = "Only number is allowed in phone number.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $referee)) {
        $_SESSION[$Error] = "Referee's Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $ref_phone)) {
        $_SESSION[$Error] = "Only number is allowed in referee's phone number.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid username
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $username)) {
        $_SESSION[$Error] = "Please enter a valid username.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid password
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $password)) {
        $_SESSION[$Error] = "Password must contain number and word";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-staff.php');
        return ($_SESSION[$Error]);
    }

    if ($Error == "") {
        move_uploaded_file($_FILES["certificate"]["tmp_name"], $certificate);
        move_uploaded_file($_FILES["staff_photo"]["tmp_name"], $staff_photo);

        $stmt = $connection->prepare('INSERT INTO staff (fname, gender, father_name, mother_name, dob, marital_status, religion, country, staff_state, section, staff_type, staff_role, qualification, 	graduated_from, course_study, graduation_year, 	certificate, department, username, password, address, staff_phone, referee, ref_address, ref_phone, staff_photo)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('ssssssssssssssssssssssssss', $fname, $gender, $father_name, $mother_name, $dob, $marital_status, $religion, $country, $staff_state, $section, $staff_type, $staff_role, $qualification, $graduated_from, $course_study, $graduation_year, $certificate, $department, $username, $password, $address, $staff_phone, $referee, $ref_address, $ref_phone, $staff_photo);
        $stmt->execute();
        $stmt->close();

        $_SESSION[$Error] = "New staff added successfully!";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);

        header('Location: all-staff.php');
    }
}

//select function for staff
function selectStaff(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM staff');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//insert function for staff
function editStaff($fname = NULL, $gender = NULL, $father_name = NULL, $mother_name = NULL, $dob = NULL, $marital_status = NULL, $religion = NULL, $country = NULL, $staff_state = NULL, $section = NULL, $staff_type = NULL, $staff_role = NULL, $qualification = NULL, $graduated_from = NULL, $course_study = NULL, $graduation_year = NULL, $certificate = NULL, $department = NULL, $username = NULL, $password = NULL, $address = NULL, $staff_phone = NULL, $referee = NULL, $ref_address  = NULL, $ref_phone = NULL, $staff_photo = NULL, $id){
    global $Error;
    global $connection;
    $Error = "";

    // Staff certificate
    $target_dir1 = "../images/$fname";
    $certificate = $target_dir1 . basename($_FILES["certificate"]["name"]);
    $imageFileType = strtolower(pathinfo($certificate, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["certificate"]["tmp_name"]);
    if ($check == false) {
        $_SESSION[$Error] = "Staff certificate is not an image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check if file already exists
    if (file_exists($certificate)) {
        $_SESSION[$Error] = "Sorry, staff certificate already exists.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check file size
    if ($_FILES["certificate"]["size"] > 500000) {
        $_SESSION[$Error] = "Sorry, your certificate is too large.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $_SESSION[$Error] = "Sorry, only JPG, JPEG and PNG files are allowed for certificate.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

        // Staff Image
        $target_dir = "../images/$fname";
        $staff_photo = $target_dir . basename($_FILES["staff_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($staff_photo, PATHINFO_EXTENSION));
    
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["staff_photo"]["tmp_name"]);
        if ($check == false) {
            $_SESSION[$Error] = "Staff image is not a valid image.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Check if file already exists
        if (file_exists($staff_photo)) {
            $_SESSION[$Error] = "Sorry, staff image already exists.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Check file size
        if ($_FILES["staff_photo"]["size"] > 500000) {
            $_SESSION[$Error] = "Sorry, your staff image is too large.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION[$Error] = "Sorry, only JPG, JPEG and PNG files are allowed in staff image.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }

            //Check for input validity
    if (!preg_match("/^[A-Za-z a-z]+$/", $fname)) {
        $_SESSION[$Error] = "Full Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $father_name)) {
        $_SESSION[$Error] = "Father's Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $mother_name)) {
        $_SESSION[$Error] = "Mother's Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $course_study)) {
        $_SESSION[$Error] = "Mother's Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $graduation_year)) {
        $_SESSION[$Error] = "Only number is allowed in graduation year.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $staff_phone)) {
        $_SESSION[$Error] = "Only number is allowed in phone number.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $staff_phone)) {
        $_SESSION[$Error] = "Only number is allowed in phone number.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $referee)) {
        $_SESSION[$Error] = "Referee's Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $ref_phone)) {
        $_SESSION[$Error] = "Only number is allowed in referee's phone number.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid username
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $username)) {
        $_SESSION[$Error] = "Please enter a valid username.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid password
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $password)) {
        $_SESSION[$Error] = "Password must contain number and word";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-staff.php');
        return ($_SESSION[$Error]);
    }

    if ($Error == "") {

        $stmt = $connection->prepare("UPDATE staff SET fname = ?, gender = ?, father_name = ?, mother_name = ?, dob = ?, marital_status = ?, religion = ?, country = ?, staff_state = ?, section = ?, staff_type = ?, staff_role = ?, qualification = ?, graduated_from = ?, course_study = ?, graduation_year = ?, certificate = ?, department = ?, username = ?, password = ?, address = ?, staff_phone = ?, referee = ?, ref_address  = ?, ref_phone = ?, staff_photo = ? WHERE id = ?");
        $stmt->bind_param('ssssssssssssssssssssssssssi', $fname, $gender, $father_name, $mother_name, $dob, $marital_status, $religion, $country, $staff_state, $section, $staff_type, $staff_role, $qualification, $graduated_from, $course_study, $graduation_year, $certificate, $department, $username, $password, $address, $staff_phone, $referee, $ref_address, $ref_phone, $staff_photo, $id);
        $stmt->execute();
        
        if ($stmt->affected_rows === 1) {
            move_uploaded_file($_FILES["certificate"]["tmp_name"], $certificate);
            move_uploaded_file($_FILES["staff_photo"]["tmp_name"], $staff_photo);

            $_SESSION[$Error] = "Staff record updated successfully!";
            $_SESSION['msg_type'] = "success";

        } else {
            
            $_SESSION[$Error] = "Unable to update staff record!";
            $_SESSION['msg_type'] = "danger";
        }
        $stmt->close();
    }

       header('Location: edit-staff.php');
    
}

//Delete function for staff
function deleteStaff($id){
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM staff WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete staff record.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all-staff.php');
        } else {
            $_SESSION[$Error] = "Staff record deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);

        }
        $stmt->close();
        header('Location: all-staff.php');
    }
}

//insert function for parent
function insertParent($fname = NULL, $gender = NULL, $religion = NULL, $country = NULL, $parent_state = NULL, $occupation = NULL, $address = NULL, $username = NULL, $password = NULL, $parent_phone = NULL, $parent_photo = NULL){
    global $connection;
    global $Error;

        // Parent Image validation
        $target_dir = "../images/$fname";
        $parent_photo = $target_dir . basename($_FILES["parent_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($parent_photo, PATHINFO_EXTENSION));
    
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["parent_photo"]["tmp_name"]);
        if ($check == false) {
            $_SESSION[$Error] = "Parent image is not a valid image.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Check if file already exists
        if (file_exists($parent_photo)) {
            $_SESSION[$Error] = "Sorry, parent image already exist.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Check file size
        if ($_FILES["parent_photo"]["size"] > 500000) {
            $_SESSION[$Error] = "Sorry, parent image is too large.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION[$Error] = "Sorry, only JPG, JPEG and PNG files are allowed in parent image.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }

    //Check for input validity
    if (!preg_match("/^[A-Za-z a-z]+$/", $fname)) {
        $_SESSION[$Error] = "Full Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-parent.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $occupation)) {
        $_SESSION[$Error] = "Occupation must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-parent.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $parent_phone)) {
        $_SESSION[$Error] = "Only number is allowed in phone number.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-parent.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid username
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $username)) {
        $_SESSION[$Error] = "Please enter a valid username.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-parent.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid password
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $password)) {
        $_SESSION[$Error] = "Password must contain number and word";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-parent.php');
        return ($_SESSION[$Error]);
    }

    if ($Error == "") {
        move_uploaded_file($_FILES["parent_photo"]["tmp_name"], $parent_photo);

        $stmt = $connection->prepare('INSERT INTO parent (fname, gender, religion, country, parent_state, occupation, address, username, password, parent_phone, parent_photo)
            VALUES(?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('sssssssssss', $fname, $gender, $religion, $country, $parent_state, $occupation, $address, $username, $password, $parent_phone, $parent_photo);
        $stmt->execute();
        $stmt->close();

        $_SESSION[$Error] = "Parent added successfully!";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);

        header('Location: all-parent.php');
    }

}

//select function for parent
function selectParent(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM parent');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;

}

//Edit function for parent
function editParent($fname = NULL, $gender = NULL, $religion = NULL, $country = NULL, $parent_state = NULL, $occupation = NULL, $address = NULL, $username = NULL, $password = NULL, $parent_phone = NULL, $parent_photo = NULL, $id){
    global $connection;
    global $Error;

        // Parent Image validation
        $target_dir = "../images/$fname";
        $parent_photo = $target_dir . basename($_FILES["parent_photo"]["name"]);
        $imageFileType = strtolower(pathinfo($parent_photo, PATHINFO_EXTENSION));
    
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["parent_photo"]["tmp_name"]);
        if ($check == false) {
            $_SESSION[$Error] = "Parent image is not a valid image.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Check if file already exists
        if (file_exists($parent_photo)) {
            $_SESSION[$Error] = "Sorry, parent image already exist.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Check file size
        if ($_FILES["parent_photo"]["size"] > 500000) {
            $_SESSION[$Error] = "Sorry, parent image is too large.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION[$Error] = "Sorry, only JPG, JPEG and PNG files are allowed in parent image.";
            $_SESSION['msg_type'] = "danger";
            return ($_SESSION[$Error]);
        }

    //Check for input validity
    if (!preg_match("/^[A-Za-z a-z]+$/", $fname)) {
        $_SESSION[$Error] = "Full Name must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-parent.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[A-Za-z a-z]+$/", $occupation)) {
        $_SESSION[$Error] = "Occupation must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-parent.php');
        return ($_SESSION[$Error]);
    }

    if (!preg_match("/^[0-9]+$/", $parent_phone)) {
        $_SESSION[$Error] = "Only number is allowed in phone number.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-parent.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid username
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $username)) {
        $_SESSION[$Error] = "Please enter a valid username.";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-parent.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid password
    if (!preg_match("/^[a-zA-Z]+[0-9]+$/", $password)) {
        $_SESSION[$Error] = "Password must contain number and word";
        $_SESSION['msg_type'] = "danger";
        header('Location: edit-parent.php');
        return ($_SESSION[$Error]);
    }

    if ($Error == "") {

        $stmt = $connection->prepare("UPDATE parent SET fname = ?, gender = ?, religion = ?, country = ?, parent_state = ?, occupation = ?, address = ?, username = ?, password = ?, parent_phone = ?, parent_photo = ? WHERE id = ?");
        $stmt->bind_param('sssssssssssi', $fname, $gender, $religion, $country, $parent_state, $occupation, $address, $username, $password, $parent_phone, $parent_photo, $id);
        $stmt->execute();
        
        if ($stmt->affected_rows === 1) {
            move_uploaded_file($_FILES["parent_photo"]["tmp_name"], $parent_photo);

            $_SESSION[$Error] = "Parent record updated successfully!";
            $_SESSION['msg_type'] = "success";
            header('Location: all-parent.php');
        } else {
            
            $_SESSION[$Error] = "Unable to update parent record!";
            $_SESSION['msg_type'] = "danger";
            header('Location: edit-parent.php');
        }
        $stmt->close();
    }
}

//Delete function for parent
function deleteParent($id){
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM parent WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete parent record.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all-staff.php');
        } else {
            $_SESSION[$Error] = "Parent record deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);

        }
        $stmt->close();
        header('Location: all-parent.php');
    }
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

//Insert school fees function
function addFees($school = NULL, $className = NULL, $feeAmount = NULL)
{
    $Error = "";
    global $Error;
    global $connection;




    //Check if it is a valid school amount
    if (!preg_match("/^[0-9]+$/", $feeAmount)) {
        $_SESSION[$Error] = "School fees should contain numbers only";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    $stmt1 = $connection->prepare('SELECT * FROM school_fees');
    $stmt1->execute();
    $result = $stmt1->get_result();

    if ($result->num_rows > 0) {
        $_SESSION[$Error] = "A class with the same school fees amount already exist";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
        header('Location: add-fees.php');
    }

    if ($Error == "") {

            $stmt = $connection->prepare('INSERT INTO school_fees (school, className, feeAmount)
            VALUES(?,?,?)');
            $stmt->bind_param('sss', $school, $className, $feeAmount);
            $stmt->execute();
            $stmt->close;

            $_SESSION[$Error] = "School fees added successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);

            header('Location: all-student.php');
               
    }
}

//select function for school fees
function selectSchoolFees(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM school_fees');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//function for edit fees
function editFees($school = NULL, $className = NULL, $feeAmount = NULL, $id){
    $Error = "";
    global $Error;
    global $connection;


    //Check if it is a valid school amount
    if (!preg_match("/^[0-9]+$/", $feeAmount)) {
        $_SESSION[$Error] = "School fees should contain numbers only";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    if ($Error == "") {

        $stmt = $connection->prepare("UPDATE school_fees SET school = ?, className = ?, feeAmount = ? WHERE id = ?");
        $stmt->bind_param('sssi', $school, $className, $feeAmount, $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {

            $_SESSION[$Error] = "School fees updated successfully!";
            $_SESSION['msg_type'] = "success";

        } else {
            
            $_SESSION[$Error] = "Unable to update school fees!";
            $_SESSION['msg_type'] = "danger";
        }
        $stmt->close();
    }
        header('Location: all-fees.php');
           

}

//Delete function for School fees
function deleteFees($id){
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM school_fees WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete School fees record.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all_fees.php');
        } else {
            $_SESSION[$Error] = "School fees record deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);

        }
        $stmt->close();
        header('Location: all_fees.php');
    }
}

//Insert school fees function
function assignSubject($school = NULL, $class = NULL, $subject = NULL, $teacher = NULL)
{
    $Error = "";
    global $Error;
    global $connection;

    //Check if it is a valid subject
    if (!preg_match("/^[A-Za-z A-Za-z]+$/", $subject)) {
        $_SESSION[$Error] = "Subject must contain only words";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    $stmt1 = $connection->prepare('SELECT * FROM assign_subject');
    $stmt1->execute();
    $result = $stmt1->get_result();

    if ($result->num_rows > 0) {
        $_SESSION[$Error] = "A teacher has already been assigned to this subject";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
        header('Location: assign-subject.php');
    }

    if ($Error == "") {

            $stmt = $connection->prepare('INSERT INTO assign_subject (school, class, subject, teacher)
            VALUES(?,?,?,?)');
            $stmt->bind_param('ssss', $school, $class, $subject, $teacher);
            $stmt->execute();
            $stmt->close;

            $_SESSION[$Error] = "Subject assigned to teacher successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);

            header('Location: all-teacher.php');
               
    }
}

//select function for teachers
function selectTeachers(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM assign_subject');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//function for edit assign subject teacher
function editAssignSubject($school = NULL, $class= NULL, $subject = NULL, $teacher = NULL, $id){
    $Error = "";
    global $Error;
    global $connection;


    //Check if it is a valid subject
    if (!preg_match("/^[A-Za-z A-Za-z]+$/", $subject)) {
        $_SESSION[$Error] = "Subject must contain only words";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    if ($Error == "") {

        $stmt = $connection->prepare("UPDATE assign_subject SET school = ?, class = ?, subject = ?, teacher = ? WHERE id = ?");
        $stmt->bind_param('ssssi', $school, $class, $subject, $teacher, $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {

            $_SESSION[$Error] = "Assigned subject updated successfully!";
            $_SESSION['msg_type'] = "success";

        } else {
            
            $_SESSION[$Error] = "Unable to update assigned subject!";
            $_SESSION['msg_type'] = "danger";
        }
        $stmt->close();
    }
        header('Location: all-teachers.php');
           

}

//Delete function for assigned subject teacher
function deleteTeacher($id){
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM assign_subject WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete assigned subject record.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all_fees.php');
        } else {
            $_SESSION[$Error] = "Assigned subject record deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);

        }
        $stmt->close();
        header('Location: all_teacher.php');
    }
}

//Insert school fees function
function assignStudent($studentName = NULL, $school = NULL, $class = NULL, $teacher = NULL)
{
    $Error = "";
    global $Error;
    global $connection;

    //Check if it is a valid subject
    if (!preg_match("/^[A-Za-z A-Za-z]+$/", $studentName)) {
        $_SESSION[$Error] = "Subject must contain only words";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    $stmt1 = $connection->prepare('SELECT * FROM assign_class');
    $stmt1->execute();
    $result = $stmt1->get_result();
    $row = $result->fetch_assoc();

    if ($row['studentName'] > 0) {
        $_SESSION[$Error] = "This student has already been assigned to a class";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
        header('Location: assign-subject.php');
    }

    if ($Error == "") {

            $stmt = $connection->prepare('INSERT INTO assign_class (studentName, school, class, teacher)
            VALUES(?,?,?,?)');
            $stmt->bind_param('ssss', $studentName, $school, $class, $teacher);
            $stmt->execute();
            $stmt->close();

            $_SESSION[$Error] = "Student assigned to a class successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);

            header('Location: all-assign-student.php');
               
    }
}

//select function for assign class
function selectAssignClass(){
    global $connection;
    $data = array();

    $stmt = $connection->prepare('SELECT * FROM assign_class');
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) echo "No rows found";
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

//function for edit fees
function editAssignClass($studentName = NULL, $school = NULL, $class= NULL, $teacher = NULL, $id){
    $Error = "";
    global $Error;
    global $connection;


    //Check if it is a valid subject
    if (!preg_match("/^[A-Za-z A-Za-z]+$/", $studentName)) {
        $_SESSION[$Error] = "Subject must contain only words";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }

    if ($Error == "") {

        $stmt = $connection->prepare("UPDATE assign_class SET studentName = ?, school = ?, class = ?, teacher = ? WHERE id = ?");
        $stmt->bind_param('ssssi', $studentName, $school, $class, $teacher, $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {

            $_SESSION[$Error] = "Assigned class updated successfully!";
            $_SESSION['msg_type'] = "success";

        } else {
            
            $_SESSION[$Error] = "Unable to update assigned class!";
            $_SESSION['msg_type'] = "danger";
        }
        $stmt->close();
    }
        header('Location: all-assign-student.php');
           

}

//Delete function for assigned subject teacher
function deleteAssignClass($id){
    global $Error;
    global $connection;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $stmt = $connection->prepare('DELETE FROM assign_class WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        if ($stmt->affected_rows === 0) {
            $_SESSION[$Error] = "Unable to delete assigned student class record.";
            $_SESSION['msg_type'] = "danger";

            return ($_SESSION[$Error]);
            header('Location: all_fees.php');
        } else {
            $_SESSION[$Error] = "Assigned student class record deleted successfully!";
            $_SESSION['msg_type'] = "success";
            return ($_SESSION[$Error]);

        }
        $stmt->close();
        header('Location: all_assign-student.php');
    }
}