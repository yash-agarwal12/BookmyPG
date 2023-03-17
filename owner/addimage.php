<?php
session_start();
      require ('./class/dbconnect.php');
      $msg="";
 
      if(!isset($_SESSION['pg_id'])){
          header("location:login.php");
      }
      
      if(isset($_POST['submit']))
      {
          $filename = $_FILES['imagepath']['name'];
          $filepath = $_FILES['imagepath']['tmp_name'];
          $pgid = $_SESSION['pg_id'];
          
          
          $query=mysqli_query($connection, "insert into tbl_pgimages(pg_id,pgimage_path) values('{$pgid}','{$filename}')") or die(mysqli_errror($connection));
          
          if($query)
          {
              move_uploaded_file($filepath, "uploads/".$filename);
              $msg='<div class="alert alert-success" role="alert">
                 Record Inserted!
                 </div>';
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
                 
                    
                  <h4 class="card-title">Add Image</h4>
                  <form class="form-sample" id="addarea" method="post" enctype="multipart/form-data">
                    <p class="card-description">
                      
                    </p>
                    
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Image</label>
                          <div class="col-sm-9">
                            <input type="file" class="form-control required" name="imagepath" onkeyup="Validatestring(this)" placeholder="Enter the image" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    <div>
                        <button type='submit'name="submit" class="btn btn-primary mr-2">Submit</button>
                        <button type="submit" class="btn btn-info mr-2" onclick="window.location='display-pgimages.php';">View</button>
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
  <script src="jquery-3.1.1.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
<script>
         // validate signup form on keyup and submit
		$("#addarea").validate({
                    wrapper:'div',
            
			rules: {
				area_name: {
					required: true,
                                        minlength:3,
				},
                                area_cityname: {
					required: true,
                                        minlength:3,
				},
                        },
			messages: {
				
				area_name: {
                                    required: "Please enter a valid area name",
                                minlength:"Area name should be more than 2 character"
				 },
                                 area_cityname: {
                                    required: "Please enter a valid city name",
                                minlength:"City name should be more than 2 character"
				 },
	
			}
		}); 
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
