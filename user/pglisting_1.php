<?php 
session_start();
include './class/dbconnect.php';
?>
<!DOCTYPE HTML>
<html class="no-js">

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/simple-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:29 GMT -->
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
                      <h1>PGs'</h1>
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
              <div class="row">
                  <div class="col-md-9">
                      <div class="block-heading">
                          <h4><span class="heading-icon"><i class="fa fa-th-list"></i></span>List of PGs</h4>
                          <div class="toggle-view pull-right">
                             
                              <a href="https://demo1.imithemes.com/" class="active"><i class="fa fa-th-list"></i></a>
                          </div>
                      </div>
                    <div class="property-listing">
                        <ul>
                            
                            <?php 
                            
                            if(isset($_GET['cid']))
                            {
                                $cid = $_GET['cid'];
                            $q = mysqli_query($connection, "select * from tbl_pg_master where category_id ='{$cid}'") or die(mysqli_error($connection));
                                
                            }
                            else if(isset ($_GET['category']) && isset ($_GET['location']) ){
                                $location = $_GET['location'];
                                $category = $_GET['category'];
                                
                            $q = mysqli_query($connection, "select * from tbl_pg_master where category_id ='{$category}' and area_id ='{$location}'") or die(mysqli_error($connection));
                                
                            }
                            else
                            {
                            
                            $q = mysqli_query($connection, "select * from tbl_pg_master") or die(mysqli_error($connection));
                            }
                            while($data = mysqli_fetch_array($q)){
                                $imagq = mysqli_query($connection, "select * from  tbl_pgimages where pg_id ='{$data['pg_id']}'")or die(mysqli_error($connection));
                                $pgimagedata = mysqli_fetch_array($imagq);
                                
                                $areaq = mysqli_query($connection, "select * from  tbl_area where area_id ='{$data['area_id']}'")or die(mysqli_error($connection));
                                $areadata = mysqli_fetch_array($areaq);
                                
                             
                                $count = mysqli_num_rows($imagq);
                                if($pgimagedata>0){
                                    
                                    $imagepath = $pgimagedata['pgimage_path'];
                                }else
                                {
                                    $imagepath = "default.png";
                                }
                                
                               $description = substr($data['pg_desc'], 0, 200);
                                echo "<li class='type-rent col-md-12'>
                              <div class='col-md-4'> <a href='pgdetails.php?pgid=$data[0]' class='property-featured-image'> <img src='../owner/uploads/{$imagepath}' style='width:150px;height:150px;' alt=''> <span class='images-count'><i class='fa fa-picture-o'></i> $count</span>  </a> </div>
                            <div class='col-md-8'>
                              <div class='property-info'>
                                <div class='price'><strong>Rs</strong><span>{$data['pg_monthlycharge']}</span></div>
                                <h3><a href='pgdetails.php?pgid=$data[0]'>{$data['pg_name']}</a></h3>
                                <span class='location'>{$areadata['area_name']}</span>
                                          
                               <p>$description...</p>
                              </div>
                              <div class='property-amenities clearfix'> <span class='area'><strong>AC</strong></span> <span class='baths'><strong>Wifi</strong></span> <span class='beds'><strong>3</strong>Sharing</span> <span class='parking'><strong>Laundry</strong></span> </div>
                            </div>
                          </li>";
                            }
                            
                            ?>
                            
                          
                           
                        </ul>
                    </div>
                  <!--  <ul class="pagination">
                      <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                      <li class="active"><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                    </ul> -->
                  </div>
                  <!-- Start Sidebar -->
                  <div class="sidebar right-sidebar col-md-3">
                      <div class="widget sidebar-widget">
                      <h3 class="widgettitle">Search PG</h3>
                          <div class="full-search-form">
                              <form action="#">
                                  <select name="category" class="form-control input-lg selectpicker">
                                  
                        <?php 
                        
                        $q = mysqli_query($connection, "select * from  tbl_pg_category") or die(mysqli_error($connection));
                        while($data = mysqli_fetch_array($q)){
                            echo "<option value='{$data['category_id']}'>{$data['category_name']}</option>";
                        }
                        
                        ?>
                                  </select>
                                  
                                  <select name="location" class="form-control input-lg selectpicker">
                                           <?php 
                        
                        $q = mysqli_query($connection, "select * from  tbl_area") or die(mysqli_error($connection));
                        while($data = mysqli_fetch_array($q)){
                            echo "<option value='{$data['area_id']}'>{$data['area_name']}</option>";
                        }
                        
                        ?>
                                  </select>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
                            </form>
                          </div>
                    </div>
                    <div class="widget sidebar-widget featured-properties-widget">
                        <h3 class="widgettitle">Featured Properties</h3>
                        <ul class="owl-carousel owl-alt-controls1 single-carousel" data-columns="1" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="yes">
                            <li class="item property-block"> <a href="#" class="property-featured-image"> <img src="myimages/pg3p4.jpg" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>  </a>
                            <div class="property-info">
                              <h4><a href="#">Equinox</a></h4>
                              <span class="location">Ahmedabad</span>
                              <div class="price"><strong>Rs</strong><span>12000</span></div>
                            </div>
                          </li>
                          <li class="item property-block"> <a href="#" class="property-featured-image"> <img src="myimages/pg1p2.jpg" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>  </a>
                            <div class="property-info">
                              <h4><a href="#">Lisbon House</a></h4>
                              <span class="location">Ahmedabad</span>
                              <div class="price"><strong>Rs</strong><span>8000</span></div>
                            </div>
                          </li>
                          <li class="item property-block"> <a href="#" class="property-featured-image"> <img src="myimages/pg2p2.jpg" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> </a>
                            <div class="property-info">
                              <h4><a href="#">Chester House</a></h4>
                              <span class="location">Ahmedabad</span>
                              <div class="price"><strong>Rs</strong><span>10000</span></div>
                            </div>
                          </li>
                          <li class="item property-block"> <a href="#" class="property-featured-image"> <img src="myimages/pg4pp3.jpg" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>  </a>
                            <div class="property-info">
                              <h4><a href="#">Ripon House</a></h4>
                              <span class="location">Ahmedabad</span>
                              <div class="price"><strong>Rs</strong><span>13000 Monthly</span></div>
                            </div>
                          </li>
                        </ul>
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

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/simple-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:29 GMT -->
</html>