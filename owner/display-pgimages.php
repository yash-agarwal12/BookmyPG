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
          $pgimageid= $_SESSION['pgimage_id'];
          $pgimage_path= $_SESSION['pgimage_path'];
          
          
          $query=mysqli_query($connection, "select * from tbl_pgimages(pgimage_id,pg_id,pgimage_path)") or die(mysqli_errror($connection));
          
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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->

    <!-- partial -->
    <?php 
    include('./pgownertheme/top-menu.php');
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
    <?php
    include('./pgownertheme/sidebar.php');
    ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
              
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">PG Images Table</h4> 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                            <th style="font-size:20px">
                                    PG Image Id</h3>
                          </th>
                          <th style="font-size:20px">
                                PG Name
                          </th>
                          <th style="font-size:20px">
                                PG Image
                          </th>
                          <th style="font-size:20px">
                            Action
                          </th>
                    
                        </tr>
                      </thead>
                     
                      <tbody class="table-info">
                           <?php
                           $msg="";
                          if(isset($_GET['did']))
                          {
                              $did=$_GET['did'];
                              $deleteq=mysqli_query($connection,"delete from tbl_pgimages where pgimage_id='{$did}'") or die(mysqli_error($connection));
                              if($deleteq)
                              {
                                  $msg='<div class="alert alert-success" role="alert">
                                        Record Deleted!
                                            </div>';
                                  echo $msg;
                              }
                          }
                          
                      $selectq=mysqli_query($connection,"select * from tbl_pgimages where pg_id ='{$_SESSION['pg_id']}' ")or die(mysqli_error($connection));
                          
                          
                          while($arearow = mysqli_fetch_array($selectq))
                          {
                           
                              echo "<tr>";
                              
                              echo "<td>{$arearow['pgimage_id']}</td> ";
                              echo "<td>{$arearow['pg_id']}</td>";
                              echo "<td><img src='uploads/{$arearow['pgimage_path']}' style='width:200px;height:200px;'/></td>";
                              echo "<td> <a href='edit-pgimages.php?eid={$arearow['pgimage_id']}'><img src='myimages/edit.png'>"
                              . "</a> | <a href='display-pgimages.php?did={$arearow['pgimage_id']}'><img src='myimages/delete.png'></a>";
                              
                              echo "</tr>";
                             
                          }
                      
                            ?>
                        <tr class="table-info">
                          
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
              
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php
        include('./pgownertheme/footer.php');
        ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
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
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>


