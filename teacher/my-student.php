<?php 
  include('includes/header.php');
  include('includes/sidenav.php');

  $allMyStudent = selectMyStudent();

  $Error = "";


  $sn = 1;
?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>My Student</h3>
                    <ul>
                        <li>
                            <a href="my-student.php">Home</a>
                        </li>
                        <li>My Student</li>
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
                                <h3>All My Student</h3>
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
                                        <th>Date Assign</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($allMyStudent as $myStudent) :
                                    ?>  
                                        <tr id="delete<?= $parent['id']; ?>">
                                                <td><?= $sn; ?></td>
                                                <td><?= $myStudent["studentName"]; ?></a></td>
                                                <td><?= $myStudent["school"]; ?></td>
                                                <td><?= $myStudent["class"]; ?></a></td>
                                                <td><?= $myStudent["assigned_date"]; ?></a></td>
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