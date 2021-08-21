<?php
include('private/autoloads.php');


$stmtimg = $connection->prepare('SELECT * FROM parent WHERE id = ?');
$stmtimg->bind_param('i', $_SESSION['parent']['id']);
$stmtimg->execute();
$result = $stmtimg->get_result();

while($rows = $result->fetch_assoc()){
    $userImage = $rows['parent_photo'];
    $username = $rows['username'];
    $fname = $rows['fname'];
}
$stmtimg->close();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>School | Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"> -->
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="fonts/flaticon.css">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Select 2 CSS -->
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernize js -->
    <script src="js/modernizr-3.6.0.min.js"></script>

    <style>
        @media print {
            .print{
                display: none;
            }
            .breadcrumbs-area ul{
                display: none;
            }
        }
    </style>
</head>
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
                    <div class="print text-center">
                        <button type="submit" class="fw-btn-fill btn-gradient-yellow" onclick="window.print()">Print</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Student Details Area End Here -->

