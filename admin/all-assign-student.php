<?php 
  include('includes/header.php');
  include('includes/sidenav.php');

  $allAssignClass = selectAssignClass();
  deleteAssignClass($id);

  $sn = 1;
?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Student Class</h3>
                    <ul>
                        <li>
                            <a href="all-assign-student.php">Home</a>
                        </li>
                        <li>All Student Class</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Teacher Table Area Start Here -->
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
                                <h3>All Student Class</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Student Name</th>
                                        <th>School</th>
                                        <th>Class</th>
                                        <th>Form Teacher</th>
                                        <th>Date Assign</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($allAssignClass as $assignClass) :
                                    ?>  
                                        <tr id="delete<?= $parent['id']; ?>">
                                                <td><?= $sn; ?></td>
                                                <td><?= $assignClass["studentName"]; ?></a></td>
                                                <td><?= $assignClass["school"]; ?></td>
                                                <td><?= $assignClass["class"]; ?></a></td>
                                                <td><?= $assignClass["teacher"]; ?></a></td>
                                                <td><?= $assignClass["assigned_date"]; ?></a></td>
                                                <td>
                                                    <a href="edit-assign-class.php?edit=<?= $assignClass['id']; ?>" class="btn btn-info">Edit</a> |
                                                    <a href="all-assign-student.php?delete=<?= $assignClass['id']; ?>" class="delete btn btn-danger">Delete</a>
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