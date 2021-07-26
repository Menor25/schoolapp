<?php
    include('includes/header.php');
    include('includes/sidenav.php');

    // $stmtimg = $connection->prepare('SELECT * FROM staff WHERE id = ?');
    // $stmtimg->bind_param('i', $_SESSION['staff']['id']);
    // $stmtimg->execute();
    // $result = $stmtimg->get_result();

    // while($rows = $result->fetch_assoc()){
    //     $userImage = $rows['staff_photo'];
    // }
    // $stmtimg->close();

    if(isset($_GET['profile'])){
        $id = $_GET['profile'];
    
        $stmt = $connection->prepare('SELECT * FROM staff WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
    
                $fname = $row['fname'];
                $gender = $row['gender'];
                $marital = $row['marital_status'];
                $fatherName = $row['father_name'];
                $motherName = $row['mother_name'];
                $religion = $row['religion'];
                $join = $row['joined_date'];
                $username = $row['username'];
                $section = $row['section'];
                $address = $row['address'];
                $phone = $row['staff_phone'];
                $userPhoto = $row['staff_photo'];
                $id = $row['id'];
            }
        $stmt->close();
    
    }

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Teacher</h3>
                    <ul>
                        <li>
                            <a href="all-staff.php">Home</a>
                        </li>
                        <li><?=  $fname ?> Profile</li>
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
                                <img src="<?=  $userPhoto; ?>" alt="teacher">
                            </div>
                            <div class="item-content">
                                <div class="header-inline item-header">
                                    <h3 class="text-dark-medium font-medium"><?=  $fname; ?></h3>
                                    <div class="header-elements">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-edit"></i></a></li>
                                            <li><a href="#"><i class="fa fa-print"></i></a></li>
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
                                                <tb><input type="hidden" name="id" value="<?= $row['id']; ?>"></tb>
                                            </tr>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="font-medium text-dark-medium"><?=  $fname; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender:</td>
                                                <td class="font-medium text-dark-medium"><?=  $gender; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Marital Status:</td>
                                                <td class="font-medium text-dark-medium"><?=  $marital; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Father Name:</td>
                                                <td class="font-medium text-dark-medium"><?=  $fatherName; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Mother Name:</td>
                                                <td class="font-medium text-dark-medium"><?=  $motherName; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Religion:</td>
                                                <td class="font-medium text-dark-medium"><?=  $religion; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Join Date:</td>
                                                <td class="font-medium text-dark-medium"><?=  $join; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Username:</td>
                                                <td class="font-medium text-dark-medium"><?= $username; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Subject:</td>
                                                <td class="font-medium text-dark-medium">English</td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td class="font-medium text-dark-medium">2</td>
                                            </tr>
                                            <tr>
                                                <td>Section:</td>
                                                <td class="font-medium text-dark-medium"><?=  $section; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td class="font-medium text-dark-medium"><?=  $address; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td class="font-medium text-dark-medium"><?=  $phone; ?></td>
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