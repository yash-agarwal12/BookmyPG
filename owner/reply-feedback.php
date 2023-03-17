<?php
      require ('./class/dbconnect.php');
      $editid= $_GET['eid'];
      if(!isset($_GET['eid']) || empty($_GET['eid']) )
      {
          header("location: display-feedback.php");
      }
      $selectq=mysqli_query($connection, "select * from tbl_feedback where feedback_id='{$editid}'") or die(mysqli_error($connection));
      $selectrow= mysqli_fetch_array($selectq);
      $msg="";
      if($_POST)
      {
          $user_id=$_POST['user_id'];
          $feedback_date=mysqli_real_escape_string($connection,$_POST['feedback_date']);
          $feedback_details=mysqli_real_escape_string($connection,$_POST['feedback_details']);
          $feedback_reply=mysqli_real_escape_string($connection,$_POST['feedback_reply']);
          
          $query=mysqli_query($connection, "update tbl_feedback set feedback_reply='{$feedback_reply}' where feedback_id='{$feedback_id}' ") or die(mysqli_error($connection));
          
          if($query)
          {
             echo "<script>alert('Record Updated') ;window.location='display-feedback.php';</script>";
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
    include('./pgownertheme/top-menu.php');
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
    <?php
    include('./pgownertheme/sidebar.php');
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
                 
                    
                  <h4 class="card-title">Feedback Reply</h4>
                  <form class="form-sample" method="post" enctype="multipart/form-data">
                    <p class="card-description">
                      Details
                    </p>
                    <div class="row">
                        <input type="hidden" name="feedback_id" value="<?php echo $selectrow['feedback_id'] ?>">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">User Id</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['user_id'] ?>" name="user_id" placeholder="User ID" required readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Feedback Date</label>
                          <div class="col-sm-9">
                            <input type="date" class="form-control" value="<?php echo $selectrow['feedback_date'] ?>" name="feedback_date" placeholder="Feedback Date" required readonly/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Feedback Details</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['feedback_details'] ?>" name="feedback_details" placeholder="Feedback Details" required readonly/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Feedback Reply</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['feedback_reply'] ?>" name="feedback_reply" placeholder="Feedback Reply" required />
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <div>
                        <button type='submit' class="btn btn-primary mr-2">Submit</button>
                        <button type="submit" class="btn btn-info mr-2" onclick="window.location='display-feedback.php';">View</button>
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
        include('./pgownertheme/footer.php');
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
