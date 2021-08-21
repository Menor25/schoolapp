<?php 
  include('includes/header.php');
  include('includes/sidenav.php');

  $allPayment = selectPayment();


?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Accounts</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Fees Collection</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Fees Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>All Fees Collection</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table data-table text-nowrap">
                                <thead>
                                    <tr>
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
                                                <td><?= $payment["fullName"]; ?></td>
                                                <td><?= $payment["email"]; ?></td>
                                                <td><?= $payment["phone"]; ?></td>
                                                <td><?= $payment["reference"]; ?></td>
                                                <td><?= $payment["amount"]/100; ?></td>
                                                <td><?= $payment["status"]; ?></td>
                                                <td><?= $payment["date_paid"]; ?></td>
                                                <td class="badge badge-pill badge-success d-block mg-t-8">Paid</td>
                                            </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                    <!-- <tr>
                                        
                                        <td class="badge badge-pill badge-danger d-block mg-t-8">Unpaid</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Fees Table Area End Here -->

<?php
    include('includes/footer.php');
?>