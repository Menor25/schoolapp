<?php
ob_start();
include('includes/header.php');
include('includes/sidenav.php');

$Error = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    paymentDetails(
        $fname = trim($_POST['fname']), 
        $schoolId = trim($_POST['schoolId']), 
        $className = trim($_POST['className']), 
        $amount = trim($_POST['amount']),
        $pname = trim($_POST['pname']),  
        $email = trim($_POST['email']), 
        $phone = trim($_POST['phone'])
    );
}

$allFees = selectSchoolFees();

$parentName = $_SESSION['fname']['id'];
?>
<script>
    function getStudent(val) {
        $.ajax({
            type: "POST",
            url: "get_class.php",
            data: 'schoolId=' + val,
            success: function(data) {
                $("#classId").html(data);

            }
        });
    }
</script>
<script>
    function getPayment(val) {
        $.ajax({
        type: "POST",
        url: "get_class.php",
        data: 'classId=' + val,
        success: function(data) {
        $("#amount").html(data);

        }
    });
        $.ajax({
        type: "POST",
        url: "get_student.php",
        data: 'classId=' + val,
        success: function(data) {
        $("#installment").html(data);

        }
    });
}
</script>
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
                    <h3>Enter payment details</h3>
                </div>
            </div>

            <div class="table-responsive">
                <form class="new-added-form" method="POST" action="">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Select Child *</label>
                            <select class="select2" id="first-name" name="fname" required>
                                <option value="">Please Select</option>
                                <?php
                                $stmt2 = $connection->prepare('SELECT * FROM admin_new WHERE parent = ?');
                                $stmt2->bind_param('s', $parentName);
                                $stmt2->execute();
                                $result = $stmt2->get_result();

                                while ($row = $result->fetch_assoc()) {
                                    $studentName = $row['fname'];

                                ?>
                                    <option value="<?= $studentName ?>"><?= $studentName ?></option>
                                <?php


                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Select School *</label>
                            <select class="select2" name="schoolId" id="schoolId" onChange="getStudent(this.value);" required>
                                <option value="">Please Select</option>
                                <?php
                                $stmt2 = $connection->prepare('SELECT * FROM school');
                                $stmt2->execute();
                                $result = $stmt2->get_result();

                                while ($row = $result->fetch_assoc()) {
                                    $studentSchool = $row['school_name'];

                                ?>
                                    <option value="<?= $studentSchool ?>"><?= $studentSchool ?></option>
                                <?php


                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Select Class *</label>
                            <select class="select2" id="classId" name="className" onChange="getPayment(this.value);" required>
                                
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Due Payment *</label>
                            <select class="select2" id="amount" name="amount" required>
                                
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Your Name *</label>
                            <input type="text" id="email-address" name="pname" class="form-control" required />
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Email *</label>
                            <input type="email" id="email-address" name="email" class="form-control" required />
                        </div>
                        <div class="col-xl-3 col-lg-6 col-12 form-group">
                            <label>Phone Number *</label>
                            <input type="text" id="phone" name="phone" placeholder="" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group"></div>
                        <div class="col-12 form-group mg-t-8">
                            <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" onclick="window.location.href='payment.php'">Proceed</button>
                            <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow" onclick="window.location.href='payment-details.php'">Reset</button>
                            <span id="success_message" class="text-success"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Payment details Area End Here -->

    <?php
    include('includes/footer.php');
    ?>