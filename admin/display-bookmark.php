<?php
require './class/dbconnect.php';
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
    include('./admintheme/top-menu.php');
    ?>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
    <?php
    include('./admintheme/sidebar.php');
    ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
              
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bookmark Table</h4> 
                  <div class="table-responsive pt-3">
                      <table class="table table-bordered" id="mytable">
                      <thead>
                        <tr>
                            <th style="font-size:20px">
                                    Bookmark Id</h3>
                          </th>
                          <th style="font-size:20px">
                                PG Name
                          </th>
                          <th style="font-size:20px">
                                User Name
                          </th>
                       
                        </tr>
                      </thead>
                     
                      <tbody class="table-info">
                           <?php
                           $msg="";
                          if(isset($_GET['did']))
                          {
                              $did=$_GET['did'];
                              $deleteq=mysqli_query($connection,"delete from tbl_bookmark where bookmark_id='{$did}'") or die(mysqli_error($connection));
                              if($deleteq)
                              {
                                  $msg='<div class="alert alert-success" role="alert">
                                        Record Deleted!
                                            </div>';
                                  echo $msg;
                              }
                          }
                      $selectq=mysqli_query($connection,"SELECT *
FROM
    `tbl_pg_master`
    INNER JOIN `tbl_bookmark` 
        ON (`tbl_pg_master`.`pg_id` = `tbl_bookmark`.`pg_id`)
    INNER JOIN `tbl_user_master` 
        ON (`tbl_user_master`.`user_id` = `tbl_bookmark`.`user_id`);")or die(mysqli_error($connection));
                    
                          while($arearow = mysqli_fetch_array($selectq))
                          {
                           
                              echo "<tr>";
                              
                              echo "<td>{$arearow['bookmark_id']}</td> ";
                              echo "<td>{$arearow['pg_name']}</td>";
                              echo "<td>{$arearow['user_fname']}</td>";
                             
                              echo "</tr>";
                             
                          }
                      
                            ?>
                         
                       
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
        include('./admintheme/footer.php');
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
  
  
  <script src="tools/jquery-3.5.1.js" type="text/javascript"></script>
  <link href="tools/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
  <script src="tools/jquery.dataTables.min.js" type="text/javascript"></script>
  <script>
  $(document).ready(function () {
    $('#mytable').DataTable();
} );
  </script>
</body>

</html>


