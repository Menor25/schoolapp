<?php 
  include('includes/header.php');
  include('includes/sidenav.php');


?>
            <div class="dashboard-content-one">
                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <div style="display: flex;"><h3 id="greeting"></h3>&nbsp;&nbsp;<h3><?= $fname; ?></h3></div>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>Parent</li>
                    </ul>
                </div>
                <!-- Breadcubs Area End Here -->
                <!-- Dashboard summery Start Here -->
                <div class="row">
                    <div class="col-6-xxxl col-sm-6 col-12">
                        <div class="dashboard-summery-one">
                            <div class="row">
                                <div class="col-6">
                                    <div class="item-icon bg-light-red">
                                        <i class="fa fa-money text-red"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Due Fees</div>
                                        <div class="item-number"><span>N</span><span class="counter" data-num="4503">4,503</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6-xxxl col-sm-6 col-12">
                        <div class="dashboard-summery-one">
                            <div class="row">
                                <div class="col-6">
                                    <div class="item-icon bg-light-magenta">
                                        <i class="fa fa-edit text-magenta"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Notifications</div>
                                        <div class="item-number"><span class="counter" data-num="12">12</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6-xxxl col-sm-6 col-12">
                        <div class="dashboard-summery-one">
                            <div class="row">
                                <div class="col-6">
                                    <div class="item-icon bg-light-yellow">
                                        <i class="fa fa-graduation-cap text-orange"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Result</div>
                                        <div class="item-number"><span class="counter" data-num="16">16</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6-xxxl col-sm-6 col-12">
                        <div class="dashboard-summery-one">
                            <div class="row">
                                <div class="col-6">
                                    <div class="item-icon bg-light-blue">
                                        <i class="fa fa-money text-blue"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="item-content">
                                        <div class="item-title">Expenses</div>
                                        <div class="item-number"><span>N</span><span class="counter" data-num="193000">1,93,000</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard summery End Here -->
                <!-- Dashboard Content Start Here -->
                <div class="row">
                    <div class="col-12-xxxl col-12">
                        <div class="card dashboard-card-twelve">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>My Kids</h3>
                                    </div>
                                    
                                </div>
                                <div class="kids-details-wrap">
                                    <div class="row">
                                        <div class="col-6-xxxl col-xl-6 col-12">
                                            <div class="kids-details-box mb-5">
                                                <div class="item-img">
                                                    <img src="./images/img.jpg" alt="kids">
                                                </div>
                                                <div class="item-content table-responsive">
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                            <tr>
                                                                <td>Name:</td>
                                                                <td>Jessia Rose</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gender:</td>
                                                                <td>Female</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Class:</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Roll:</td>
                                                                <td>#2225</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Section:</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Admission Id:</td>
                                                                <td>#0021</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Admission Date:</td>
                                                                <td>07.08.2017</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6-xxxl col-xl-6 col-12">
                                            <div class="kids-details-box">
                                                <div class="item-img">
                                                    <img src="./images/img.jpg" alt="kids">
                                                </div>
                                                <div class="item-content table-responsive">
                                                    <table class="table text-nowrap">
                                                        <tbody>
                                                            <tr>
                                                                <td>Name:</td>
                                                                <td>Jack Steve</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gender:</td>
                                                                <td>Male</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Class:</td>
                                                                <td>3</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Roll:</td>
                                                                <td>#2205</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Section:</td>
                                                                <td>A</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Admission Id:</td>
                                                                <td>#0045</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Admission Date:</td>
                                                                <td>07.08.2017</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12-xxxl col-12">
                        <div class="card dashboard-card-eleven">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>All Expenses</h3>
                                    </div>
                                </div>
                                <div class="table-box-wrap">
                                    <div class="table-responsive expenses-table-box">
                                        <table class="table data-table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input checkAll">
                                                            <label class="form-check-label">ID</label>
                                                        </div>
                                                    </th>
                                                    <th>Expanse</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>E-Mail</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input">
                                                            <label class="form-check-label">#0021</label>
                                                        </div>
                                                    </td>
                                                    <td>Exam Fees</td>
                                                    <td>$150.00</td>
                                                    <td class="badge badge-pill badge-success d-block mg-t-8">Paid</td>
                                                    <td>akkhorschool@gmail.com</td>
                                                    <td>22/02/2019</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input">
                                                            <label class="form-check-label">#0022</label>
                                                        </div>
                                                    </td>
                                                    <td>Semister Fees</td>
                                                    <td>$350.00</td>
                                                    <td class="badge badge-pill badge-danger d-block mg-t-8">Due</td>
                                                    <td>akkhorschool@gmail.com</td>
                                                    <td>22/02/2019</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input">
                                                            <label class="form-check-label">#0023</label>
                                                        </div>
                                                    </td>
                                                    <td>Exam Fees</td>
                                                    <td>$150.00</td>
                                                    <td class="badge badge-pill badge-success d-block mg-t-8">Paid</td>
                                                    <td>akkhorschool@gmail.com</td>
                                                    <td>22/02/2019</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input">
                                                            <label class="form-check-label">#0024</label>
                                                        </div>
                                                    </td>
                                                    <td>Exam Fees</td>
                                                    <td>$150.00</td>
                                                    <td class="badge badge-pill badge-danger d-block mg-t-8">Due </td>
                                                    <td>akkhorschool@gmail.com</td>
                                                    <td>22/02/2019</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input">
                                                            <label class="form-check-label">#0025</label>
                                                        </div>
                                                    </td>
                                                    <td>Exam Fees</td>
                                                    <td>$150.00</td>
                                                    <td class="badge badge-pill badge-success d-block mg-t-8">Paid</td>
                                                    <td>akkhorschool@gmail.com</td>
                                                    <td>22/02/2019</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input">
                                                            <label class="form-check-label">#0026</label>
                                                        </div>
                                                    </td>
                                                    <td>Semister Fees</td>
                                                    <td>$350.00</td>
                                                    <td class="badge badge-pill badge-danger d-block mg-t-8">Due</td>
                                                    <td>akkhorschool@gmail.com</td>
                                                    <td>22/02/2019</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input">
                                                            <label class="form-check-label">#0027</label>
                                                        </div>
                                                    </td>
                                                    <td>Exam Fees</td>
                                                    <td>$150.00</td>
                                                    <td class="badge badge-pill badge-success d-block mg-t-8">Paid</td>
                                                    <td>akkhorschool@gmail.com</td>
                                                    <td>22/02/2019</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="card dashboard-card-six">
                            <div class="card-body">
                                <div class="heading-layout1 mg-b-17">
                                    <div class="item-title">
                                        <h3>Notifications</h3>
                                    </div>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                            aria-expanded="false">...</a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- <a class="dropdown-item" href="#"><i
                                                    class="fas fa-times text-orange-red"></i>Close</a> -->
                                            <a class="dropdown-item" href="#"><i
                                                    class="fa fa-cogs text-dark-pastel-green"></i>Edit</a>
                                            <a class="dropdown-item" href="#"><i
                                                    class="fa fa-redo text-orange-peel"></i>Refresh</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="notice-box-wrap m-height-660">
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
                                        <div class="post-date bg-blue">16 June, 2019</div>
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
                                        <div class="post-date bg-blue">16 June, 2019</div>
                                        <h6 class="notice-title"><a href="#">Great School manag meneesom.</a></h6>
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
                    function clock(){
                        var date = new Date();
                        var hours = date.getHours();
                        var minutes = date.getMinutes();
                        var seconds = date.getSeconds();

                        var midday;

                        hours = updateTime(hours);
                        minutes = updateTime(minutes);
                        seconds = updateTime(seconds);

                        //Good morning, good afternoon, good evening condition
                        if(hours < 12){
                            var greeting = "Good morning";
                        }

                        if(hours >= 12 && hours <= 16){
                            var greeting = "Good afternoon";
                        }

                        if(hours >= 16 && hours <= 24){
                            var greeting = "Good evening";
                        }

                        document.getElementById('greeting').innerHTML = greeting;
                    }

                    function updateTime(k){
                        if(k < 10){
                            return "0" + k
                        }else{
                            return k;
                        }

                    }
                    //call clock function
                    clock();
                </script>
<?php
    include('includes/footer.php');
?>