<?php
    include('includes/header.php');
    include('includes/sidenav.php');

    $stmtimg = $connection->prepare('SELECT * FROM staff WHERE id = ?');
    $stmtimg->bind_param('i', $_SESSION['teacher']['id']);
    $stmtimg->execute();
    $result = $stmtimg->get_result();

    while($rows = $result->fetch_assoc()){
        $userImage = $rows['staff_photo'];
        $maritalStatus = $rows['marital_status'];
    }
    $stmtimg->close();

    //select assign class
    $stmtsubj = $connection->prepare('SELECT * FROM assign_subject WHERE teacher = ?');
    $stmtsubj->bind_param('i', $_SESSION['fname']['id']);
    $stmtsubj->execute();
    $result = $stmtsubj->get_result();

    while($rows = $result->fetch_assoc()){
        $subject = $rows['subject'];
        $class = $rows['class'];
    }
    $stmtsubj->close();
?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Teacher</h3>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li><?=  $_SESSION['fname']['id']; ?> Profile</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Student Table Area Start Here -->
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="heading-layout1">
                            <div class="item-title">
                                <h3>About Me</h3>
                            </div>
                        </div>
                        <div class="single-info-details">
                            <div class="item-img">
                                <img src="<?=  $userImage; ?>" alt="admin">
                            </div>
                            <div class="item-content">
                                <div class="header-inline item-header">
                                    <h3 class="text-dark-medium font-medium"><?=  $_SESSION['fname']['id']; ?></h3>
                                    <div class="header-elements">
                                        <ul>
                                            <li><a href="print_profile.php"><i class="fa fa-print"></i></a></li>
                                            <li><a href="#"><i class="fa fa-download"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- <p>Aliquam erat volutpat. Curabiene natis massa sedde lacu stiquen sodale 
                                word moun taiery.Aliquam erat volutpaturabiene natis massa sedde  sodale 
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
                                                <td>Marital Status:</td>
                                                <td class="font-medium text-dark-medium"><?=  $maritalStatus; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Father Name:</td>
                                                <td class="font-medium text-dark-medium"><?=  $_SESSION['father_name']['id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Mother Name:</td>
                                                <td class="font-medium text-dark-medium"><?=  $_SESSION['mother_name']['id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Religion:</td>
                                                <td class="font-medium text-dark-medium"><?=  $_SESSION['religion']['id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Join Date:</td>
                                                <td class="font-medium text-dark-medium"><?=  $_SESSION['joined_date']['id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Username:</td>
                                                <td class="font-medium text-dark-medium"><?= $username; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Subject:</td>
                                                <td class="font-medium text-dark-medium"><?= $subject; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td class="font-medium text-dark-medium"><?= $class; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Section:</td>
                                                <td class="font-medium text-dark-medium"><?=  $_SESSION['section']['id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td class="font-medium text-dark-medium"><?=  $_SESSION['address']['id']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td class="font-medium text-dark-medium"><?=  $_SESSION['staff_phone']['id']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Student Table Area End Here -->

<?php
    include('includes/footer.php');
?>