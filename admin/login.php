
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BookMyPG Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="myimages/logo3.png" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form method="post" id="login" class="pt-3" >
                <div class="form-group">
                  <input type="email" name="user_email" class="form-control required"   placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="user_password" class="form-control  required" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button href="home_admin.php" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="forgotpass.php" class="auth-link text-black">Forgot password?</a>
                </div>
                
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <?php
        include('./admintheme/footer.php');
        ?>
  <?php
  session_start();
  require './class/dbconnect.php';
        if($_POST)
        {
            $user_email=$_POST['user_email'];
            $user_password=$_POST['user_password'];
            
            $selectquery=mysqli_query($connection, "select * from tbl_user_master where user_email='{$user_email}' and user_password='{$user_password}' and is_admin=1") or die(mysqli_error($connection));
            $count = mysqli_num_rows($selectquery);
            $row=mysqli_fetch_array($selectquery);
            if($count>0)
            {
             $_SESSION['user_id'] = $row['user_id'];
             $_SESSION['user_fname'] = $row['user_fname'];
             
             header("location:home_admin.php");
             
            }else{
                echo "<script>alert('Email and Password not Match. ')</script>";
            }
        }
        
   ?>
  
<script src="jquery-3.1.1.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script>
         // validate signup form on keyup and submit
		$("#login").validate({
                    wrapper:'div',
            
			rules: {
				user_email: {
					required: true,
                                        email: true
				},           

				user_password: {
					required: true,
					
				},
				
                        },
                        
                       
			messages: {
				
				user_email: {
                                    required: "Please eneter the username",
                                    email: "Please enter a valid email address"
                                },

				user_password: {
					required: "Please enter the password",
					equalTo: "incorrect password"
				},
	
			}
		});


        function Validate(no) {
                   no.value = no.value.replace(/[^ 0-9\\a-z\A-Z\n\r]+/g, '');
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

</html>
