<?php 
  include('includes/header.php');
  include('includes/sidenav.php');

  $allParent = selectParent();
  deleteParent($id);

  $sn = 1;
?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Parent</h3>
                    <ul>
                        <li>
                            <a href="all-parent.php">Home</a>
                        </li>
                        <li>All Parent</li>
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
                                <h3>All Parents Data</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Occupation</th>
                                        <th>Address</th>
                                        <th>State</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($allParent as $parent) :
                                    ?>  
                                        <tr id="delete<?= $parent['id']; ?>">
                                                <td><?= $sn; ?></td>
                                                <td><a href="parent-profile.php?profile=<?= $parent['id']; ?>"><img src="<?= $parent["parent_photo"]; ?>" width="100" height="100" alt="<?= $staff["fname"]; ?>"></a></td>
                                                <td><a href="parent-profile.php?profile=<?= $parent['id']; ?>"><?= $parent["fname"]; ?></a></td>
                                                <td><a href="parent-profile.php?profile=<?= $parent['id']; ?>"><?= $parent["gender"]; ?></td>
                                                <td><a href="parent-profile.php?profile=<?= $parent['id']; ?>"><?= $parent["occupation"]; ?></a></td>
                                                <td><a href="parent-profile.php?profile=<?= $parent['id']; ?>"><?= $parent["address"]; ?></a></td>
                                                <td><a href="parent-profile.php?profile=<?= $parent['id']; ?>"><?= $parent["parent_state"]; ?></a></td>
                                                <td><a href="parent-profile.php?profile=<?= $parent['id']; ?>"><?= $parent["username"]; ?></a></td>
                                                <td><a href="parent-profile.php?profile=<?= $parent['id']; ?>"><?= $parent["parent_phone"]; ?></a></td>
                                                <td>
                                                    <a href="edit-parent.php?edit=<?= $parent['id']; ?>" class="btn btn-info">Edit</a> |
                                                    <a href="all-parent.php?delete=<?= $parent['id']; ?>" class="delete btn btn-danger">Delete</a>
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