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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-----custom css -->
    <link rel="stylesheet" href="../css/style.css">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
    <div class="login-bg">
        <div class="login-content">
            <div class="card">
                <div class="card-header titleText">
                    <h4><span>L</span>ogin <span>H</span>ere</h4>
                </div>
                <div class="tab-content" id="pills-tabContent" style="margin-top: 20px; margin-left: 50px;">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="form px-4 pt-5">
                            <div class="inputBox form-control">
                                <!----<label for="">Username :</label>--->
                                <input type="text" name="stusername" id="stusername" class="username" placeholder="Username" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="inputBox form-control">
                                <!---<label for="">Password :</label>--->
                                <input type="password" name="stpassword" id="stpassword" class="stpassword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="form-group lead" style="font-weight: 600;">
                                <!-- <label for="userType">I am a :</label> -->
                                <input type="radio" class="custom-radio" name="userType" value="student" onclick="window.location.href='../student/login.php'" required>&nbsp;Student |
                                <input type="radio" class="custom-radio" name="userType" value="parent" onclick="window.location.href='../parent/login.php'" required>&nbsp;Parent |
                                <input type="radio" class="custom-radio" name="userType" value="teacher" checked required>&nbsp;Teacher |
                                <input type="radio" class="custom-radio" name="userType" value="admin"  onclick="window.location.href='../admin/login.php'" required>&nbsp;Admin
                            </div>

                            <div class="d-flex">
                                <button class="submit" onclick="checkLogin()">Submit</button>
                            </div>
                            <a href="#" class="forgot-btn">Forgot Password?</a>
                        </div>
                    </div>

                </div>
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