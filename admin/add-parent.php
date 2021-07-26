<?php 
  include('includes/header.php');
  include('includes/sidenav.php');

$sql = "SELECT * FROM country  ORDER BY country_name ASC";
$run_query = mysqli_query($connection, $sql);
//Count total number of rows
$count = mysqli_num_rows($run_query);

//Get all state data
$sql2 = "SELECT * FROM state  ORDER BY state_name ASC";
$run_query2 = mysqli_query($connection, $sql2);
//Count total number of rows
$count2 = mysqli_num_rows($run_query2);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    insertParent(
        $fname = $_POST['fname'],
        $gender = $_POST['gender'],
        $religion = $_POST['religion'],
        $country = $_POST['country'],
        $parent_state = $_POST['parent_state'],
        $occupation = $_POST['occupation'],
        $address = $_POST['address'],
        $username = $_POST['username'],
        $password = $_POST['password'],
        $parent_phone = $_POST['parent_phone'],
        $parent_photo = $_FILES['parent_photo'],
    );
}

?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Parents</h3>
                    <ul>
                        <li>
                            <a href="all-parent.php">Home</a>
                        </li>
                        <li>Add New Parent</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add New Teacher Area Start Here -->
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
                                <h3>Add New Parent</h3>
                            </div>
                        </div>
                        <form class="new-added-form" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Full Name *</label>
                                    <input type="text" placeholder="" name="fname" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Gender *</label>
                                    <select class="select2" name="gender" required>
                                        <option value="">Please Select Gender *</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Religion *</label>
                                    <select class="select2" name="religion" required>
                                        <option value="">Please Select Religion *</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Country *</label>
                                    <select class="select2" name="country" id="country" required>
                                        <option value="">Please Select Country</option>
                                            <?php
                                                if ($count > 0) {
                                                    while ($row = mysqli_fetch_array($run_query)) {
                                                        $country_id = $row['country_id'];
                                                        $country_name = $row['country_name'];
                                                        echo "<option value='$country_name'>$country_name</option>";
                                                    }
                                                } else {
                                                    echo '<option value="">Country not available</option>';
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>State of Origin *</label>
                                    <select class="select2" name="parent_state" id="state" required>
                                                <option value=""> Please Select State</option>
                                                <?php
                                                if ($count2 > 0) {
                                                    while ($row2 = mysqli_fetch_array($run_query2)) {
                                                        $state_id = $row2['state_id'];
                                                        $state_name = $row2['state_name'];
                                                        echo "<option value='$state_name'>$state_name</option>";
                                                    }
                                                } else {
                                                    echo '<option value="">State not available</option>';
                                                }
                                                ?>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Occupation *</label>
                                    <input type="text" placeholder="" name="occupation" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Address *</label>
                                    <input type="text" placeholder="" name="address" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Username *</label>
                                    <input type="text" placeholder="" name="username" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Password *</label>
                                    <input type="password" placeholder="" name="password" class="form-control" required>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Parent Phone *</label>
                                    <input type="text" placeholder="" name="parent_phone" class="form-control" required>
                                </div>
                                <div class="col-lg-6 col-12 form-group mg-t-30">
                                    <label class="text-dark-medium">Upload Parent Photo (150px X 150px) *</label>
                                    <input type="file" class="form-control-file" name="parent_photo" required>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow" onclick="window.location.href='add-parent.php'">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add New Teacher Area End Here -->

<?php
    include('includes/footer.php');
?>