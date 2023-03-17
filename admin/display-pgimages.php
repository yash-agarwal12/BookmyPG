<?php 
session_start();
include './class/dbconnect.php';
?>
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
                    <h4 class="card-title">PG Images Table</h4> 
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered" id="mytable">
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
                         
                    
                        </tr>
                      </thead>
                     
                      <tbody class="table-info">
                           <?php
                           $msg="";
                         
                      $selectq=mysqli_query($connection,"SELECT
    `tbl_pgimages`.`pgimage_id`
    , `tbl_pg_master`.`pg_name`
    , `tbl_pgimages`.`pgimage_path`
FROM
    `tbl_pg_master`
    INNER JOIN `tbl_pgimages` 
        ON (`tbl_pg_master`.`pg_id` = `tbl_pgimages`.`pg_id`)
ORDER BY `tbl_pg_master`.`pg_name` ASC;")or die(mysqli_error($connection));
                      
                          while($arearow = mysqli_fetch_array($selectq))
                          {
                           
                              echo "<tr>";
                              
                              echo "<td>{$arearow['pgimage_id']}</td> ";
                              echo "<td>{$arearow['pg_name']}</td>";   
                             echo "<td><img src='myimages/{$arearow['pgimage_path']}' style='width:200px;height:200px;'/></td>";
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


