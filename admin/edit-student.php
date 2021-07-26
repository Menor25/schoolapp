<?php
    include('includes/header.php');
    include('includes/sidenav.php');

    
    
    $Error = "";


    if($_SERVER['REQUEST_METHOD'] == "POST")
        {

            editStudent(
                $fname = trim($_POST['fname']),
                $gender = trim($_POST['gender']),
                $dob = trim($_POST['dob']),
                $blood_group = trim($_POST['blood_group']),
                $religion = trim($_POST['religion']),
                $parent = trim($_POST['parent']),
                $occupation = trim($_POST['occupation']),
                $parent_phone = trim($_POST['parent_phone']),
                $username = trim(htmlspecialchars($_POST['username'])),
                $password = trim(htmlspecialchars($_POST['password'])),
                $school = trim($_POST['school']),
                $class = trim($_POST['class']),
                $school_fees = trim($_POST['school_fees']),
                $admission_Id = trim($_POST['admission_Id']),
                $address = trim(htmlspecialchars($_POST['address'])),
                $phone = trim(htmlspecialchars($_POST['phone'])),
                $state = htmlspecialchars($_POST['state']),
                $st_photo = $_FILES['st_photo'],
                $id = $_POST['id'],
                );

           
            // print_r($_POST);
            // print_r($_FILES);
        }

        if(isset($_GET['edit'])){
            $id = $_GET['edit'];
    
            $stmt = $connection->prepare('SELECT * FROM admin_new WHERE id = ?');
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
                if($result->num_rows == 1){
                    $row = $result->fetch_assoc();
    
                    $fname = $row['fname'];
                    $gender = $row['gender'];
                    $dob = $row['dob'];
                    $blood_group = $row['blood_group'];
                    $religion = $row['religion'];
                    $parent = $row['parent'];
                    $occupation = $row['occupation'];
                    $parent_phone = $row['parent_phone'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $school = $row['school'];
                    $class = $row['class'];
                    $school_fees = $row['school_fees'];
                    $admission_Id = $row['admission_Id'];
                    $address = $row['address'];
                    $phone = $row['phone'];
                    $state = $row['state'];
                    $st_photo = $row['st_photo'];
                }
            $stmt->close();
    
        }
?>

            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="all-student.php">Home</a>
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
                                <h3>Edit Student Info</h3>
                            </div>
                        </div>
                        <form class="new-added-form" method="POST" action="" enctype="multipart/form-data">
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Full Name *</label>
                                    <input type="text" name="fname" placeholder="" class="form-control" value="<?= $row['fname']; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="gender" required>
                                        <option value="<?= $row['gender']; ?>"><?= $row['gender']; ?></option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Date Of Birth *</label>
                                    <input type="date" name="dob" placeholder="dd/mm/yyyy" class="form-control air-datepicker"
                                        data-position='bottom right' value="<?= $row['dob']; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Blood Group *</label>
                                    <select class="select2" name="blood_group" required>
                                        <option value="<?= $row['blood_group']; ?>"><?= $row['blood_group']; ?></option>
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
                                        <option value="<?= $row['religion']; ?>"><?= $row['religion']; ?></option>
                                        <option value="Christian">Christian</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Parent Name *</label>
                                    <input type="text" name="parent" placeholder="" value="<?= $row['parent']; ?>" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Parent Occupation *</label>
                                    <input type="text" name="occupation" placeholder="" class="form-control" value="<?= $row['occupation']; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Parent Number *</label>
                                    <input type="text" name="parent_phone" placeholder="" class="form-control" value="<?= $row['parent_phone']; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Username *</label>
                                    <input type="text" name="username" placeholder="" class="form-control" value="<?= $row['username']; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Password *</label>
                                    <input type="password" name="password" placeholder="" class="form-control" value="<?= $row['password']; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>School *</label>
                                    <select class="select2" name="school" required>
                                        <option value="<?= $row['school']; ?>"><?= $row['school']; ?></option>
                                        <option value="Nursery">Nursery</option>
                                        <option value="Primary">Primary</option>
                                        <option value="Secondary">Secondary</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class *</label>
                                    <select class="select2" name="class" required>
                                        <option value="<?= $class; ?>"><?= $class; ?></option>
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
                                    <label>School Fees *</label>
                                    <input type="text" name="school_fees" placeholder="" class="form-control" value="<?= $school_fees; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Admission ID *</label>
                                    <input type="text" name="admission_Id" placeholder="" class="form-control" value="<?= $admission_Id; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address *</label>
                                    <input type="text" name="address" placeholder="" class="form-control" value="<?= $address; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" placeholder="" class="form-control" value="<?= $phone; ?>" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>State of Origin *</label>
                                    <select class="select2" name="state" required>
                                        <option value="<?= $state; ?>"><?= $state; ?></option>
                                        <?php
                                            $stmt2 = $connection->prepare('SELECT * FROM state');
                                            $stmt2->execute();
                                            $result = $stmt2->get_result();
                                    
                                            while($row = $result->fetch_assoc()){
                                                $state_name = $row['state_name'];

                                        ?>
                                                <option value="<?= $state_name ?>"><?= $state_name ?></option>
                                        <?php


                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Student Photo (150px X 150px) *</label>
                                    <input type="file" name="st_photo" class="form-control-file" value="<?= $st_photo; ?>" required>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Admit Form Area End Here -->

<?php
    include('includes/footer.php');
?>