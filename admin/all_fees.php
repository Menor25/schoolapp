<?php
    include('includes/header.php');  
    include('includes/sidenav.php');

    $allAddedFees = selectSchoolFees();

    deleteFees($id);

    $sn = 1;
?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Classes</h3>
                    <ul>
                        <li>
                            <a href="all_fees.php">Home</a>
                        </li>
                        <li>All Classes</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Class Table Area Start Here -->
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
                                <h3>List of all classes</h3>
                            </div>
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>School</th>
                                        <th>Class</th>
                                        <th>Amount</th>
                                        <th>Fees Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($allAddedFees as $fee):
                                    ?>
                                                <tr>
                                                    <td><?= $sn; ?></td>
                                                    <td><?= $fee["school"]; ?></td>
                                                    <td><?= $fee["className"]; ?></td>
                                                    <td><?= $fee["feeAmount"]; ?></td>
                                                    <td>
                                                        <a href="edit-fees.php?edit=<?= $fee['id']; ?>" class="btn btn-info">Edit</a> | 
                                                        <a href="all_fees.php?delete=<?= $fee['id']; ?>" class="btn btn-danger">Delete</a>
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
                <!-- Class Table Area End Here -->

<?php
    include('includes/footer.php');
?>