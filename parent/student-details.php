<?php 
  include('includes/header.php');
  include('includes/sidenav.php');

  if(isset($_GET['profile'])){
    $id = $_GET['profile'];

    $stmt = $connection->prepare('SELECT * FROM admin_new WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            $fname = $row['fname'];
            $gender = $row['gender'];
            $dob = $row['dob'];
            $parent = $row['parent'];
            $occupation = $row['occupation'];
            $parent_phone = $row['parent_phone'];
            $phone = $row['phone'];
            $religion = $row['religion'];
            $join_date = $row['join_date'];
            $class = $row['class'];
            $school = $row['school'];
            $admission_id = $row['admission_Id'];
            $address = $row['address'];
            $userPhoto = $row['st_photo'];
            $id = $row['id'];
        }
    $stmt->close();

}


?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Students</h3>
                    <ul>
                        <li>
                            <a href="your-kids.php">Home</a>
                        </li>
                        <li><?= $fname ?> Profile</li>
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
                                <img src="<?= $userPhoto ?>" alt="student">
                            </div>
                            <div class="item-content">
                                <div class="header-inline item-header">
                                    <h3 class="text-dark-medium font-medium"><?= $fname ?></h3>
                                    <div class="header-elements">
                                        <ul>
                                            <!-- <li><a href="#"><i class="fa fa-edit"></i></a></li> -->
                                            <li><a href="#"><i class="fa fa-print"></i></a></li>
                                            <li><a href="#"><i class="fa fa-download"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="info-table table-responsive">
                                    <table class="table text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td class="font-medium text-dark-medium"><?= $fname ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender:</td>
                                                <td class="font-medium text-dark-medium"><?= $gender ?></td>
                                            </tr>
                                            <tr>
                                                <td>Parent Name:</td>
                                                <td class="font-medium text-dark-medium"><?= $parent ?></td>
                                            </tr>
                                            <tr>
                                                <td>Date Of Birth:</td>
                                                <td class="font-medium text-dark-medium"><?= $dob ?></td>
                                            </tr>
                                            <tr>
                                                <td>Religion:</td>
                                                <td class="font-medium text-dark-medium"><?= $religion ?></td>
                                            </tr>
                                            <tr>
                                                <td>Father Occupation:</td>
                                                <td class="font-medium text-dark-medium"><?= $occupation ?></td>
                                            </tr>
                                            <tr>
                                                <td>Parent Number:</td>
                                                <td class="font-medium text-dark-medium"><?= $parent_phone ?></td>
                                            </tr>
                                            <tr>
                                                <td>Admission Date:</td>
                                                <td class="font-medium text-dark-medium"><?= $join_date ?></td>
                                            </tr>
                                            <tr>
                                                <td>Class:</td>
                                                <td class="font-medium text-dark-medium"><?= $class ?></td>
                                            </tr>
                                            <tr>
                                                <td>Form Teacher:</td>
                                                <td class="font-medium text-dark-medium">Theophilus Menor</td>
                                            </tr>
                                            <tr>
                                                <td>Section:</td>
                                                <td class="font-medium text-dark-medium"><?= $school ?></td>
                                            </tr>
                                            <tr>
                                                <td>Admission ID:</td>
                                                <td class="font-medium text-dark-medium"><?= $admission_id ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td class="font-medium text-dark-medium"><?= $address ?></td>
                                            </tr>
                                            <tr>
                                                <td>Student Number:</td>
                                                <td class="font-medium text-dark-medium"><?= $phone ?></td>
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