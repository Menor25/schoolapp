<?php
    include('includes/header.php');
    include('includes/sidenav.php');

    $Error = "";


  if($_SERVER['REQUEST_METHOD'] == "POST"){
    insertSubject(

        $subjectName = trim($_POST['subjectName']),
        $school = trim($_POST['school']),
        $classSub = trim($_POST['classSub']),
        $subjectTeacher = trim($_POST['subjectTeacher']),

    );
  }

  $subjects = selectSubject();
  deleteSubject($id);
?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>All Subjects</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Subjects</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- All Subjects Area Start Here -->
                <div class="row">
                    <div class="col-4-xxxl col-12">
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
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Subject Name *</label>
                                            <input type="text" placeholder="" name="subjectName" id="subjectName" class="form-control" required>
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>School *</label>
                                            <select class="select2" name="school" id="school" required>
                                                <option value="">Please Select Section</option>
                                                <option value="Nursery">Nursery</option>
                                                <option value="Primary">Primary</option>
                                                <option value="Secondary">Secondary</option>
                                            </select>
                                        </div>
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Class *</label>
                                            <select class="select2" id="class" name="classSub">
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
                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                            <label>Subject Teacher *</label>
                                            <input type="text" placeholder="" name="subjectTeacher" id="subjectTeacher" class="form-control" required>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit" name="save" id="save" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            <button type="reset" name="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow" onclick="window.location.href='all-subject.php'">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-8-xxxl col-12">
                        <div class="card height-auto">
                            <div class="card-body">
                                <?php if(isset($_SESSION[$Error])): ?>
                                    <div id="alert" class="alert alert-<?= $_SESSION['msg_type']; ?>">
                                        <?php
                                            echo $_SESSION[$Error];
                                            unset($_SESSION[$Error]);

                                        ?>
                                    </div>
                                <?php endif; ?>

                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>All Subjects</h3>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table display data-table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Subject Name</th>
                                                <th>School</th>
                                                <th>Class</th>
                                                <th>Subject Teacher</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($subjects as $subject) :
                                            ?>
                                                    <tr id="delete<?= $subject['id']; ?>">
                                                        <td><?= $subject["subjectName"]; ?></td>
                                                        <td><?= $subject["school"]; ?></td>
                                                        <td><?= $subject["classSub"]; ?></td>
                                                        <td><?= $subject["subjectTeacher"]; ?></td>
                                                        <td><?= $subject["date"]; ?></td>
                                                        <td>
                                                            <a href="edit-subject.php?edit=<?= $subject['id']; ?>" class="btn btn-info">Edit</a> |
                                                            <a href="all-subject.php?delete=<?= $subject['id']; ?>" class="delete btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All Subjects Area End Here -->

<?php
    include('includes/footer.php');
?>