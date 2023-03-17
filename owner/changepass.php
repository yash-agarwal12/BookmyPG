<?php
require './class/dbconnect.php';
if(!isset($_SESSION['pg_id'])){
    //header("location:login.php");
}
session_start();
    if($_POST)
    {
        $pg_password1=$_POST["pg_password"];
        $newpassword=$_POST["newpassword"];
        $confirmnewpassword=$_POST["confirmnewpassword"];
        $pg_id=$_SESSION["pg_id"];
        
        $oqr=mysqli_query($connection,"select pg_password from tbl_pg_master where pg_id='{$pg_id}'") or die(mysqli_error($connection));
        
        $odata=mysqli_fetch_row($oqr);
        echo $olddata = $odata[0];
        if($olddata== $pg_password1)
        {
            if($newpassword==$confirmnewpassword)
            {
                $q=mysqli_query($connection,"update tbl_pg_master set pg_password='{$newpassword}' where pg_id='{$pg_id}'") or die(mysql_error($connection));
                if($q)
                {
                    echo "<script>alert('Password has been changed.'); window.location='home_pgowner.php';</script>";
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


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BookMyPG PGOwner</title>
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
              <h4>Change Password</h4>
              
              <form method="post" id="change" class="pt-3" >
                <div class="form-group">
                  <input type="password" name="pg_password" class="form-control  required" placeholder="Enter Existing Password">
                </div>
                  <div class="form-group">
                  <input type="password" name="newpassword" id="newpassword" class="form-control  required" placeholder="Enter New Password">
                </div>
                  <div class="form-group">
                  <input type="password" name="confirmnewpassword" class="form-control  required" placeholder="Confirm New Password">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Change Password</button>
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
  
<script src="jquery-3.1.1.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script>
         // validate signup form on keyup and submit
		$("#change").validate({
                    wrapper:'div',
            
			rules: {
				pg_password: {
					required: true
				},
                                newpassword: {
					required: true,
                                        minlength: 6,
				},
                                confirmnewpassword: {
					required: true,
                                        minlength: 6,
					equalTo: "#newpassword"
				}
				
                        },
                        
                       
			messages: {
				
				
				pg_password: {
					required: "Please enter a valid Password",
					
				},
                                newpassword: {
					required: "Please enter a valid Password",
					
				},
                                confirmnewpassword: {
					required: "Please enter a valid Password",
					equalTo: "Enter Same Password as Above"
				}
	
			}
		});


        function Validate(no) {
                   no.value = no.value.replace(/[^ 0-9\\a-z\A-Z\n\r]+/g, '');
               }
               
              

              
      
     </script>
<style>
    .error{
        color:red;
    }
</style>
</body>

</html>
