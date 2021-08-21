<?php
    include('includes/header.php');
    include('includes/sidenav.php');

    $Error = "";


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        classUpdate(

            $class_name = trim($_POST['class_name']),
            $schoolId = trim($_POST['schoolId']),
            $no_of_subjects = trim($_POST['no_of_subjects']),
            $form_teacher = trim($_POST['form_teacher']),
            $fees = trim($_POST['fees']),
            $id = $_POST['id'],

        );
        
        
    }
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];

        $stmt = $connection->prepare('SELECT * FROM class WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();

                $class_name = $row['class_name'];
                $schoolId = $row['schoolId'];
                $no_of_subjects = $row['no_of_subjects'];
                $form_teacher = $row['form_teacher'];
                $fees = $row['fees'];
            }
        $stmt->close();

    }

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Classes</h3>
                    <ul>
                        <li>
                            <a href="all-class.php">Home</a>
                        </li>
                        <li>Update Class</li>
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
                                <h3>Edit Class</h3>
                            </div>
                        </div>
                            <form class="new-added-form" method="POST" action="">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Class Name *</label>
                                        <input type="text" placeholder="" value="<?= $class_name ?>" name="class_name" class="form-control" required>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>School *</label>
                                        <select class="select2" name="schoolId" value="<?= $schoolId; ?>" required>
                                            <option value="<?= $schoolId; ?>"><?= $schoolId; ?></option>
                                            <option value="Nursery">Nursery</option>
                                            <option value="Primary">Primary</option>
                                            <option value="Secondary">Secondary</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Number of Subject *</label>
                                        <input type="number" placeholder="" name="no_of_subjects" value="<?= $no_of_subjects; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Form Teacher*</label>
                                        <select class="select2" name="form_teacher" required>
                                            <option value="<?= $form_teacher ?>"><?= $form_teacher ?></option>
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
                                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                                        <label>Fees *</label>
                                        <input type="text" placeholder="" name="fees" value="<?= $fees; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 form-group"></div>
                                    <div class="col-12 form-group mg-t-8">
                                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
                <!-- Add Class Area End Here -->

<?php
    include('includes/footer.php');
?>