
<?php
    require './class/dbconnect.php';
   
    if($_POST)
   {
        
        $user_fname=mysqli_real_escape_string($connection, $_POST['first_name']);
        $user_lname=mysqli_real_escape_string($connection, $_POST['last_name']);
        $user_email=mysqli_real_escape_string($connection, $_POST['email']);
        $user_gender=mysqli_real_escape_string($connection, $_POST['gender']);
        $user_phonenumber=mysqli_real_escape_string($connection, $_POST['phonenumber']);
        $user_password=mysqli_real_escape_string($connection, $_POST['user_password']);
        $user_repeatpassword=mysqli_real_escape_string($connection, $_POST['repeat_password']);
        $user_dob=mysqli_real_escape_string($connection, $_POST['dob']);
        $user_address=mysqli_real_escape_string($connection, $_POST['address']);
        $user_photo="upload/".$_FILES['fileToUpload']['name'];
        
        if($user_password == $user_repeatpassword)
        {
            $insertquery=mysqli_query($connection,"insert into tbl_user_master(user_fname,user_lname,user_email,user_gender,user_phonenumber,user_password,user_dob,user_address,user_photo) values('{$user_fname}','{$user_lname}','{$user_email}','{$user_gender}','{$user_phonenumber}','{$user_password}','{$user_dob}','{$user_address}','{$user_photo}')") or die(mysqli_error($connection));
          
            
            if ($insertquery)
            {
                $fileprocess=move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $user_photo);
                
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

              <h3>User Registration</h3>


              <div class="col-md-6 col-sm-6 register-form">

                <form method="post" enctype="multipart/form-data" id="userform">

                  First Name: <input type="text" name="first_name" class="form-control required" onkeyup="Validate(this)" placeholder="First Name">
                  Last Name: <input type="text" name="last_name" class="form-control required" onkeyup="Validatestring(this)" placeholder="Last Name">
                  Email: <input type="email" name="email" class="form-control required"  placeholder="Email">
                  Phone Number:<input type="text" name="phonenumber" class="form-control required" onkeyup="Validate(this)" placeholder="Phone Number">
                  Gender:  Male <input type="radio" name="gender" value="male"> Female <input type="radio" name="gender" value="female"> Others <input type="radio" name="gender" value="others">
                  <br><label id="gender-error" class="error" for="gender" style=""></label>
                  <br>
                  <br>
                  Password: <input type="password" id="user_password" name="user_password" class="form-control required"  placeholder="Password">
                  Repeat Password: <input type="password" name="repeat_password" class="form-control required" placeholder="Repeat Password">
                  Date Of Birth: <input type="date" class="form-control required" name="dob" onkeyup="Validate(this)" placeholder="Date Of Birth">
                  Photo: <input type="file" name="fileToUpload" class="form-control required" accept="image/*" onkeyup="Validate(this)" id="fileToUpload">
                  Address: <textarea name="address" rows="5" cols="60" class="form-control required"></textarea>
              

            
            <div align="center">
              <button type="submit" name="submitbtn" class="btn btn-primary">Register Now</button>
            </div>

          </div>
          </form>
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
    $("#userform").validate({
      wrapper: 'div',

      rules: {

        first_name: {
          required: true,
          minlength: 3
        },

        last_name: {
          required: true,
          minlength: 3
        },
        user_password: {
          required: true,
          minlength: 6
        },
        repeat_password: {
          required: true,
          minlength: 6,
          equalTo:"#user_password"
        },
        email: {
          required: true,
          email: true
        },

        phonenumber: {
          required: true,
          minlength: 10,
          maxlength: 10
        },
        gender: "required",
        agree: "required",
        message: "required",
        file: "required"
      },

      dob: {
        required: "Please select your Date of Birth"
      },
      messages: {

        first_name: {
          required: "Please Enter First Name",
          minlength: "Your name must consist of at least 3 characters"
        },
        last_name: {
          required: "Please Enter Last Name",
          minlength: "Your name must consist of at least 3 characters"
        },
        phonenumber: {
          required: "Please Enter Your Mobile no.",
          minlength: "Enter Your 10 digit Mobile no. only",
          maxlength: "Enter Your 10 digit Mobile no. only",
        },


        address: {
          required: "Please Enter Your Address",

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

        gender: "Please Select Gender",
        fileToUpload: "Please Select Image",


      }
    });


    function Validate(no) {
      no.value = no.value.replace(/[^ a-z A-Z\ 0-9\n\r]+/g, '');
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