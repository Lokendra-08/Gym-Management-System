<?php 
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];

if(isset($_POST['submit']))
{ 
$pid=$_POST['pid'];


$sql="INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

$query = $dbh -> prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Package has been booked.');</script>";
echo "<script>window.location.href='booking-history.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Activitar">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">

</head>

<body>
        <!-- buttttttons --> 
        


    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="logo">
                <!-- <a href="./index.php"> -->
                    <img src="img/logo.png" alt="" width="150" height="50">
                </a>
            </div>
            
            <div class="container">
                <div class="nav-menu">
                    <nav class="mainmenu mobile-menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./package.php">Packages</a></li>
                            <li><a href="./trainer.php">Trainer</a></li>
                            <li><a href="./Booking-History.php">Booking History</a></li>
                            <!-- <li><a href="./contact.php">About us</a></li> -->
                            <li><a href="./admin/index.php">Admin Login</a></li>

                            <li>
                                <div>
                                <?php if(strlen($_SESSION['uid'])==0): ?>
                                <li><a href="login.php">User Login</a></li>
                                <?php else :?>
                                <li><a href="profile.php">My Profile</a></li>
                                <li><a href="changepassword.php">Change Password</a></li>

                               
                                <li><a href="logout.php">Logout</a></li>
                                
                                <?php endif;?>
                                </div>                
                            </li>                                

                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-text">
                                <h2>Join Us Now</h2>
                                <h1>FITNESS & SPORT</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-text">
                                <h2>Join Us Now</h2>
                                <h1>FITNESS & SPORT</h1>
                                <!-- <a href="#" class="primary-btn">Read More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-item set-bg" data-setbg="img/hero-slider/hero-3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-text">
                                <h2>Join Us Now</h2>
                                <h1>FITNESS & SPORT</h1>
                                <!-- <a href="#" class="primary-btn">Read More</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Feature Section Begin -->
    <section class="feature-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item set-bg" data-setbg="img/feature/feature-1.jpg">
                        <h3>GROUP CLASSES</h3>
                        <!-- <p>The Sopranos manages to address the biases<br /> and benefits of therapy</p> -->
                        <!-- <a href="#" class="primary-btn f-btn">Read More</a> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item set-bg" data-setbg="img/feature/feature-2.jpg">
                        <h3>PERSONAL TRAINING</h3>
                        <!-- <p>Strep throat is very common during the flu<br /> seasons and it can be preceded</p> -->
                        <!-- <a href="#" class="primary-btn f-btn">Read More</a> -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item set-bg" data-setbg="img/feature/feature-3.jpg">
                        <h3>Sports Nutrition</h3>
                        <!-- <p>A Human Being’s right to life implies his right to<br /> have the free and unrestricted</p> -->
                        <!-- <a href="#" class="primary-btn f-btn">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section End -->

    <!-- About Section Begin -->
    <section class="home-about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>WELCOME TO GYMBUDDY</h2>
                        <p class="short-details">GymBuddy is a cutting-edge functional fitness system that can help
                            everyday.Fitness is a key component of a healthier, happier, and more fulfilling life.</p>
                        <!-- <p class="long-details">Success isn’t really that difficult. There is a significant portion of
                            the population here in North America, that actually want and need success to be hard! For
                            those of you who are serious about having more, doing more, giving more and being more.</p>
                        <a href="#" class="primary-btn about-btn">Learn More</a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="img/home-about.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    

    <!-- Choseus Section Begin -->


    <section class="chooseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Why People Choose Us</h2>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-item">
                        <img src="img/icons/chose-icon-1.png" alt="">
                        <h5>Support 24/24</h5>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-item">
                        <img src="img/icons/chose-icon-2.png" alt="">
                        <h5>Our trainer</h5>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-item">
                        <img src="img/icons/chose-icon-3.png" alt="">
                        <h5>Personalized sessions</h5>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-item">
                        <img src="img/icons/chose-icon-4.png" alt="">
                        <h5>Our equipment</h5>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-item">
                        <img src="img/icons/chose-icon-5.png" alt="">
                        <h5>Classes daily</h5>
                        <p></p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="choose-item">
                        <img src="img/icons/chose-icon-6.png" alt="">
                        <h5>Focus on your health</h5>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Choseus Section End -->

   

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>