<?php session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["uid"])==0)
    {   
header('location:login.php');
}
else{
$uid=$_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Activitar">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking-history Info</title>

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
    <!-- <link rel="stylesheet" href="css/package.css" type="text/css"> -->
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
                <a href="./index.html">
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
                        <h2>Booking History</h2>
                        <div class="breadcrumb-controls">
                            <a href="index.php"><i class="fa fa-home"></i> Home</a>
                            <span>Booking history</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

	<!-- Contact Section -->
    <div class="abc">
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">
			
			<div class="row">
				
				<div class="col-lg-12">
					   <table class="table table-hover table-bordered">
                <thead>
                   <?php $bookindid=$_GET['bookingid'];
                  $sql="SELECT t1.id as bookingid,t3.fname as Name, t3.email as email,t1.booking_date as bookingdate,t2.titlename as title,t2.PackageDuratiobn as PackageDuratiobn,
t2.Price as Price,t2.Description as Description,t5.PackageName as PackageName,payment,paymentType FROM tblbooking as t1
 join tbladdpackage as t2
on t1.package_id =t2.id
join tbluser as t3
on t1.userid=t3.id

join tblpackage as t5
on t2.PackageType=t5.id
 where t1.id=:bookindid";
                  $query= $dbh->prepare($sql);
                  $query->bindParam(':bookindid',$bookindid, PDO::PARAM_STR);
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                  ?>
                  <tr>
                   <th>Booking Date</th>
                   <td><?php echo $result->bookingdate; ?></td>
                    <th>Name</th>
                    <td><?php echo $result->Name; ?></td>
                  </tr>
                  <tr>
                   <th>Email</th>
                   <td><?php echo $result->email; ?></td>
                    
                  </tr>
                  <tr>
                   <th>Package Name:</th>
                   <td><?php echo $result->PackageName; ?></td>
                    <th>Title</th>
                    <td><?php echo $result->title; ?></td>
                  </tr>
                  <tr>
                   <th>Package Duratiobn</th>
                   <td><?php echo $result->PackageDuratiobn; ?></td>
                    <th>Price</th>
                    <td><?php echo $result->Price; ?></td>
                    <?php $pricess=$result->Price; ?>
                  </tr>
                  <tr>
                   <th>Description</th>
                   <td colspan="3"><?php echo $result->Description; ?></td>
                    
                  </tr>
             
                  <tr>
                   <th>PaymentType</th>
                   <td colspan="3"><?php  $ptype=$result->paymentType; 

if($ptype==''):
	echo "Payment not made yet";
else:
	echo $ptype;
endif;
                 ?></td>
                    
                  </tr>
                  <?php  $cnt=$cnt+1; } } ?>
                </thead>
              </table>

            <?php   $sql="SELECT * from tblpayment
 where bookingID=:bookindid";
                  $query= $dbh->prepare($sql);
                  $query->bindParam(':bookindid',$bookindid, PDO::PARAM_STR);
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  { ?>
                       <table class="table table-hover table-bordered">
                        <tr>
                          <th colspan="3" style="text-align:center;font-size:20px;">Payment History</th>
                        </tr>
                        <tr>
                          <th>Payment Type</th>
                          <th>Amount Paid</th>
                          <th>Payment Date</th>
                        </tr>
 <?php foreach($results as $result)
                  { ?>
<tr>
  <td><?php echo $result->paymentType; ?></td>
  <td><?php echo $tpayment=$result->payment; ?></td>
  <td><?php echo $result->payment_date; ?></td>
</tr>
<?php 
$gpayment+=$tpayment;
}  ?>
<tr>
  <th>Total</th>
  <th><?php echo $gpayment;?></th>
</tr>


                       </table>
                     <?php } ?>
				</div>
			
			</div>
		</div>
	</section>
    </div>
	<!-- Trainers Section end -->



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
                        <div class="ct-inside"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
     .abc {
    background-image: linear-gradient(#FF5F6D , #FFC371)
    }
    th{
        font-weight:900;
        font-size:large;
    }
</style>
</html>
        <?php } ?>