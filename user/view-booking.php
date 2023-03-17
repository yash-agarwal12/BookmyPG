<?php
session_start();
    require './class/dbconnect.php';

    ?>

<!DOCTYPE HTML>
<html class="no-js">

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/my-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:25 GMT -->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>BookMyPG</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<!-- CSS
  ================================================== -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="plugins/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="plugins/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
<!-- Color Style -->
<link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
<link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
<!-- SCRIPTS
  ================================================== -->
<script src="js/modernizr.js"></script><!-- Modernizr -->
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->
<div class="body">
  <!-- Start Site Header -->
  <?php
       include ('./usertheme/navbar.php');
  ?>
  <!-- End Site Header -->
  <!-- Site Showcase -->
  <div class="site-showcase">
  <!-- Start Page Header -->
  <div class="parallax page-header" style="background-image:url(images/page-header1.jpg);">
  		<div class="container">
        	<div class="row">
            	<div class="col-md-12">
  					<h1>My Bookings</h1>
        		</div>
           </div>
       </div>
  </div>
  <!-- End Page Header -->
  </div>
  <!-- Start Content -->
  <div class="main" role="main">
      <div id="content" class="content full">
        	<div class="container">
          		<div class="page">
        			<div class="row">
              			<div class="col-md-12">
                  		<div class="block-heading" id="details">
                     			
                         		<h4><span class="heading-icon"><i class="fa fa-home"></i></span>Bookings</h4>
                     		</div>
        					<div class="properties-table">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Pg Name</th>
                                        
                                        <th>Booking Description</th>
                                        
                                        <th>User Name</th>
                                        <th>Booking Date</th>
                                        <th>Booking Charge Amount</th>
                                        <th>Booking Status </th>
                                        <th>User Id Proof</th>
                                        <th>Give Feedback</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <?php 
                                        $q = mysqli_query($connection, "SELECT *
FROM
    `tbl_user_master`
    INNER JOIN `tbl_booking` 
        ON (`tbl_user_master`.`user_id` = `tbl_booking`.`user_id`)
    INNER JOIN `tbl_pg_master` 
        ON (`tbl_pg_master`.`pg_id` = `tbl_booking`.`pg_id`) where tbl_user_master.user_id = '{$_SESSION['user_id']}'") or die(mysqli_error($connection));
                                        while($data = mysqli_fetch_array($q)){
                                         
                                            echo "<tr>";
                                            echo "<td>{$data['pg_name']}</td>";
                                            echo "<td>{$data['booking_desc']}</td>";
                                            echo "<td>{$data['user_fname']}</td>";
                                            echo "<td>{$data['booking_date']}</td>";
                                            echo "<td>{$data['booking_chargeamount']}</td>";
                                            
                                            echo "<td>{$data['booking_status']}</td>";
                                            
                                            echo "<td><img src='upload/{$data['user_idproof']}' style='width:200px;height:100px;'/></td>";
                                            echo "<td> <a href='give-feedback.php?pgid={$data['pg_id']}'>Give Feedback</a></td>";
                                            echo "<tr>";
                                        }
                                        
                                        ?>
                                        
                                    

                                    </tr>
                                    
                                    
                                    
                                </tbody>
                             </table>
                          </div>
                         
                      </div>
          			</div>
        		</div>
      		</div>
    	</div>
  </div>
  <!-- Start Site Footer -->
  
  <?php
      include ('./usertheme/footer.php');
   ?>
  <!-- End Site Footer -->
  <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call --> 
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin --> 
<script src="plugins/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel --> 
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider --> 
<script src="js/helper-plugins.js"></script> <!-- Plugins --> 
<script src="js/bootstrap.js"></script> <!-- UI --> 
<script src="js/waypoints.js"></script> <!-- Waypoints --> 
<script src="js/init.js"></script> <!-- All Scripts -->
<!--[if lte IE 9]><script src="js/script_ie.js"></script><![endif]--> 
<script src="style-switcher/js/jquery_cookie.js"></script> 
<script src="style-switcher/js/script.js"></script>
<!-- Style Switcher Start -->

</body>

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/my-properties.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:27 GMT -->
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

