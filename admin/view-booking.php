<?php
      require ('./class/dbconnect.php');
      $editid= $_GET['eid'];
      if(!isset($_GET['eid']) || empty($_GET['eid']) )
      {
          header("location: display-booking.php");
      }
      $selectq=mysqli_query($connection, "SELECT *
FROM
    `tbl_pg_master`
    INNER JOIN `tbl_booking` 
        ON (`tbl_pg_master`.`pg_id` = `tbl_booking`.`pg_id`)
    INNER JOIN `tbl_user_master` 
        ON (`tbl_user_master`.`user_id` = `tbl_booking`.`user_id`)
        where booking_id='{$editid}'") or die(mysqli_error($connection));
      $selectrow= mysqli_fetch_array($selectq);
      $msg="";
      if($_POST)
      {
          $booking_id=$_POST['booking_id'];
          $pg_name=mysqli_real_escape_string($connection,$_POST['pg_name']);
          $booking_desc=mysqli_real_escape_string($connection,$_POST['booking_desc']);
          $user_fname=mysqli_real_escape_string($connection,$_POST['user_fname']);
          $booking_date=mysqli_real_escape_string($connection,$_POST['booking_date']);
          $booking_startdate=mysqli_real_escape_string($connection,$_POST['booking_startdate']);
          $booking_chargeamount=mysqli_real_escape_string($connection,$_POST['booking_chargeamount']);
          $booking_status=mysqli_real_escape_string($connection,$_POST['booking_status']);
          $user_idproof=mysqli_real_escape_string($connection,$_POST['user_idproof']);
        
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
                 
                    
                  <h4 class="card-title">View Booking Details</h4>
                  <form class="form-sample" method="post" enctype="multipart/form-data">
                    <p class="card-description">
                      Booking Details
                    </p>
                    <div class="row">
                        <input type="hidden" name="booking_id" value="<?php echo $selectrow['booking_id'] ?>">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PG Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_name'] ?>" name="pg_name" readonly required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Booking Description</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['booking_desc'] ?>" name="booking_desc" readonly required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_fname'] ?>" name="user_fname" readonly required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Booking Date</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['booking_date'] ?>" name="booking_date" readonly required/>
                          </div>
                        </div>
                         </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Booking Start Date</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['booking_startdate'] ?>" name="booking_startdate" readonly required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Booking Charge Amount</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['booking_chargeamount'] ?>" name="booking_chargeamount" readonly required/>
                          </div>
                        </div>
                         </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Booking Status</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['booking_status'] ?>" name="booking_status" readonly required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User ID Proof</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_idproof'] ?>" name="user_idproof" readonly  required/>
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
