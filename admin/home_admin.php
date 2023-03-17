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
        <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="css/vertical-layout-light/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="images/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <?php
            session_start();
            echo "Hi " . $_SESSION['user_fname'];

            if (!isset($_SESSION['user_id'])) {
                header("location:login.php");
            }

            echo "<a href='logout.php'>Logout</a>";
            ?>
            <!-- partial:partials/_navbar.html -->
            <?php
            include('./admintheme/top-menu.php');
            ?>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_settings-panel.html -->
                <?php
                include('./admintheme/sidebar.php');
                ?>  
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="row">
                                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                        <h3 class="font-weight-bold"><?php echo "Hi " . $_SESSION['user_fname']; ?></h3>
                                        <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <div class="justify-content-end d-flex">
                                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                                <i class="mdi mdi-calendar"></i> 
                                                <?php
                                                echo date("d/m/Y");
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card tale-bg">
                                    <div class="card-people mt-auto">
                                        <img src="myimages/adminimag.png" alt="people">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 grid-margin transparent">
                                <br>
                                <br>


                                <div class="row">

                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-tale">
                                            <div class="card-body">
                                                <p class="mb-4">Total Bookings</p>
                                                <p class="fs-30 mb-2"> 
                                                    <?php
                                                    $q = mysqli_query($connection, "SELECT
                    COUNT(`pg_id`)
                FROM
                    `tbl_pg_master`") or die(mysqli_error($connection));
                                                    $data = mysqli_fetch_array($q);
                                                    echo $data[0];
                                                    ?>
                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-dark-blue">
                                            <div class="card-body">
                                                    <p class="mb-4">Total Feedback</p>
                                                    <p class="fs-30 mb-2">
                                                         <?php
                                                    $q = mysqli_query($connection, "SELECT
    COUNT(`feedback_id`)
FROM
    `tbl_feedback`;") or die(mysqli_error($connection));
                                                    $data = mysqli_fetch_array($q);
                                                    echo $data[0];
                                                    ?>
                                                        
                                                    </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-6 mb-4  stretch-card transparent">
                                        <div class="card card-light-blue">
                                            <div class="card-body">
                                                <p class="mb-4">Total PG</p>
                                                <p class="fs-30 mb-2">
                                                    
                                                      <?php
                                                    $q = mysqli_query($connection, "SELECT
    COUNT(`pg_id`)
FROM
    `tbl_pg_master`;") or die(mysqli_error($connection));
                                                    $data = mysqli_fetch_array($q);
                                                    echo $data[0];
                                                    ?>  
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 stretch-card transparent">
                                        <div class="card card-light-danger">
                                            <div class="card-body">
                                                <p class="mb-4">Total Users</p>
                                                <p class="fs-30 mb-2">
                                                    
                                                     <?php
                                                    $q = mysqli_query($connection, "SELECT
    COUNT(`booking_id`)
FROM
    `tbl_booking`;  ") or die(mysqli_error($connection));
                                                    $data = mysqli_fetch_array($q);
                                                    echo $data[0];
                                                    ?>  
                                                </p>

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
        <script src="vendors/chart.js/Chart.min.js"></script>
        <script src="vendors/datatables.net/jquery.dataTables.js"></script>
        <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
        <script src="js/dataTables.select.min.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="js/off-canvas.js"></script>
        <script src="js/hoverable-collapse.js"></script>
        <script src="js/template.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="js/dashboard.js"></script>
        <script src="js/Chart.roundedBarCharts.js"></script>
        <!-- End custom js for this page-->
    </body>

</html>


