<?php
include('includes/header.php');
include('includes/sidenav.php');

    if($_GET['status'] !== "success"){
        header("Location: javascript://history.go(-1)");
    }

    $allPayment = selectPayment();
    $sn = 1;
?>

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parent</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>Payment Successful</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Payment details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">

            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Payment Summary</h3>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Reference Code</th>
                            <th>Amount</th>
                            <th>status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allPayment as $payment) :
                        ?>
                                <tr>
                                    <td><?= $sn; ?></td>
                                    <td><?= $payment["fullName"]; ?></td>
                                    <td><?= $payment["email"]; ?></td>
                                    <td><?= $payment["phone"]; ?></td>
                                    <td><?= $payment["reference"]; ?></td>
                                    <td><?= $payment["amount"]/100; ?></td>
                                    <td><?= $payment["status"]; ?></td>
                                    <td><?= $payment["date_paid"]; ?></td>
                                    <td><a href="">Download Receipt</a></td>
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
    <!-- Payment details Area End Here -->

    <?php
    include('includes/footer.php');
    ?>