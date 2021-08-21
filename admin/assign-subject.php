<?php
    include('includes/header.php');
    include('includes/sidenav.php');

    $Error = "";


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        assignSubject(

            $school = trim($_POST['school']),
            $class = trim($_POST['class']),
            $subject = trim($_POST['subject']),
            $teacher = trim($_POST['teacher']),

        );
        
        // header('Location: addd-class.php');
    }

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Assign Subject</h3>
                    <ul>
                        <li>
                            <a href="all-teacher.php">Home</a>
                        </li>
                        <li>Assign Subject Teacher</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Class Area Start Here -->
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
                                <h3>Assign Subject Teacher</h3>
                            </div>
                        </div>
                        <form class="new-added-form" method="POST" action="">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>School *</label>
                                    <select class="select2" name="school" required>
                                        <option value="">Please Select</option>
                                        <?php
                                            $stmt1 = $connection->prepare('SELECT * FROM school');
                                            $stmt1->execute();
                                            $result = $stmt1->get_result();
                                    
                                            while($row = $result->fetch_assoc()){
                                                $schoolName = $row['school_name'];

                                        ?>
                                                <option value="<?= $schoolName ?>"><?= $schoolName ?></option>
                                        <?php


                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Class *</label>
                                    <select class="select2" name="class" required>
                                        <option value="">Please Select Class *</option>
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
                                    <label>Subject*</label>
                                    <input type="text" placeholder="" name="subject" class="form-control air-datepicker" data-position="bottom right" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Teacher *</label>
                                    <select class="select2" name="teacher" required>
                                        <option value="">Please Select Class</option>
                                        <?php
                                            $stmt1 = $connection->prepare('SELECT * FROM staff WHERE staff_role = "teacher"');
                                            $stmt1->execute();
                                            $result = $stmt1->get_result();
                                    
                                            while($row = $result->fetch_assoc()){
                                                $teacherName = $row['fname'];

                                        ?>
                                                <option value="<?= $teacherName ?>"><?= $teacherName ?></option>
                                        <?php


                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group"></div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <span id="success_message" class="text-success"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Class Area End Here -->

<?php
    include('includes/footer.php');
?>