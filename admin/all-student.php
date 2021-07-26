<?php
 
    include('includes/header.php');
    include('includes/sidenav.php');

    $students = selectStudentNew();
    deleteStudent($id);

    $Error = "";

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="all-student.php">Home</a>
                        </li>
                        <li>All Students</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Table Area Start Here -->
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
                                <h3>All Students Data</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Date Of Birth</th>
                                        <th>Blood Group</th>
                                        <th>Religion</th>
                                        <th>Parent</th>
                                        <th>School</th>
                                        <th>Class</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($students as $student):
                                    ?>
                                                <tr>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["admission_Id"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><img src="<?= $student["st_photo"]; ?>" width="100" height="100"></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["fname"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["gender"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["dob"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["blood_group"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["religion"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["parent"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["school"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["class"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["address"]; ?></a></td>
                                                    <td><a href="student-details.php?profile=<?= $student['id']; ?>"><?= $student["phone"]; ?></a></td>
                                                    <td>
                                                        <a href="edit-student.php?edit=<?= $student['id']; ?>" class="btn btn-info">Edit</a> | 
                                                        <a href="all-student.php?delete=<?= $student['id']; ?>" class="btn btn-danger">Delete</a>
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
                <!-- Student Table Area End Here -->


<?php
    include('includes/footer.php');
?>