<?php
    include('includes/header.php');
    include('includes/sidenav.php');

    $Error = "";


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        editFees(

            $school = trim($_POST['school']),
            $className = trim($_POST['className']),
            $feeAmount = trim($_POST['feeAmount']),
            $id = $_POST['id'],
        );
        
        // header('Location: addd-class.php');
    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];

        $stmt = $connection->prepare('SELECT * FROM school_fees WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();

                $school = $row['school'];
                $className = $row['className'];
                $feeAmount = $row['feeAmount'];
            }
        $stmt->close();

    }

?>
<script>
    function getClass(val) {
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
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>School Fees</h3>
                    <ul>
                        <li>
                            <a href="all_fees.php">Home</a>
                        </li>
                        <li>Edit Fees</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Add Class Area Start Here -->
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
                                <h3>Add New Fees Amount</h3>
                            </div>
                        </div>
                        <form class="new-added-form" method="POST" action="">
                            <div class="row">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>School *</label>
                                    <select class="select2" name="school" id="schoolId" onChange="getClass(this.value);" required>
                                    <option value="<?= $school ?>"><?= $school ?></option>
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
                                    <label>Class *</label>
                                    <select class="select2" name="className" id="classId" required>
                                   
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 form-group">
                                    <label>Fee Amount *</label>
                                    <input type="number" placeholder="" name="feeAmount" class="form-control" value="<?= $feeAmount ?>" required>
                                </div>
                                <div class="col-md-6 form-group"></div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
                                    <span id="success_message" class="text-success"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Add Class Area End Here -->

<?php
    include('includes/footer.php');
?>