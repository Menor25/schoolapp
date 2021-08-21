<?php
    include('private/database.php');
    include('private/functions.php');
    
    if(isset($_POST['loginT_btn'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        teacherLogin($username, $password);
    }

    $Error = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My School Management App | Login</title>

    <!---Favicon ---->
    <!----- Fontawesome ----->
    <link rel="stylesheet" href="./css/font-awesome.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-----custom css -->
    <link rel="stylesheet" href="../css/style.css">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
    <div class="login-bg">
        <div class="login-content">
        <div class="card-login">
                <div class="titleText">
                    <h4><span>L</span>ogin <span>H</span>ere</h4>
                </div>

                <form action="" method="POST">
                    <div class="tab-content" style="margin-left: 50px;">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="form px-4 pt-5">
                            <?php if(isset($_SESSION[$Error])): ?>
                    <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                        <?php
                            echo $_SESSION[$Error];
                            unset($_SESSION[$Error]);

                        ?>
                    </div>
                <?php endif; ?>
                                <div class="inputBox">
                                    <input type="text" name="username" id="stusername" class="username" placeholder="Username" required>
                                    <i class="fa fa-check-circle"></i>
                                    <i class="fa fa-exclamation-circle"></i>
                                    <small>Error message</small>
                                </div>

                                <div class="inputBox">
                                    <input type="password" name="password" id="stpassword" class="stpassword" placeholder="Password" required>
                                    <i class="fa fa-check-circle"></i>
                                    <i class="fa fa-exclamation-circle"></i>
                                    <small>Error message</small>
                                </div>
                                <div class="form-group lead" style="font-weight: 600;">
                                    <!-- <label for="userType">I am a :</label> -->
                                    <input type="radio" class="custom-radio" name="userType" value="student" onclick="window.location.href='../student/login.php'" required>&nbsp;Student |
                                    <input type="radio" class="custom-radio" name="userType" value="parent" onclick="window.location.href='../parent/login.php'" required>&nbsp;Parent |
                                    <input type="radio" class="custom-radio" name="userType" value="teacher" checked required>&nbsp;Teacher |
                                    <input type="radio" class="custom-radio" name="userType" value="admin" onclick="window.location.href='../admin/login.php'" required>&nbsp;Admin
                                </div>

                                <div class="d-flex">
                                    <button class="submit" name="loginT_btn" onclick="checkLogin()">Login</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>





    <!-- Vendor JS Files -->
    <script src="asset/jquery/jquery.min.js"></script>

    <!---- custom script--->
    <script src="../asset/js/script.js"></script>
    <script src="asset/js/slider.js"></script>
</body>

</html>