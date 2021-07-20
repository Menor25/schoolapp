<?php
    require "private/autoloads.php";
    include('includes/header.php');
    include('includes/sidenav.php');

    
    
    $Error = "";


    if($_SERVER['REQUEST_METHOD'] == "POST")
        {

            admitForm(
                $fname = trim($_POST['fname']),
                $lname = trim($_POST['lname']),
                $gender = trim($_POST['gender']),
                $dob = trim($_POST['dob']),
                $blood_group = trim($_POST['blood_group']),
                $religion = trim($_POST['religion']),
                $username = trim(htmlspecialchars($_POST['username'])),
                $password = trim(htmlspecialchars($_POST['password'])),
                $school = trim($_POST['school']),
                $class = trim($_POST['class']),
                $admission_Id = trim($_POST['admission_Id']),
                $phone = trim(htmlspecialchars($_POST['phone'])),
                $message = htmlspecialchars($_POST['message']),
                $st_photo = $_FILES['st_photo'],
                );

           
            // print_r($_POST);
            // print_r($_FILES);
        }
?>

            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>Student Admission Form</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Admit Form Area Start Here -->
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
                                <h3>Add New Students</h3>
                            </div>
                        </div>
                        <form class="new-added-form" method="POST" action="admit-form.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>First Name *</label>
                                    <input type="text" name="fname" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Last Name *</label>
                                    <input type="text" name="lname" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="gender" required>
                                        <option value="">Please Select Gender *</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date Of Birth *</label>
                                    <input type="date" name="dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                        data-position='bottom right' required>
                                    <!-- <i class="fa fa-calendar-alt"></i> -->
                                </div>
                                <!-- <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Roll</label>
                                    <input type="text" name="roll" placeholder="" class="form-control" required>
                                </div> -->
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Blood Group *</label>
                                    <select class="select2" name="blood_group" required>
                                        <option value="">Please Select Group *</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Religion *</label>
                                    <select class="select2" name="religion" required>
                                        <option value="">Please Select Religion *</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Username *</label>
                                    <input type="text" name="username" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Password *</label>
                                    <input type="password" name="password" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>School *</label>
                                    <select class="select2" name="school" required>
                                        <option value="">Please Select School *</option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="Primary">Primary</option>
                                        <option value="Secondary">Secondary</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class *</label>
                                    <select class="select2" name="class" required>
                                        <option value="">Please Select Section *</option>
                                        <?php
                                            $stmt1 = $connection->prepare('SELECT * FROM class');
                                            $stmt1->execute();
                                            $result = $stmt1->get_result();
                                    
                                            while($row = $result->fetch_assoc()){
                                                $className = $row['class_name'];

                                        ?>
                                                <option value="<?= $className ?>"><?= $className ?></option>
                                        <?php


                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Admission ID *</label>
                                    <input type="text" name="admission_Id" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" placeholder="" class="form-control" required>
                                </div>
                                <div class="col-lg-6 col-12 form-group">
                                    <label>Short BIO *</label>
                                    <textarea class="textarea form-control" name="message" id="form-message" cols="10"
                                        rows="9" required></textarea>
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Student Photo (150px X 150px) *</label>
                                    <input type="file" name="st_photo" class="form-control-file" required>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->

<?php
    include('includes/footer.php');
?>