<?php 
  include('includes/header.php');
  include('includes/sidenav.php');

  $allStaff = selectStaff();
  deleteStaff($id);


?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Staff</h3>
                    <ul>
                        <li>
                            <a href="all-staff.php">Home</a>
                        </li>
                        <li>All Staff List</li>
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
                                <h3>All Staff Data</h3>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Marital Status</th>
                                        <th>Staff Type</th>
                                        <th>Qualification</th>
                                        <th>Course</th>
                                        <th>Username</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($allStaff as $staff) :
                                ?>  
                                        <tr id="delete<?= $staff['id']; ?>">
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><img src="<?= $staff["staff_photo"]; ?>" width="100" height="100" alt="<?= $staff["fname"]; ?>"></a></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["fname"]; ?></a></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["gender"]; ?></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["marital_status"]; ?></a></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["staff_type"]; ?></a></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["qualification"]; ?></a></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["course_study"]; ?></a></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["username"]; ?></a></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["address"]; ?></a></td>
                                                <td><a href="view-profile.php?profile=<?= $staff['id']; ?>"><?= $staff["staff_phone"]; ?></a></td>
                                                <td>
                                                    <a href="edit-staff.php?edit=<?= $staff['id']; ?>" class="btn btn-info">Edit</a> |
                                                    <a href="all-staff.php?delete=<?= $staff['id']; ?>" class="delete btn btn-danger">Delete</a>
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
                <!-- Teacher Table Area End Here -->
 
<?php
    include('includes/footer.php');
?>