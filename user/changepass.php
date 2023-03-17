<?php
session_start();


require './class/dbconnect.php';
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}
    if($_POST)
    {
        $user_password1=$_POST["user_password"];
        $newpassword=$_POST["newpassword"];
        $confirmnewpassword=$_POST["confirmnewpassword"];
        $user_id=$_SESSION["user_id"];
        
        $oqr=mysqli_query($connection,"select user_password from tbl_user_master where user_id='{$user_id}'") or die(mysqli_error($connection));
        
        $odata=mysqli_fetch_row($oqr);
        $olddata = $odata[0];
        if($olddata== $user_password1)
        {
            if($newpassword==$confirmnewpassword)
            {
                $q=mysqli_query($connection,"update tbl_user_master set user_password='{$newpassword}' where user_id='{$user_id}'") or die(mysql_error($connection));
                if($q)
                {
                    echo "<script>alert('Password has been changed.'); window.location='home.php';</script>";
                }
            }
            else
            {
                echo "<script>alert('New Password and Confirm Password does not match.')</script>";
            }
        }
        else
        {
            echo "<script>alert('Old Password does not match.')</script>";
        }
    }
?>


<!DOCTYPE HTML>
<html class="no-js">

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:27 GMT -->

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
    include('./usertheme/navbar.php');
    ?>
    <!-- End Site Header -->
    <!-- Site Showcase -->
    <div class="site-showcase">
      <!-- Start Page Header -->

      <!-- End Page Header -->
    </div>
    <!-- Start Content -->
    <div class="main" role="main">
      <div id="content" class="content full">
        <div class="container">
          <div class="page">
            <div class="row">
              <div class="col-md-4 col-sm-4">

              </div>
              <div class="col-md-4 col-sm-4 login-form">
                <h3>Change Password</h3>
                <form method="post" id="changepass">
                 
                  
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="user_password" class="form-control required"  placeholder="Old Password">
                  </div>
                  <label id="password-error" class="error" for="user_password" style=""></label>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="newpassword" id="newpassword" class="form-control required"  placeholder="New Password">
                   </div>
                   <label id="password-error" class="error" for="newpassword" style=""></label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="confirmnewpassword" class="form-control required"  placeholder="Repeat Password">
                  </div>
                  <label id="password-error" class="error" for="confirmnewpassword" style=""></label>
                  
                  <br>
                  <button type="submit" class="btn btn-primary">Change Password</button>

                  
                </form>

               

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Start Site Footer -->
  <?php
  include('./usertheme/footer.php');
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
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyB-SpgMgJfnYGQYrkDIYKMuw0keyeNtqL0"></script> <!-- Google Map -->

  <!-- Style Switcher Start -->
  <script src="jquery-3.1.1.js" type="text/javascript"></script>
  <script src="jquery.validate.js" type="text/javascript"></script>
  <script>
    // validate signup form on keyup and submit
    $("#changepass").validate({
      wrapper: 'div',

      rules: {

        user_password: {
          required: true,
          
        },
        
         newpassword: {
          required: true,
          minlength: 6
        },
        
         confirmnewpassword: {
          required: true,
          equalTo: "#newpassword"
        },

      },


      messages: {

        user_password: {
          required: "Please Enter Valid Password",
          
        },

        newpassword: {
          required: "Please Enter Valid Password",
          minlength: "Minimum length should be 6"
        },

        confirmnewpassword: {
          required: "Please Enter Valid Password",
          equalTo: "Please enter the same password as above"
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
    .error {
      color: red;
    }
  </style>
</body>

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:27 GMT -->

</html>
