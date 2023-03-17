
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
  <?php
  use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  require './class/dbconnect.php';
  
  if($_POST)
  {
      
      $user_email=$_POST['user_email'];
      $selectquery=mysqli_query($connection,"select * from tbl_user_master where user_email='{$user_email}'") or die (mysqli_error($connection));
      $count=mysqli_num_rows($selectquery);
      
     
      $row=mysqli_fetch_array($selectquery);
      if($count>0)
      {
          //echo $row['user_password'];
          
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bookmypg486@gmail.com';                     //SMTP username
    $mail->Password   = 'bookmypg123';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('bookmypg486@gmail.com', 'BookMyPG');
    $mail->addAddress($user_email, '$user_email');     //Add a recipient
  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Forgot Password';
    $mail->Body    = "Hi $user_email your Password is {$row['user_password']}";
    $mail->AltBody = "Hi $user_email your Password is {$row['user_password']}";

    $mail->send();
     echo "<script>alert('Password has been sent to your Email-ID');</script>";
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
      }
      else
      {
          echo "<script>alert('Email not found');</script>";
      }
  }
  ?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="myimages/logo3.png" alt="logo">
              </div>
              <h4>You forgot your password?</h4>
              <h6 class="font-weight-light">Here you can easily retrieve your password.</h6>
              <form  method="post" id="forgotpass" class="pt-3">
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg required" name="user_email" placeholder="Email">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Request New Password</button>
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
		$("#forgotpass").validate({
                    wrapper:'div',
            
			rules: {
				email: {
					required: true,
                                        email: true
				},           

				
				
                        },
                        
                       
			messages: {
				
				

				email: {
					required: "Please enter an email address",
					email: "Please enter a valid email"
				},
	
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
