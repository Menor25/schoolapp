<?php
    require "private/autoloads.php";
    include('includes/header.php');
    include('includes/sidenav.php');

    $Error = "";


  if($_SERVER['REQUEST_METHOD'] == "POST"){
    subjectEdit(

        $subjectName = trim($_POST['subjectName']),
        $school = trim($_POST['school']),
        $classSub = trim($_POST['classSub']),
        $subjectTeacher = trim($_POST['subjectTeacher']),
        $id = $_POST['id'],

    );
  }

  if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $stmt = $connection->prepare('SELECT * FROM subject WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            $subjectName = $row['subjectName'];
            $school = $row['school'];
            $classSub = $row['classSub'];
            $subjectTeacher = $row['subjectTeacher'];
            $id = $row['id'];
        }
    $stmt->close();

}

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>All Subjects</h3>
                    <ul>
                        <li>
                            <a href="all-subject.php">Home</a>
                        </li>
                        <li>Subjects</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Subjects Area Start Here -->
                <div class="row">
                    <div class="col-8-xxxl col-12" style="margin-left: auto; margin-right: auto;">
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
                                        <h3>Add New Subject</h3>
                                    </div>
                                </div>
                                <form class="new-added-form" method="POST" action="">
                                    <div class="row">
                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Subject Name *</label>
                                            <input type="text" placeholder="" name="subjectName" id="subjectName" value="<?= $subjectName ?>" class="form-control" required>
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>School *</label>
                                            <select class="select2" name="school" id="school"  required>
                                                <option value="<?= $school ?>"><?= $school?></option>
                                                <option value="Nursery">Nursery</option>
                                                <option value="Primary">Primary</option>
                                                <option value="Secondary">Secondary</option>
                                            </select>
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Class *</label>
                                            <select class="select2" id="class" name="classSub">
                                                <option value="<?= $classSub ?>"><?= $classSub ?></option>
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
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Subject Teacher *</label>
                                            <input type="text" placeholder="" name="subjectTeacher" id="subjectTeacher" value="<?= $subjectTeacher ?>" class="form-control" required>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" name="save" id="save" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- All Subjects Area End Here -->

<?php
    include('includes/footer.php');
?>