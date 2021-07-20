<?php
include('includes/header.php');
include('includes/sidenav.php');


?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parents</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>Check Result</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->

    <!-- Result Checker Area Start Here -->
    <div class="card height-auto">
        <div class="login-page-content">
            <div class="login-box">
                <form action="" class="login-form">
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" placeholder="Enter student class" class="form-control">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Pin</label>
                        <input type="password" placeholder="Enter student pin" class="form-control">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <?php
    include('includes/footer.php');
    ?>