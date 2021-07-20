<?php
session_start();
require "private/database.php";

//Insert Admission form
function admitForm($fname = NULL, $lname = NULL, $gender = NULL, $dob = NULL, $blood_group = NULL, $religion = NULL, $username = NUll, $password = NULL, $school = NULL, $class = NULL, $admission_Id = NULL, $phone = NULL, $message = NULL, $st_photo = NULL)
{
    $Error = "";
    global $Error;
    global $connection;

    $target_dir = "/admin/images/";
    $target_file = $target_dir . basename($_FILES["st_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["st_photo"]["tmp_name"]);
    if ($check == false) {
        $_SESSION[$Error] = "File is not an image.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    // Check if file already exists
    if (file_exists($target_file)) {
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

    //Check if it is a valid phone number
    if (!preg_match("/^[0-9]+$/", $phone)) {
        $_SESSION[$Error] = "Please enter a valid phone number.";
        $_SESSION['msg_type'] = "danger";
        return ($_SESSION[$Error]);
    }
    if ($Error == "") {
        move_uploaded_file($_FILES["st_photo"]["tmp_name"], $target_file);

        $stmt = $connection->prepare('INSERT INTO admin_new (fname, lname, gender, dob, blood_group, religion, username, password, school, class, admission_Id, phone, message, st_photo)
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('sssssssssssiss', $fname, $lname, $gender, $dob, $blood_group, $religion, $username, $password, $school, $class, $admission_Id, $phone, $message, $st_photo);
        $stmt->execute();
        $stmt->close;

        $_SESSION[$Error] = "New student added successfully!";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);

        header('Location: admit-form.php');
    }
}

//Insert function for class
function insertClass($class_name = NULL, $schoolId = NULL, $no_of_subjects = NULL, $form_teacher = NULL, $fees = NULL)
{

    global $Error;
    global $connection;
    $Error = "";

    //Check if it is a valid class name
    if (!preg_match("/^[A-Z A-Z]+ [0-9]+$/", $class_name)) {
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

    // //Check if it is a valid class name
    if (!preg_match("/^[A-Z A-Z]+ [0-9]+$/", $class_name)) {
        $_SESSION[$Error] = "Class name must be in capital letter and contain a number";
        $_SESSION['msg_type'] = "danger";

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
        // header('Location: all-class.php');
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
        header('Location: add-library.php');
        return ($_SESSION[$Error]);
    }

    //Check if it is a valid subject name
    if (!preg_match("/^[A-Z a-z]+$/", $subjectTeacher)) {
        $_SESSION[$Error] = "Subject teacher must not contain number or special characters.";
        $_SESSION['msg_type'] = "danger";
        header('Location: add-library.php');
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
               VALUES(?,?,?,?,?,?,?)');
        $stmt->bind_param('ssss', $subjectName, $school, $classSub, $subjectTeacher);
        $stmt->execute();
        $stmt->close();
        $_SESSION[$Error] = "Subject created successfully.";
        $_SESSION['msg_type'] = "success";
        return ($_SESSION[$Error]);
    }
}
