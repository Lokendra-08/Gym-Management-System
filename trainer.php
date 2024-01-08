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
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trainer Info</title>

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
    <link rel="stylesheet" type="text/css" href="css/train.css" /> 
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.php">
                    <img src="img/logo.png" alt="" width="150" height="50">
                </a>
            </div>
            <div class="container">
                <div class="nav-menu">
                    <nav class="mainmenu mobile-menu">
                        <ul>
                        <li><a href="./index.php">Home</a></li>
                            <li ><a href="./package.php">Packages</a></li>
                            <li class="active"><a href="./trainer.php">Trainer</a></li>
                            <li><a href="./Booking-History.php">Booking History</a></li>
                            <!-- <li><a href="./contact.php">About us</a></li> -->
                            <li><a href="./admin/index.php">Admin Login</a></li>

                            <li>
                            <div>
                                <?php if(strlen($_SESSION['uid'])==0): ?>
                                <li><a href="login.php">Login</a></li>
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
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg spad" data-setbg="img/about-bread.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Trainer</h2>
                        <div class="breadcrumb-controls">
                            <a href="#"><i class="fa fa-home"></i> Home</a>
                            <span>Trainer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <div class="abc">
    <main class="app-content">
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
               <h3>Trainer</h3>
              <hr />
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Trainer name</th>
                    <th>Trainer class</th>
                    <th>Trainer contact</th>
                  </tr>
                </thead>
              
                   <?php
                   include  'include/config.php';
                  $sql="SELECT * FROM tbladdtrainer";
                  $query= $dbh->prepare($sql);
				  $imageURL = 'img/'.$row["tran_image"];
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                  ?>

                <tbody>
                  <tr>
                    <td><?php echo($cnt);?></td>
                  <td><?php echo htmlentities($result->tran_name);?></td>
                  <td><?php echo htmlentities($result->tran_class);?></td>
                  <td><?php echo htmlentities($result->tran_contact);?></td>
                  </tr>
                   
                 
                </tbody>

     <!--    // end modal popup code........ -->
                 <?php  $cnt=$cnt+1; } } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    </div>

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-logo-item">
                        <div class="f-logo">
                            <a href="#"><img src="img/logo.png" alt="" width="150px" height="100px"></a>
                        </div>
                        <div class="social-links">
                            <h6>Follow us</h6>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Program</h5>
                        <ul class="workout-program">
                            <li><a href="#">Bodybuilding</a></li>
                            <li><a href="#">Running</a></li>
                            <li><a href="#">Streching</a></li>
                            <li><a href="#">Weight Loss</a></li>
                            <li><a href="#">Gym Fitness</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-widget">
                        <h5>Get Info</h5>
                        <ul class="footer-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>Phone:</span>
                                (12) 345 6789
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <span>Email:</span>
                                luckyt615@gmail.com
                            </li>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>Address</span>
                                Ramghat Road Aligarh, 202001
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="ct-inside">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

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

<style>
    h3{
        text-align:center;
        font-weight: 900;
    }
    .abc {
    background-image: linear-gradient(#FF5F6D , #FFC371)
    }
    th{
        font-weight:900;
        font-size:large;
    }
</style>
</html>