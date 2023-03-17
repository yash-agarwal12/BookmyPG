<?php
      require ('./class/dbconnect.php');
      $editid= $_GET['eid'];
      if(!isset($_GET['eid']) || empty($_GET['eid']) )
      {
          header("location: display-user_master.php");
      }
      $selectq=mysqli_query($connection, "select * from tbl_user_master where user_id='{$editid}'") or die(mysqli_error($connection));
      $selectrow= mysqli_fetch_array($selectq);
      $msg="";
      if($_POST)
      {
          $user_id=$_POST['user_id'];
          $user_fname=mysqli_real_escape_string($connection,$_POST['user_fname']);
            $user_lname=mysqli_real_escape_string($connection,$_POST['user_lname']);
          $user_gender=mysqli_real_escape_string($connection,$_POST['user_gender']);
          $user_email=mysqli_real_escape_string($connection,$_POST['user_email']);
          $user_password=mysqli_real_escape_string($connection,$_POST['user_password']);
          $user_phonenumber=mysqli_real_escape_string($connection,$_POST['user_phonenumber']);
          $user_photo=mysqli_real_escape_string($connection,$_POST['user_photo']);
          $user_address=mysqli_real_escape_string($connection,$_POST['user_address']);
          $user_dob=mysqli_real_escape_string($connection,$_POST['user_dob']);
         
     
      }
?>


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
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    
  <div class="container-scroller">
   <?php 
    include('./admintheme/top-menu.php');
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
    <?php
    include('./admintheme/sidebar.php');
    ?>
    <div class="container-fluid page-body-wrapper full-page-wrapper">
           
        <div class="content-wrapper align-items-center">
              <?php
                     echo $msg;
                  ?>
          <div class="row w-100 mx-0">
         
         
            <div class="col-6 grid-margin" align="center">
              <div class="card">
                <div class="card-body">
                 
                    
                  <h4 class="card-title">View User Details</h4>
                  <form class="form-sample" method="post" enctype="multipart/form-data">
                    <p class="card-description">
                      User Details
                    </p>
                    <div class="row">
                        <input type="hidden" name="user_id" value="<?php echo $selectrow['user_id'] ?>">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_fname'] ?>" name="user_fname" readonly placeholder="Enter user first name" required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Last Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_lname'] ?>" name="user_lname" readonly placeholder="Enter user last name" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_gender'] ?>" name="user_gender" readonly placeholder="Enter Gender" required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_email'] ?>" name="user_email" readonly placeholder="Enter Email Id" required/>
                          </div>
                        </div>
                         </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_password'] ?>" name="user_password" readonly placeholder="Update Password" required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_phonenumber'] ?>" name="user_phonenumber" readonly placeholder="Update Phone Number" required/>
                          </div>
                        </div>
                         </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Photo</label>
                          <div class="col-sm-9">
                        
                            <?php echo "<td><img src='../user/upload/{$selectrow['user_photo']}' style='width:200px;height:200px'</td>"; ?>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_address'] ?>" name="user_address" readonly placeholder="Update Address" required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_dob'] ?>" name="user_dob" readonly placeholder="Enter Date of Birth" required/>
                          </div>
                        </div>
                      </div>
                         
                    </div>
                  
                    
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        
      </div>
    </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
        include('./admintheme/footer.php');
        ?>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
