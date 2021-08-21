<?php
// require "private/autoloads.php";
include('includes/functions.php');
include('includes/config.php');

if (isset($_POST['btnAdmission'])) {
    insert($_POST['applicant_name'], $_POST['applicant_dob'], $_POST['applicant_father_name'], $_POST['applicant_gender'], $_POST['applicant_mobile'], $_POST['applicant_address'], $_POST['applicant_country'], $_POST['applicant_state']);
};



$sql = "SELECT * FROM country  ORDER BY country_name ASC";
$run_query = mysqli_query($connection, $sql);
//Count total number of rows
$count = mysqli_num_rows($run_query);

//Get all state data
$sql2 = "SELECT * FROM state  ORDER BY state_name ASC";
$run_query2 = mysqli_query($connection, $sql2);
//Count total number of rows
$count2 = mysqli_num_rows($run_query2);

//Function call for school details
$schoolInfo = schoolDetails(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My School Management App</title>

    <!---Favicon ---->
    <!----- Fontawesome ----->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-----custom css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- Vendor CSS Files -->

    <link rel="stylesheet" href="asset/boxicons/css/boxicons.css">
    <link href="asset/aos/aos.css" rel="stylesheet">
    <link href="asset/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/venobox/venobox.css">
    <link rel="stylesheet" href="asset/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/icofont/icofont.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
    <!---- Navigation--->
    <header id="header">
        <div class="brand">
            <a href="index.php">
                <div class="logo">
                    <img src="<?php echo './images/fagslogo1.png' ?>" alt="School Logo">
                </div>
            </a>
            <a href="index.php"><span>FAGS</span></a>
        </div>

        <ul class="nav-link">
            <div class="top">
                <label for="" class="btn1 close-btn" onclick="toggleMenu()"><i class="fa fa-times"></i></label>
            </div>
            <li class="nav-items first"><a href="index.php">Home</a></li>
            <li class="nav-items"><a href="#about" onclick="toggleClose();">About</a></li>
            <li class="nav-items"><a href="#service" onclick="toggleMenu();">Services</a></li>
            <li class="nav-items"><a href="#mission" onclick="toggleMenu();">Mission</a></li>
            <li class="nav-items"><a href="#gallery" onclick="toggleMenu();">Gallery</a></li>
            <li class="nav-items"><a href="#teacher" onclick="toggleMenu();">Teachers</a></li>
            <li class="nav-items"><a href="#contact" onclick="toggleMenu();">Contact</a></li>

            <div class="st-login">
                <button class="btn" id="login"><a href="./student/login.php">Login Now</a></button>
            </div>
        </ul>

        <label for="" class="btn1 open-btn" onclick="toggleMenu()"><i class="fa fa-bars"></i></label>
    </header>

    <!----Admission Hero--->
    <section class="admission" id="admission">
        <div class="row">
            <div class="col50">
                <div class="imgBx img-slider" id="slider">
                    <div class="slide active">
                        <img class="slider-img" src="img-slider/img_1.jpg" alt="school-banner">
                        <div class="info">
                            <h2>Sport Activities</h2>
                            <p>Female football inter house competition held during our open week</p>
                        </div>
                    </div>

                    <div class="slide">
                        <img class="slider-img" src="img-slider/img_2.jpg" alt="school-banner">
                        <div class="info">
                            <h2>Sport Activities</h2>
                            <p>Female football inter house competition held during our open week</p>
                        </div>
                    </div>

                    <div class="slide">
                        <img class="slider-img" src="img-slider/img_3.jpg" alt="school-banner">
                        <div class="info">
                            <h2>Sport Activities</h2>
                            <p>Female football inter house competition held during our open week</p>
                        </div>
                    </div>

                    <div class="slide">
                        <img class="slider-img" src="img-slider/img_5.jpg" alt="school-banner">
                        <div class="info">
                            <h2>Sport Activities</h2>
                            <p>Female football inter house competition held during our open week</p>
                        </div>
                    </div>

                    <div class="slide">
                        <img class="slider-img" src="img-slider/img_4.jpg" alt="school-banner">
                        <div class="info">
                            <h2>Sport Activities</h2>
                            <p>Female football inter house competition held during our open week</p>
                        </div>
                    </div>

                    <div class="navigation">
                        <div class="btn-control active"></div>
                        <div class="btn-control"></div>
                        <div class="btn-control"></div>
                        <div class="btn-control"></div>
                        <div class="btn-control"></div>
                    </div>
                </div>
            </div>

            <div class="col50 admission-main" id="form">
                <h2 class="titleText"><span>A</span>dmission <span>F</span>orm</h2>
                <p>Enter the following details</p>
                <form action="" method="post">
                    <div class="admission-content form">

                        <div class="col25">
                            <div class="inputBox form-control">
                                <label for="">Name of Applicant :</label>
                                <input type="text" name="applicant_name" id="fullName" class="fullName" placeholder="Full Name" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="inputBox dob">
                                <label for="">Date of Birth :</label>
                                <input type="date" name="applicant_dob" class="dob" id="dob" placeholder="mm/dd/yy" required>
                                <i class="fa fa-check-circle dob"></i>
                                <i class="fa fa-exclamation-circle dob"></i>
                                <small>Error message</small>
                            </div>

                            <div class="inputBox form-control">
                                <label for="">Father Name :</label>
                                <input type="text" name="applicant_father_name" class="fname" id="fatherName" placeholder="Father's name" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="inputBox form-control">
                                <label for="">Gender :</label>
                                <select name="applicant_gender" id="gender" class="gender" required>
                                    <option value="">Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <i class="fa fa-check-circle gender"></i>
                                <i class="fa fa-exclamation-circle gender"></i>
                                <small>Error message</small>
                            </div>
                        </div>

                        <div class="col25">
                            <div class="inputBox form-control">
                                <label for="">Mobile no :</label>
                                <input type="text" name="applicant_mobile" class="phone" id="phoneNo" placeholder="Phone number" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="inputBox form-control">
                                <label for="">Address :</label>
                                <input type="text" name="applicant_address" class="address" id="address" placeholder="Home address" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="inputBox form-control">
                                <label for="">Country :</label>
                                <select name="applicant_country" id="country" required>
                                    <option value="">Select Country</option>
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
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="inputBox form-control">
                                <label for="">State of Origin :</label>
                                <select name="applicant_state" id="state">
                                    <option value="">Select State</option>
                                    <?php
                                    if ($count2 > 0) {
                                        while ($row2 = mysqli_fetch_array($run_query2)) {
                                            $state_id = $row2['state_id'];
                                            $state_name = $row2['state_name'];
                                            echo "<option value='$state_name'>$state_name</option>";
                                        }
                                    } else {
                                        echo '<option value="">Country not available</option>';
                                    }
                                    ?>
                                </select>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex">
                        <button class="submit" name="btnAdmission" onclick="checkInputs()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!--- About Section --->
    <section id="about" class="about container">
        <div class="container" data-aos="fade-up">
            <div id="about-us" class="about-title">
                <h2 class="titleText"><span>A</span>bout <span>U</span>s</h2>
                <div class="border"></div>
                <h3>Find out more about us</h3>
            </div>
            <div class="row">
                <div class="col50 about-us" data-aos="zoom-out" data-aos-delay="100">
                    <div class="imgBx">
                        <img src="img/about.jpg" alt="school-banner">
                    </div>
                </div>

                <div class="col50" data-aos="fade-up" data-aos-delay="100">
                    <h3>Hello there, if you are looking for a great place of learning for your kids, you are at the right place</h3>
                    <p class="font-italic">
                        This is a school committed to raise future leaders with good mindset. We have qualified certified teachers, good Science laboratory,
                        well stock Home Economics laboratory, bookshop and library. The school is located in a serene environment along Adesuwa Road,
                        GRA Benin City.
                    </p>

                    <ul>
                        <li>
                            <i class="bx bx-store-alt"></i>
                            <div>
                                <h5>Serene Environment For Learning</h5>
                                <p>The school has a spacious conducive environment for learning and learning facilities to aid learning faster</p>
                            </div>
                        </li>
                        <li>
                            <i class="bx bx-images"></i>
                            <div>
                                <h5>Well Equipped Library, Laboratories and Book Shop</h5>
                                <p>We have a well stocked laboratory for reading, well equipped laboratory for both science and art students
                                    and a fully stocked bookshop to carter for all your book needs</p>
                            </div>
                        </li>
                    </ul>
                    <p>
                        Please contact us to learn more and to get more information about us. Thank you
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!---Services Section---->
    <section id="service" class="container services">
        <div class="container" data-aos="fade-up">
            <div class="service-title">
                <h2 class="titleText"><span>S</span>ervices</h2>
                <div class="border"></div>
                <h3>check our services</h3>
            </div>
            <div class="service-content-grid">
                <div class="col25 services-rendered" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                        <h4><a href="">Skill Acquisition</a></h4>
                        <p>This is a school committed to raise future leaders with good mindset.</p>
                    </div>
                </div>

                <div class="col25 services-rendered" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-user-o"></i></div>
                        <h4><a href="">Skilled Teachers</a></h4>
                        <p>We have qualified certified teachers, good Science laboratory, well stock Home Economics laboratory.</p>
                    </div>
                </div>

                <div class="col25 services-rendered" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                        <h4><a href="">School Facilities</a></h4>
                        <p>We have a fully stocked library and bookshop to aid learning good Science laboratory and a
                            well stock Home Economics laboratory.</p>
                    </div>
                </div>

                <div class="col25 services-rendered" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="fa fa-book"></i></div>
                        <h4><a href="">Book Library &amp; Store </a></h4>
                        <p>We have a fully stocked library and bookshop to aid learning for our student.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--- Mission Section --->
    <section id="mission" class="mission-boxes mission">
        <div class="container" data-aos="fade-up">
            <div class="mission-grid">
                <div class="col32" data-aos="fade-up" data-aos-delay="100">
                    <div class="card">
                        <div class="imgBx-card">
                            <img src="img/about-boxes-1.jpg" class="card-img-top" alt="Our mission">
                        </div>
                        <div class="card-icon">
                            <i class="ri-brush-4-line"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Our Mission</a></h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit,
                                sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi. </p>
                        </div>
                    </div>
                </div>
                <div class="col32" data-aos="fade-up" data-aos-delay="200">
                    <div class="card">
                        <div class="imgBx-card">
                            <img src="img/about-boxes-2.jpg" class="card-img-top" alt="Our Plan">
                        </div>
                        <div class="card-icon">
                            <i class="ri-calendar-check-line"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Our Plan</a></h5>
                            <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium,
                                totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi. </p>
                        </div>
                    </div>
                </div>
                <div class="col32" data-aos="fade-up" data-aos-delay="300">
                    <div class="card">
                        <div class="imgBx-card">
                            <img src="img/about-boxes-3.jpg" class="card-img-top" alt="Our Vision">
                        </div>
                        <div class="card-icon">
                            <i class="ri-movie-2-line"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Our Vision</a></h5>
                            <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni
                                dolores eos qui ratione voluptatem sequi nesciunt Neque porro.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---- Gallery Section---->
    <section id="gallery" class="gallery">
        <div class="container">
            <h2 class="titleText"><span>O</span>ur <span>G</span>allery</h2>
            <div class="border"></div>
        </div>
        <div class="gallery-grid portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <div class="col25 gallery1">
                <a href="img/images/g2.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g2.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>School Library</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>


            <div class="col25 gallery1">
                <a href="img/images/g1.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g1.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>Menor SMS</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g3.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g3.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>Enjoing the Library</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g7.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g7.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>2018/2019 Graduation</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g5.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g5.jpg" alt="/">
                    <div class="textbox">
                        <h4>School Library</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g6.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g6.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>Menor SMS</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g11.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g11.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>Enjoying the Library</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g8.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g8.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>2018/2019 Graduation</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g9.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g9.jpg" alt="/">
                    <div class="textbox">
                        <h4>School Library</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g10.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g10.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>Menor SMS</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g4.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g4.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>Enjoing the Library</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

            <div class="col25 gallery1">
                <a href="img/images/g12.jpg" class="link-preview venobox" data-gall="portfolioGallery" data-gall="portfolioGallery" data-lightbox="portfolio"><img src="img/images/g12.jpg" class="img-responsive" alt="/">
                    <div class="textbox">
                        <h4>2018/2019 Graduation</h4>
                        <p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <!---- Teachers/team Section---->
    <section id="teacher" class="team">
        <div class="container">
            <div class="titleText">
                <h2 class="titleText"><span>O</span>ur <span>T</span>eam</h2>
                <div class="border"></div>
            </div>
            <div class="owl-carousel team-carousel">
                <a href="#">
                    <div class="team-item">
                        <img src="img/testimonials/testimonials-1.jpg" class="team-img" alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Proprietor</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </a>

                <a href="#">
                    <div class="team-item">
                        <img src="img/testimonials/testimonials-2.jpg" class="team-img" alt="">
                        <h3>Sara Wilson</h3>
                        <h4>Principal</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </a>

                <a href="#">
                    <div class="team-item">
                        <img src="img/testimonials/testimonials-3.jpg" class="team-img" alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Vice Principal</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </a>

                <a href="#">
                    <div class="team-item">
                        <img src="img/testimonials/testimonials-4.jpg" class="team-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Teacher</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </a>

                <a href="#">
                    <div class="team-item">
                        <img src="img/testimonials/testimonials-5.jpg" class="team-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Teacher</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!---- Contact Section----->
    <section id="contact" class="contact">
        <div class="container">
            <div class="titleText">
                <h2 class="titleText"><span>G</span>et <span>I</span>n <span>T</span>ouch</h2>
                <div class="border"></div>
            </div>

            <div class="contact-info" data-aos="fade-up">
                <div class="col80">
                    <div class="info-wrap">
                        <div class="contact-items">
                            <div class="col32 info first-child">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <!-- <p>A108 Adam Street<br>New York, NY 535022</p> -->
                                <p><?php echo $schoolInfo['schoolAddress']; ?></p>
                            </div>

                            <div class="col32 info second">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <!-- <p>info@example.com<br>contact@example.com</p> -->
                                <p><?php echo $schoolInfo['schoolEmail']; ?></p>
                            </div>

                            <div class="col32 info third">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <!-- <p>+1 5589 55488 51<br>+1 5589 22475 14</p> -->
                                <p><?php echo $schoolInfo['schoolPhone']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row message-contact" data-aos="fade-up">
                <div class="col80">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row form-row">
                            <div class="col50 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col50 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>

    <footer id="footer">
        <div class="container d-flex footer">

            <div class="text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright 2021 <strong><span><?php echo $schoolInfo['schoolName']; ?></span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    Designed by <a href="https://mmcstudio.com/">Theophilus Ajir Menor</a>
                </div>
            </div>
            <div class="social-links text-center">
                <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
                <!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
            </div>
        </div>
    </footer>

    <!-------Back to top ------->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!----- Student Modal Login ------>
    <!-- <div class="modal-bg">
        <div class="modal-content" id="form">
            <div class="close">+</div>
            <div class="card">
                <div class="card-header titleText">
                    <h4><span>L</span>ogin <span>H</span>ere</h4>
                </div>
                <div class="tab-content" id="pills-tabContent" style="margin-top: 20px; margin-left: 50px;">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="form px-4 pt-5">
                            <div class="inputBox form-control">
                                --<label for="">Username :</label>-
                                <input type="text" name="stusername" id="stusername" class="username" placeholder="Username" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>

                            <div class="inputBox form-control">
                                ---<label for="">Password :</label>--
                                <input type="password" name="stpassword" id="stpassword" class="stpassword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <i class="fa fa-check-circle"></i>
                                <i class="fa fa-exclamation-circle"></i>
                                <small>Error message</small>
                            </div>
                            <div class="form-group lead" style="font-weight: 600;">
                                -- <label for="userType">I am a :</label> --
                                <input type="radio" class="custom-radio" name="userType" value="student" required>&nbsp;Student |
                                <input type="radio" class="custom-radio" name="userType" value="parent" id="plogin" onclick="window.location.href='#parent'" required>&nbsp;Parent |
                                <input type="radio" class="custom-radio" name="userType" value="teacher" required>&nbsp;Teacher |
                                <input type="radio" class="custom-radio" name="userType" value="admin" required>&nbsp;Admin
                            </div>

                            <div class="d-flex">
                                <button class="submit" onclick="checkLogin()">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> -->


    <!-- Vendor JS Files -->
    <script src="asset/jquery/jquery.min.js"></script>
    <script src="asset/aos/aos.js"></script>
    <script src="asset/jquery.easing/jquery.easing.min.js"></script>
    <script src="asset/waypoints/jquery.waypoints.min.js"></script>
    <script src="asset/counterup/counterup.min.js"></script>
    <script src="asset/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="asset/venobox/venobox.js"></script>
    <script src="asset/owl.carousel/owl.carousel.js"></script>
    <script src="asset/php-email-form/validate.js"></script>
    <!-- <script src="js/jquery.swipebox.min.js"></script> -->

    <!----Back to top section---->
    <a href="#" class="back-to-top" id="backTop"><i class="fa fa-chevron-up"></i></a>
    <!---- custom script--->
    <script src="asset/js/script.js"></script>
    <script src="asset/js/slider.js"></script>
</body>

</html>