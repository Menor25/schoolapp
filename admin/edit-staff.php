<?php
include('../includes/functions.php');
include('../includes/config.php');
include('includes/header.php');
include('includes/sidenav.php');

$Error = "";


$sql = "SELECT * FROM country  ORDER BY country_name ASC";
$run_query = mysqli_query($connection, $sql);
//Count total number of rows
$count = mysqli_num_rows($run_query);

//Get all state data
$sql2 = "SELECT * FROM state  ORDER BY state_name ASC";
$run_query2 = mysqli_query($connection, $sql2);
//Count total number of rows
$count2 = mysqli_num_rows($run_query2);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    editStaff(
                $fname = trim($_POST['fname']), 
                $gender = trim($_POST['gender']), 
                $father_name = trim($_POST['father_name']), 
                $mother_name = trim($_POST['mother_name']), 
                $dob = trim($_POST['dob']), 
                $marital_status = trim($_POST['marital_status']), 
                $religion = trim($_POST['religion']), 
                $country = trim($_POST['country']), 
                $staff_state = trim($_POST['staff_state']), 
                $section = trim($_POST['section']), 
                $staff_type = trim($_POST['staff_type']), 
                $staff_role = trim($_POST['staff_role']), 
                $qualification = trim($_POST['qualification']), 
                $graduated_from = trim($_POST['graduated_from']), 
                $course_study = trim($_POST['course_study']), 
                $graduation_year = trim($_POST['graduation_year']), 
                $certificate = $_FILES['certificate']['name'], 
                $department = trim($_POST['department']), 
                $username = trim($_POST['username']), 
                $password = trim($_POST['password']), 
                $address = trim($_POST['address']), 
                $staff_phone = trim($_POST['staff_phone']), 
                $referee = trim($_POST['referee']), 
                $ref_address  = trim($_POST['ref_address']), 
                $ref_phone = trim($_POST['ref_phone']), 
                $staff_photo = $_FILES['staff_photo']['name'],
                $id = $_POST['id'],
    );
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $stmt = $connection->prepare('SELECT * FROM staff WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            $fname = $row['fname']; 
            $gender = $row['gender']; 
            $father_name = $row['father_name']; 
            $mother_name = $row['mother_name']; 
            $dob = $row['dob']; 
            $marital_status = $row['marital_status']; 
            $religion = $row['religion']; 
            $country = $row['country']; 
            $staff_state = $row['staff_state']; 
            $section = $row['section']; 
            $staff_type = $row['staff_type']; 
            $staff_role = $row['staff_role']; 
            $qualification = $row['qualification']; 
            $graduated_from = $row['graduated_from']; 
            $course_study = $row['course_study']; 
            $graduation_year = $row['graduation_year']; 
 
            $department = $row['department']; 
            $username = $row['username']; 
            $password = $row['password']; 
            $address = $row['address']; 
            $staff_phone = $row['staff_phone']; 
            $referee = $row['referee']; 
            $ref_address  = $row['ref_address']; 
            $ref_phone = $row['ref_phone']; 

        }
    $stmt->close();

}

?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Staff</h3>
        <ul>
            <li>
                <a href="all-staff.php">Home</a>
            </li>
            <li>Edit Staff Record</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Add New Teacher Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">

            <?php if(isset($_SESSION[$Error])): ?>
                <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                    <?php
                        echo $_SESSION[$Error];
                        unset($_SESSION[$Error]);

                    ?>
                </div>
            <?php endif; ?>

            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Edit Staff</h3>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Full Name *</label>
                        <input type="text" name="fname" placeholder="" class="form-control" value="<?= $fname ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Gender *</label>
                        <select class="select2" name="gender" required>
                            <option value="<?= $gender ?>"><?= $gender ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Father's Name *</label>
                        <input type="text" name="father_name" placeholder="" class="form-control" value="<?= $father_name ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Mother's Name *</label>
                        <input type="text" name="mother_name" placeholder="" class="form-control" value="<?= $mother_name ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Date Of Birth *</label>
                        <input type="date" name="dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker" value="<?= $dob ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Marital Status *</label>
                        <select class="select2" name="marital_status" required>
                            <option value="<?= $marital_status ?>"><?= $marital_status ?></option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Single">Single</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Religion *</label>
                        <select class="select2" name="religion" required>
                            <option value="<?= $religion ?>"><?= $religion ?></option>
                            <option value="Christian">Christian</option>
                            <option value="Islam">Islam</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Country *</label>
                        <select class="select2" name="country" id="country" required>
                            <option value="<?= $country ?>"><?= $country ?></option>
                                <?php
                                    if ($count > 0) {
                                        while ($row = mysqli_fetch_array($run_query)) {
                                            $country_id = $row['country_id'];
                                            $country_name = $row['country_name'];
                                            echo "<option value='$country_name'>$country_name</option>";
                                        }
                                    } else {
                                        echo '<option value="">Country not available</option>';
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>State of Origin *</label>
                        <select class="select2" name="staff_state" id="state" required>
                                    <option value="<?= $staff_state ?>"><?= $staff_state ?></option>
                                    <?php
                                    if ($count2 > 0) {
                                        while ($row2 = mysqli_fetch_array($run_query2)) {
                                            $state_id = $row2['state_id'];
                                            $state_name = $row2['state_name'];
                                            echo "<option value='$state_name'>$state_name</option>";
                                        }
                                    } else {
                                        echo '<option value="">State not available</option>';
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Section *</label>
                        <select class="select2" name="section" required>
                            <option value="<?= $section ?>"><?= $section ?></option>
                            <option value="Nursery">Nursery</option>
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Staff Type *</label>
                        <select class="select2" name="staff_type" required>
                            <option value="<?= $staff_type ?>"><?= $staff_type ?></option>
                            <option value="Academic">Academic</option>
                            <option value="Non-academic">Non-academic</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Staff Role *</label>
                        <select class="select2" name="staff_role" required>
                            <option value="<?= $staff_role ?>"><?= $staff_role ?></option>
                            <option value="Teacher">Teacher</option>
                            <option value="Admin">Admin</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Qualification *</label>
                        <input type="text" name="qualification" placeholder="" class="form-control" value="<?= $qualification ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Graduated From</label>
                        <input type="text" name="graduated_from" placeholder="" class="form-control" value="<?= $graduated_from ?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Course of Study</label>
                        <input type="text" name="course_study" placeholder="" class="form-control" value="<?= $course_study ?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Year of Graduation</label>
                        <input type="text" name="graduation_year" placeholder="" class="form-control" value="<?= $graduation_year ?>">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Certificate</label>
                        <input type="file" name="certificate" placeholder="" class="form-control" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Department *</label>
                        <input type="text" name="department" placeholder="" class="form-control" value="<?= $department ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Username *</label>
                        <input type="text" name="username" placeholder="" class="form-control" value="<?= $username ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Password *</label>
                        <input type="password" name="password" placeholder="" class="form-control" value="<?= $password ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="" class="form-control" value="<?= $address ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Phone Number</label>
                        <input type="text" name="staff_phone" placeholder="" class="form-control" value="<?= $staff_phone ?>" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Referee *</label>
                        <input type="text" name="referee" placeholder="" class="form-control" value="<?= $referee ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Referee Address *</label>
                        <input type="text" name="ref_address" placeholder="" class="form-control" value="<?= $ref_address ?>" required>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Referee Phone Number *</label>
                        <input type="text" name="ref_phone" placeholder="" class="form-control" value="<?= $ref_phone ?>" required>
                    </div>
                    <div class="col-lg-6 col-12 form-group mg-t-30">
                        <label class="text-dark-medium">Upload Staff Photo (150px X 150px)</label>
                        <input type="file" name="staff_photo" class="form-control-file" required>
                    </div>
                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Add New Teacher Area End Here -->

    <?php
    include('includes/footer.php');
    ?>