<?php session_start();
error_reporting(0);
include  'include/config.php'; 
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{

$pid=$_GET['pid'];
if(isset($_POST['Submit'])){
$tran_name = $_POST['tran_name'];
$tran_class = $_POST['tran_class'];
$tran_contact = $_POST['tran_contact'];
$tran_image = $_POST['tran_image'];
$sql="update tbladdtrainer set tran_name=:tran_name,
tran_class=:tran_class,tran_contact=:tran_contact,tran_image=:tran_image where id=:id";

$query = $dbh -> prepare($sql);
$query->bindParam(':tran_name',$tran_name,PDO::PARAM_STR);
$query->bindParam(':tran_class',$tran_class,PDO::PARAM_STR);
$query->bindParam(':tran_contact',$tran_contact,PDO::PARAM_STR);
$query->bindParam(':tran_image',$tran_image,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query -> execute();
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='manage-post.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Update Trainer</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
   <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
    <main class="app-content">
      
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
             <!---Success Message--->  
          <?php if($msg){ ?>
          <div class="alert alert-success" role="alert">
          <strong>Well done!</strong> <?php echo htmlentities($msg);?>
          </div>
          <?php } ?>

          <!---Error Message--->
          <?php if($errormsg){ ?>
          <div class="alert alert-danger" role="alert">
          <strong>Oh snap!</strong> <?php echo htmlentities($errormsg);?></div>
          <?php } ?>
            <h3 class="tile-title">Update Trainer</h3>
               <?php
                   include  'include/config.php';
                  $sql="SELECT * FROM tbladdtrainer";
                  $query= $dbh->prepare($sql);
                  $query->bindParam(':pid',$pid, PDO::PARAM_STR);
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                  ?>
            <div class="tile-body">
              <form class="row" method="post">
                 
                <div class="form-group col-md-6">
                  <label class="control-label">Trainer Name</label>
                  <input class="form-control" name="tran_name" id="tran_name" type="text" placeholder="Enter your Trainer Name" value="<?php echo $result->tran_name;?>">
                </div>

               

                 <div class="form-group col-md-6">
                  <label class="control-label">Trainer Class</label>
                  <input class="form-control" type="text" name="tran_class" name="tran_class" placeholder="Enter Trainer Class" value="<?php echo $result->tran_class;?>">
                </div>

                 <div class="form-group col-md-6">
                  <label class="control-label">trainer contact</label>
                  <input class="form-control" type="number" id="tran_contact" name="tran_contact" pattern="[0-9]{10}" value="<?php echo $result->tran_contact;?>">
                </div>
                

                  <div class="form-group col-md-6">
                  <label class="control-label">Image</label>
                  <input type="file" name="tran_image" id="tran_image" accept=".jpg, .jpeg, .png" value="<?php echo $result->tran_image;?>">
                </div>

                <div class="form-group col-md-4 align-self-end">
                  <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
             <?php  $cnt=$cnt+1; } } ?>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
  <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
  </body>
</html>

<!-- Script -->
 <script>
function getdistrict(val) {
$.ajax({
type: "POST",
url: "ajaxfile.php",
data:'category='+val,
success: function(data){
$("#package").html(data);
}
});
}
</script>
<?php }?>