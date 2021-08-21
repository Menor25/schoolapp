<?php
include('includes/header.php');
include('includes/sidenav.php');

$allTeachers = selectTeachers();
deleteTeacher($id);

$sn = 1;
?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parent</h3>
        <ul>
            <li>
                <a href="all-teacher.php">Home</a>
            </li>
            <li>All Teachers</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">

            <?php if (isset($_SESSION[$Error])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                    <?php
                    echo $_SESSION[$Error];
                    unset($_SESSION[$Error]);

                    ?>
                </div>
            <?php endif; ?>

            <div class="heading-layout1">
                <div class="item-title">
                    <h3>All Subjet Teacher Data</h3>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Teacher Name</th>
                            <th>School</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Date Assign</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allTeachers as $teacher) :
                        ?>
                            <tr id="delete<?= $teacher['id']; ?>">
                                <td><?= $sn; ?></td>
                                <td><?= $teacher["teacher"]; ?></td>
                                <td><?= $teacher["school"]; ?></a></td>
                                <td><?= $teacher["class"]; ?></a></td>
                                <td><?= $teacher["subject"]; ?></a></td>
                                <td><?= $teacher["assign_at"]; ?></a></td>
                                <td>
                                    <a href="edit-assign.php?edit=<?= $teacher['id']; ?>" class="btn btn-info">Edit</a> |
                                    <a href="all-teacher.php?delete=<?= $teacher['id']; ?>" class="delete btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        $sn++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Teacher Table Area End Here -->

    <?php
    include('includes/footer.php');
    ?>