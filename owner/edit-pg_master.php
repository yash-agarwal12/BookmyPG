<?php
      require ('./class/dbconnect.php');
      $editid= $_GET['eid'];
      if(!isset($_GET['eid']) || empty($_GET['eid']) )
      {
          header("location: view-pg_master.php");
      }
      $selectq=mysqli_query($connection, "SELECT *
FROM
    `tbl_pg_category`
    INNER JOIN `tbl_pg_master` 
        ON (`tbl_pg_category`.`category_id` = `tbl_pg_master`.`category_id`)
    INNER JOIN `tbl_area` 
        ON (`tbl_area`.`area_id` = `tbl_pg_master`.`area_id`) where pg_id='{$editid}'") or die(mysqli_error($connection));
      $selectrow= mysqli_fetch_array($selectq);
      $msg="";
      if($_POST)
      {
          $pg_id=$_POST['pg_id'];
          $pg_ownername=mysqli_real_escape_string($connection,$_POST['pg_ownername']);
          $pg_name=mysqli_real_escape_string($connection,$_POST['pg_name']);
          $category_name=mysqli_real_escape_string($connection,$_POST['category_name']);
          $pg_email=mysqli_real_escape_string($connection,$_POST['pg_email']);
          $pgowner_gender=mysqli_real_escape_string($connection,$_POST['pgowner_gender']);
          $pg_password=mysqli_real_escape_string($connection,$_POST['pg_password']);
          $pg_phonenumber=mysqli_real_escape_string($connection,$_POST['pg_phonenumber']);
          #$pgimage_id=mysqli_real_escape_string($connection,$_POST['pgimage_id']);
          $pg_address=mysqli_real_escape_string($connection,$_POST['pg_address']);
          $pg_registrationdocs=mysqli_real_escape_string($connection,$_POST['pg_registrationdocs']);
          $pgowner_dob=mysqli_real_escape_string($connection,$_POST['pgowner_dob']);
           $area_name=mysqli_real_escape_string($connection,$_POST['area_name']);
          $pg_depositamount=mysqli_real_escape_string($connection,$_POST['pg_depositamount']);
          $pg_monthlycharge=mysqli_real_escape_string($connection,$_POST['pg_monthlycharge']);
          $pg_isgirlsboys=mysqli_real_escape_string($connection,$_POST['pg_isgirlsboys']);
          $pg_operatingsince=mysqli_real_escape_string($connection,$_POST['pg_operatingsince']);
          $pg_idproof=mysqli_real_escape_string($connection,$_POST['pg_idproof']);
          $pg_sharing=mysqli_real_escape_string($connection,$_POST['pg_sharing']);
           $pg_isverified=mysqli_real_escape_string($connection,$_POST['pg_isverified']);
          $pg_amenities=mysqli_real_escape_string($connection,$_POST['pg_amenities']);

          
          $query=mysqli_query($connection, "update tbl_pg_master set pg_ownername='{$pg_ownername}',pg_name='{$pg_name}',category_name='{$category_name}',pg_email='{$pg_email}',pgowner_gender='{$pgowner_gender}',pg_password='{$pg_password}',pg_phonenumber='{$pg_phonenumber}',pg_address='{$pg_address}',pg_registrationdocs='{$pg_registrationdocs}',pgowner_dob='{$pgowner_dob}',area_name='{$area_name}',pg_depositamount='{$pg_depositamount}',pg_monthlycharge='{$pg_monthlycharge}',pg_isgirlsboys='{$pg_isgirlsboys}',pg_operatingsince='{$pg_operatingsince}',pg_idproof='{$pg_idproof}',pg_sharing='{$pg_sharing}',pg_isverified='{$pg_isverified}',pg_amenities='{$pg_amenities}' where pg_id='{$pg_id}' ") or die(mysqli_error($connection));

          if($query)
          {
             echo "<script>alert('Record Updated') ;window.location='view-pg_master.php';</script>";
          }
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
                 
                    
                  <h4 class="card-title">View PG Master Details</h4>
                  <form class="form-sample" method="post" enctype="multipart/form-data">
                    <p class="card-description">
                      PG Details
                    </p>
                    <div class="row">
                        <input type="hidden" name="pg_id" value="<?php echo $selectrow['pg_id'] ?>">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PG Owner Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_ownername'] ?>" name="pg_ownername"  required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Category </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['category_name'] ?>" name="category_name"   required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PG Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_name'] ?>" name="pg_name"  required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_email'] ?>" name="pg_email"   required/>
                          </div>
                        </div>
                         </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PG Owner Gender</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pgowner_gender'] ?>" name="pgowner_gender"   required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_password'] ?>" name="pg_password"  required/>
                          </div>
                        </div>
                         </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Phone Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_phonenumber'] ?>" name="pg_phonenumber" required/>
                          </div>
                        </div>
                      </div>
                         
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_address'] ?>" name="pg_address"  required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Registration Documents</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_registrationdocs'] ?>" name="pg_registrationdocs"  required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PG Owner Date of Birth</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pgowner_dob'] ?>" name="pgowner_dob"   required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Area Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['area_name'] ?>" name="area_name"   required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PG Deposit Amount</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_depositamount'] ?>" name="pg_depositamount"   required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PG Monthly Charge</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_monthlycharge'] ?>" name="pg_monthlycharge"   required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Girls/Boys PG</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_isgirlsboys'] ?>" name="pg_isgirlsboys"  required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Operating Since</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_operatingsince'] ?>" name="pg_operatingsince"   required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">PG Owner Idproof</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_idproof'] ?>" name="pg_idproof"   required/>
                          </div>
                        </div>
                      </div>
                       
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sharing</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_sharing'] ?>" name="pg_sharing"   required/>
                          </div>
                        </div>
                      </div>
                        <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Verified</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_isverified'] ?>" name="pg_isverified"   required/>
                          </div>
                        </div>
                      </div>
                         <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Amenities</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" value="<?php echo $selectrow['pg_amenities'] ?>" name="pg_amenities"   required/>
                          </div>
                        </div>
                      </div>
                    </div>
                  <div>
                        <button type='submit' class="btn btn-primary mr-2">Update</button>
                        <button type="submit" class="btn btn-info mr-2" onclick="window.location='view-pg_master.php';">View</button>
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
