<?php
session_start();
    require './class/dbconnect.php';
   $pgid = $_GET['pgid'];
$pgq = mysqli_query($connection,"select * from tbl_pg_master where pg_id= '{$pgid}'") or die(mysqli_error($connection));
$pgdata = mysqli_fetch_array($pgq);
if($_POST)
   {
        $pg_id=$pgdata['pg_id'];
        $userid=$_SESSION['user_id'];
        $booking_chargeamount=mysqli_real_escape_string($connection, $_POST['booking_chargeamount']);
        $booking_desc=mysqli_real_escape_string($connection, $_POST['booking_desc']);
        $booking_startdate=mysqli_real_escape_string($connection, $_POST['booking_startdate']);
        $user_idproof=$_FILES['user_idproof']['name'];
        $status = "Pending";
 $insertquery=mysqli_query($connection,"insert into tbl_booking(booking_startdate,booking_chargeamount,booking_desc,user_idproof,booking_status,pg_id,user_id) values('{$booking_startdate}','{$booking_chargeamount}','{$booking_desc}','{$user_idproof}','{$status}','{$pg_id}','{$userid}')") or die(mysqli_error($connection));
                    if($insertquery)
                    {
                     
                       $fileprocess=move_uploaded_file($_FILES['user_idproof']['tmp_name'], "../admin/pgdocs/".$user_idproof);
                       if($fileprocess)
                        {
                            echo "<script>alert('Booking Done!');</script>";
                            header("location:payment.php?pgid=$pgid");
                        }
                    }
   }
?>

<!DOCTYPE HTML>

<html class="no-js">

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/edit-agent-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:27 GMT -->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BookMyPG</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<!-- Color Style -->
<link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
<link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
<!-- SCRIPTS
  ================================================== -->
<script src="js/modernizr.js"></script><!-- Modernizr -->
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
  <!-- Start Site Header -->
  <?php
     include ('./usertheme/navbar.php');
  ?>
  <!-- End Site Header --> 
  <!-- Site Showcase -->
  <div class="site-showcase">
  <!-- Start Page Header -->
  <div class="parallax page-header" style="background-image:url(images/page-header1.jpg);">
  		<div class="container">
        	<div class="row">
            	<div class="col-md-12">
  					<h1>Booking</h1>
        		</div>
           </div>
       </div>
  </div>
  <!-- End Page Header -->
  </div>
  <!-- Start Content -->
  <div class="main" role="main">
      <div id="content" class="content full">
        	<div class="container">
      <div class="page">
        <div class="row">
          <div class="col-md-12">
            
            <form name="profile" action="#" method="post" id="booking" enctype="multipart/form-data">
              
             <div class="block-heading" id="additionalinfo">
                <h4><span class="heading-icon"><i class="fa fa-plus"></i></span>PG Details</h4>
              </div>
              <div class="padding-as25 margin-30 lgray-bg">
                <div class="row">
                  <div class="col-md-4 col-sm-4 ">
                    <label>PG Name</label>
                  </div>
                  <div class="col-md-8 col-sm-8 submit-description">
                      <input type="text" name="PG_name" value="<?php echo $pgdata['pg_name']; ?>" readonly>
                  </div>
                </div>
                  <hr><!-- comment -->
                   <div class="row">
                  <div class="col-md-4 col-sm-4 ">
                    <label>Charge Amount</label>
                  </div>
                  <div class="col-md-8 col-sm-8 submit-description">
                      <input type="text" name="booking_chargeamount" value="<?php echo $pgdata['pg_monthlycharge']; ?>" readonly>
                  </div>
                </div>
                  
                  
             
                <hr>
                  <div class="row">
                  <div class="col-md-4 col-sm-4 ">
                    <label>Booking Description</label>
                  </div>
                  <div class="col-md-8 col-sm-8 submit-description">
                    <input type="text" name="booking_desc" value="<?php echo $pgdata['pg_sharing']." Sharing"; ?>" placeholder="Booking Description" readonly >
                  </div>
                  </div>
              </div>
                
                  <hr>    
                
              <div class="block-heading" id="additionalinfo">
                <h4><span class="heading-icon"><i class="fa fa-plus"></i></span>Booking Information</h4>
              </div>
              <div class="padding-as25 margin-30 lgray-bg">
                
                  <hr>
                  <div class="row">
                  <div class="col-md-4 col-sm-4 ">
                    <label>Start living from</label>
                  </div>
                  <div class="col-md-8 col-sm-8 submit-description">
                    <input type="date" name="booking_startdate" class="required">
                  </div>
                </div>
                
                <hr>
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <label>User ID Proof</label>
                    <p>Upload image that are best clicked for better appearance of your profile</p>
                    <p>(ID Proof can be your Aadhar Card or PAN Card)</p>
                  </div>
                  <div class="col-md-8 col-sm-8 submit-image">
                      
                    
                    <input type="file" name="user_idproof" onChange="readURL(this);" class="required">
                   
                  </div>
                </div>
              </div>
                
               
              
              <div class="text-align-center" id="submit-property">
                <button type="submit" name="book now" class="btn btn-primary btn-lg cus_submit"><i class="fa fa-check"></i> Book Now</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Site Footer -->
   <?php
    include ('./usertheme/footer.php');
  ?>  
  <!-- End Site Footer -->
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
<script src="plugins/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel --> 
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
<script src="js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="js/bootstrap.js"></script> <!-- UI --> 
<script src="js/waypoints.js"></script> <!-- Waypoints --> 
<script src="js/init.js"></script> <!-- All Scripts -->
<!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]--> 
<script src="style-switcher/js/jquery_cookie.js"></script> 
<script src="style-switcher/js/script.js"></script>
<!-- Style Switcher Start -->
<script src="jquery-3.1.1.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script>
         // validate signup form on keyup and submit
		$("#booking").validate({
                    wrapper:'div',
            
			rules: {
				booking_startdate: {
					required: true,
				},
                                user_idproof:{
                                    required:true,
                                },
                               
        },
				
                
			messages: {           				
				booking_startdate: {
					required: "Please enter start date",
				},
                                user_idproof:{
                                    required: "Please upload your Id Proof",
                                },
				
				
			}
		});


        function Validate(no) {
                   no.value = no.value.replace(/[^ 0-9\n\r]+/g, '');
               }
               
               function Validatestring(no) {
                   no.value = no.value.replace(/[^ a-z A-Z\n\r]+/g, '');
               }

              
      
     </script>
<style>
    .error{
        color:red;
    }
</style>
</body>

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/edit-agent-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:27 GMT -->
</html>
