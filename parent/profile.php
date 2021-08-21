<?php
include('includes/header.php');
include('includes/sidenav.php');


?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3><?=  $_SESSION['fname']['id']; ?></h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li><?=  $_SESSION['fname']['id']; ?> Profile</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>About Me</h3>
                </div>
            </div>
            <div class="single-info-details">
                <div class="item-img">
                    <img src="<?=  $userImage; ?>" alt="parent">
                </div>
                <div class="item-content">
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium"><?=  $_SESSION['fname']['id']; ?></h3>
                        <div class="header-elements">
                            <ul>
                                <li><a href="print_profile.php" title="print"><i class="fa fa-print"></i></a></li>
                                <li><a href="downloadpdf.php" title="download"><i class="fa fa-download"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <p>Aliquam erat volutpat. Curabiene natis massa sedde lacu stiquen sodale
                        word moun taiery.Aliquam erat volutpaturabiene natis massa sedde sodale
                        word moun taiery.</p> -->
                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td class="font-medium text-dark-medium"><?=  $_SESSION['fname']['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td class="font-medium text-dark-medium"><?=  $_SESSION['gender']['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Occupation:</td>
                                    <td class="font-medium text-dark-medium"><?=  $_SESSION['occupation']['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td class="font-medium text-dark-medium"><?=  $_SESSION['address']['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>State of Origin:</td>
                                    <td class="font-medium text-dark-medium"><?=  $_SESSION['parent_state']['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Religion:</td>
                                    <td class="font-medium text-dark-medium"><?=  $_SESSION['religion']['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Username:</td>
                                    <td class="font-medium text-dark-medium"><?=  $_SESSION['username']['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td class="font-medium text-dark-medium"><?=  $_SESSION['parent_phone']['id']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Student Details Area End Here -->

    <?php
    include('includes/footer.php');
    ?>