<?php
include('includes/header.php');
include('includes/sidenav.php');


?>
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <div style="display: flex;">
            <h3 id="greeting"></h3>&nbsp;&nbsp;<h3><?= $_SESSION['fname']['id'] ?></h3>
        </div>

        <h3>Dashboard</h3>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>Student</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <!-- Student Info Area Start Here -->
        <div class="col-12-xxxl col-12">
            <div class="card dashboard-card-ten">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>About Me</h3>
                        </div>
                    </div>
                    <div class="single-info-details">
                        <div class="item-img">
                            <img src="<?= $userImage; ?>" alt="admin">
                        </div>
                        <div class="item-content">
                            <div class="header-inline item-header">
                                <h3 class="text-dark-medium font-medium"><?= $_SESSION['fname']['id']; ?></h3>
                                <div class="header-elements">
                                    <ul>
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
                                            <td>Name:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['fname']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['gender']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth:</td>
                                            <td class="font-medium text-dark-medium"><?= $dob; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Religion:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['religion']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Parent :</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['parent']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Parent Phone Number:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['parent_phone']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['username']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>School:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['school']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Class:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['class']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Admission ID:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['admission_Id']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Student Phone Number:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['phone']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>State of Origin:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['state']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['address']['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Join Date:</td>
                                            <td class="font-medium text-dark-medium"><?= $_SESSION['joined_date']['id']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Student Info Area End Here -->

        <div class="col-12-xxxl col-12">
            <div class="row">
                <!-- Summery Area Start Here -->
                <div class="col-lg-4">
                    <div class="dashboard-summery-one">
                        <div class="row">
                            <div class="col-6">
                                <div class="item-icon bg-light-magenta" style="padding-top: 12px;">
                                    <i class="fa fa-list text-magenta"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="item-content">
                                    <div class="item-title">Notification</div>
                                    <div class="item-number"><span class="counter" data-num="12">12</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dashboard-summery-one">
                        <div class="row">
                            <div class="col-6">
                                <div class="item-icon bg-light-blue" style="padding-top: 12px;">
                                    <i class="fa fa-calendar text-blue"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="item-content">
                                    <div class="item-title">Events</div>
                                    <div class="item-number"><span class="counter" data-num="06">06</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dashboard-summery-one">
                        <div class="row">
                            <div class="col-6">
                                <div class="item-icon bg-light-yellow" style="padding-top: 12px;">
                                    <i class="fa fa-percent text-orange"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="item-content">
                                    <div class="item-title">Attendance</div>
                                    <div class="item-number"><span class="counter" data-num="94">94</span><span>%</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Summery Area End Here -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4-xxxl col-xl-6 col-12">
            <div class="card dashboard-card-three">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Attendence</h3>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a> -->
                                <a class="dropdown-item" href="index.php"><i class="fa fa-redo text-orange-peel"></i>Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="doughnut-chart-wrap">
                        <canvas id="student-doughnut-chart" width="100" height="270"></canvas>
                    </div>
                    <div class="student-report">
                        <div class="student-count pseudo-bg-blue">
                            <h4 class="item-title">Absent</h4>
                            <div class="item-number">28.2%</div>
                        </div>
                        <div class="student-count pseudo-bg-yellow">
                            <h4 class="item-title">Present</h4>
                            <div class="item-number">65.8%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4-xxxl col-xl-6 col-12">
            <div class="card dashboard-card-thirteen">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Event Calender</h3>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a> -->
                                <a class="dropdown-item" href="index.php"><i class="fa fa-redo text-orange-peel"></i>Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="calender-wrap">
                        <div id="fc-calender" class="fc-calender"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4-xxxl col-12">
            <div class="card dashboard-card-six">
                <div class="card-body">
                    <div class="heading-layout1 mg-b-17">
                        <div class="item-title">
                            <h3>Notifications</h3>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">...</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fas fa-cogs text-dark-pastel-green"></i>Edit</a> -->
                                <a class="dropdown-item" href="index.php"><i class="fa fa-redo text-orange-peel"></i>Refresh</a>
                            </div>
                        </div>
                    </div>
                    <div class="notice-box-wrap">
                        <div class="notice-list">
                            <div class="post-date bg-skyblue">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag mene esom tus eleifend
                                    lectus
                                    sed maximus mi faucibusnting.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-yellow">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag printing.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-pink">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag Nulla rhoncus eleifensed
                                    mim
                                    us mi faucibus id. Mauris vestibulum non purus lobortismenearea</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-skyblue">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag mene esom text of the
                                    printing.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-yellow">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag printing.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                        <div class="notice-list">
                            <div class="post-date bg-pink">16 June, 2019</div>
                            <h6 class="notice-title"><a href="#">Great School manag meneesom.</a></h6>
                            <div class="entry-meta"> Jennyfar Lopez / <span>5 min ago</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clock() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var seconds = date.getSeconds();

            var midday;

            hours = updateTime(hours);
            minutes = updateTime(minutes);
            seconds = updateTime(seconds);

            //Good morning, good afternoon, good evening condition
            if (hours < 12) {
                var greeting = "Good morning";
            }

            if (hours >= 12 && hours <= 16) {
                var greeting = "Good afternoon";
            }

            if (hours >= 16 && hours <= 24) {
                var greeting = "Good evening";
            }

            document.getElementById('greeting').innerHTML = greeting;
        }

        function updateTime(k) {
            if (k < 10) {
                return "0" + k
            } else {
                return k;
            }

        }
        //call clock function
        clock();
    </script>
    <?php
    include('includes/footer.php');
    ?>