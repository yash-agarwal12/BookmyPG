<?php
    require './class/dbconnect.php';
   
    if($_POST)
   {
        
        $owner_name=mysqli_real_escape_string($connection, $_POST['owner_name']);
        $pg_name=mysqli_real_escape_string($connection, $_POST['pg_name']);
        $pg_email=mysqli_real_escape_string($connection, $_POST['email']);
        $pgowner_gender=mysqli_real_escape_string($connection, $_POST['pgowner_gender']);
        $pg_isgirlsboys=mysqli_real_escape_string($connection, $_POST['pg_isgirlsboys']);
        $pg_operatingsince=mysqli_real_escape_string($connection, $_POST['pg_operatingsince']);
        $pg_monthlycharge=mysqli_real_escape_string($connection, $_POST['pg_monthlycharge']);
        $pg_depositamount=mysqli_real_escape_string($connection, $_POST['pg_depositamount']);
        $owner_phonenumber=mysqli_real_escape_string($connection, $_POST['contact_number']);
        $owner_password=mysqli_real_escape_string($connection, $_POST['password']);
        $owner_repeatpassword=mysqli_real_escape_string($connection, $_POST['repeat_password']);
        $owner_dob=mysqli_real_escape_string($connection, $_POST['dob']);
        $owner_address=mysqli_real_escape_string($connection, $_POST['address']);
        $pg_idproof=$_FILES['fileToUpload']['name'];
        $amenities=mysqli_real_escape_string($connection, $_POST['amenities']);
        $pg_registrationdocs=$_FILES['fileToUpload1']['name'];
        if($owner_password == $owner_repeatpassword)
        {
            $insertquery=mysqli_query($connection,"insert into tbl_pg_master(pg_ownername,pg_name,pg_email,pgowner_gender,pg_isgirlsboys,pg_operatingsince,pg_monthlycharge,pg_depositamount,pg_phonenumber,pg_password,pgowner_dob,pg_address,pg_idproof,pg_amenities,pg_registrationdocs) values('{$owner_name}','{$pg_name}','{$pg_email}','{$pgowner_gender}','{$pg_isgirlsboys}','{$pg_operatingsince}','{$pg_monthlycharge}','{$pg_depositamount}','{$owner_phonenumber}','{$owner_password}','{$owner_dob}','{$owner_address}','{$pg_idproof}','{$amenities}','{$pg_registrationdocs}')") or die(mysqli_error($connection));
          
            
            if ($insertquery)
            {
                $fileprocess=move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../admin/pgdocs/". $pg_idproof);
                $fileprocess=move_uploaded_file($_FILES['fileToUpload1']['tmp_name'],"../admin/pgdocs/". $pg_registrationdocs);
                
                        if($fileprocess)
                        {
                            echo "<script>alert('Account Created!');</script>";
                            header("location:login.php");
                        }
            }
        }
        else
        {
            echo "<script>alert('Password and Confirm Passowrd Must be Same');</script>";
            
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
    include('./usertheme/navbar-visitor.php');
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

              <h3>Registration - PG Owner</h3>
              <div class="col-md-6 col-sm-6 register-form">

                  <form method="post" id="pgform" enctype="multipart/form-data">

                  Owner Name: <input type="text" name="owner_name" class="form-control required" onkeyup="Validatestring(this)" placeholder="Owner Name">
                  PG Name: <input type="text" name="pg_name" class="form-control required" onkeyup="Validatestring(this)" placeholder="PG Name">
                  PG Email: <input type="email" name="email" class="form-control required"  placeholder="Email">
                  Gender: <input type="radio" name="pgowner_gender" value="male">
                  <label>Male</label>
                  <input type="radio" name="pgowner_gender" value="female">
                  <label>Female</label>
                  
                  <label id="gender-error" class="error" for="pgowner_gender"></label><br>
                  
                  PG For: <input type="radio" name="pg_isgirlsboys" value="girls">
                  <label>Girls</label>
                  <input type="radio" name="pg_isgirlsboys" value="boys">
                  <label>Boys</label>
                  <br><br>
                  Operating Since: <input type="date" class="form-control required" name="pg_operatingsince" onkeyup="Validate(this)" placeholder="Operating since">
                  Monthly Charge: <input type="number" name="pg_monthlycharge" class="form-control" onkeyup="Validate(this)" placeholder="Monthly Charge">
                  Deposit Amount: <input type="number" name="pg_depositamount" class="form-control" onkeyup="Validate(this)" placeholder="Deposit Amount">
                 
                  Password: <input type="password" name="password" id="password" class="form-control required"  placeholder="Password">
                  Repeat Password: <input type="password" name="repeat_password" class="form-control required"  placeholder="Repeat Password">
                  Owner Date Of Birth: <input type="date" name="dob" class="form-control required" onkeyup="Validate(this) placeholder=" Date Of Birth">
                  Contact Number: <input type="number" name="contact_number" class="form-control" onkeyup="Validate(this) placeholder=" Contact Number">
                  ID Proof: <input type="file" name="fileToUpload" class="form-control required" accept="image/*" onkeyup="Validate(this)" id="fileToUpload">
                  Registration Documents: <input type="file" name="fileToUpload1" class="form-control required" accept="image/*" onkeyup="Validate(this)" id="fileToUpload1">
                  PG Address: <textarea name="address" rows="5" cols="60" class="form-control required"></textarea>
                  PG Amenities: <textarea name="amenities" rows="5" cols="60" class="form-control required"></textarea>
              </div>

            </div>
            <div align="center">
              <button type="submit" class="btn btn-primary">Register Now</button>
            </div>

          </div>
          </form>
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
    $("#pgform").validate({
      wrapper: 'div',

      rules: {

        owner_name: {
          required: true,
          minlength: 3
        },

        pg_name: {
          required: true,
          minlength: 3
        },
        password: {
          required: true,
          minlength: 6
        },
        repeat_password: {
          required: true,
          minlength: 6,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true
        },

        contact_number: {
          required: true,
          minlength: 10,
          maxlength: 10
        },
        pgowner_gender: "required",
        pg_isgirlsboys: "required",
        pg_operatingsince: "required",
        pg_monthlycharge: "required",
        pg_depositamount: "required",
        agree: "required",
        message: "required",
        file: "required"
      },

      dob: {
        required: "Please select your Date of Birth"
      },
      messages: {

        owner_name: {
          required: "Please Enter Owner Name",
          minlength: "Your name must consist of at least 3 characters"
        },
        pg_name: {
          required: "Please Enter PG Name",
          minlength: "Your name must consist of at least 3 characters"
        },
        contact_number: {
          required: "Please Enter Your Mobile no.",
          minlength: "Enter Your 10 digit Mobile no. only",
          maxlength: "Enter Your 10 digit Mobile no. only",
        },


        address: {
          required: "Please Enter Your Address",

        },
        
        amenities: {
          required: "Please Enter PG amenities",

        },

        password: {
          required: "Please Enter Password",
          minlength: "Your password must be at least 6 characters long"
        },
        repeat_password: {
          required: "Please Confirm Password",
          minlength: "Your password must be at least 6 characters long",
          equalTo: "Please enter the same password as above"
        },
        email: "Please enter a valid email address",

        pgowner_gender: "Please Select Gender",
        pg_isgirlsboys: "Please Select if the PG is for girls or boys"
        pg_operatingsince: "Please Enter the date",
        pg_monthlycharge: "Please enter the monthly charge",
        pg_depositamount: "Please enter the deposit amount",
        fileToUpload: "Please Select ID Proof",
        fileToUpload1: "Please Select Registration ",

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