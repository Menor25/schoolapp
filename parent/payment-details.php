<?php
include('includes/header.php');
include('includes/sidenav.php');

$allFees = selectSchoolFees();
?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parent</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>Payment Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Payment details Area Start Here -->
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
                    <h3>List of all Kids</h3>
                </div>
            </div>

            <div class="table-responsive">
                <!-- <input type="hidden" value="<?= $_SESSION['fname']['id']; ?>"> -->
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Class</th>
                            <th>School Fees</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allFees as $fees) :
                        ?>
                        <form action="" method="POST">
                            <tr>
                                <td><?= $fees["fname"]; ?></td>
                                <td><?= $fees["section"]; ?></td>
                                <td><?= $fees["class"]; ?></td>
                                <td><?= $fees["school_fees"]; ?></td>
                                <td><input type="submit" name="submit" class="btn btn-success" value="Pay Now"></td>
                            </tr>
                        </form>
                        <?php
                        endforeach;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Payment details Area End Here -->

    <?php
    include('includes/footer.php');
    ?>