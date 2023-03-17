<?php 
session_start();
include './class/dbconnect.php';
?>
<!DOCTYPE HTML>
<html class="no-js">

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:18:42 GMT -->
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
<body class="home">
    
    <?php          
            
            if(!isset($_SESSION['user_id']))
            {
                header("location:login.php");
            }
            
            
        ?>
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
    <div class="slider-mask overlay-transparent"></div>
    <!-- Start Hero Slider -->
    <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="no" data-arrows="yes" data-style="fade" data-pause="yes">
      <ul class="slides">
        <li class=" parallax" style="background-image:url(images/slide2.jpg);">
          
        </li>
        <li class="parallax" style="background-image:url(images/property10.jpg);">
          
        </li>
      </ul>
    </div>
    <!-- End Hero Slider --> 
    <!-- Site Search Module -->
    <div class="site-search-module">
      <div class="container" >
        <div class="site-search-module-inside">
            <form action="pglisting.php" method="get">
            <div align="center" class="form-group">
              <div class="row" >
                <div class="col-md-2">
                    <select name="category" class="form-control input-lg selectpicker">
                        <option selected>Category</option>
                      
                        <?php 
                        
                        $q = mysqli_query($connection, "select * from  tbl_pg_category") or die(mysqli_error($connection));
                        while($data = mysqli_fetch_array($q)){
                            echo "<option value='{$data['category_id']}'>{$data['category_name']}</option>";
                        }
                        
                        ?>
                    </select>
                </div>
                 
                <div class="col-md-3">
                    <select name="location" class="form-control input-lg selectpicker">
                        <option selected>Location</option>
                        <?php 
                        
                        $q = mysqli_query($connection, "select * from  tbl_area") or die(mysqli_error($connection));
                        while($data = mysqli_fetch_array($q)){
                            echo "<option value='{$data['area_id']}'>{$data['area_name']}</option>";
                        }
                        
                        ?>
                    </select>
                    
                </div>
                   <div class="col-md-3">
                    <input type="text" name="pgname" class="form-control input-lg selectpicker" placeholder="Search PG by name"/>
                </div>
                <div class="col-md-2"> <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-search"></i> Search</button> </div>
                <div class="col-md-2"> <a href="#" id="ads-trigger" class="btn btn-default btn-block"><i class="fa fa-plus"></i> <span>More Filter</span></a> </div>
              </div>
              <div class="row hidden-xs hidden-sm">
                <div class="col-md-2">
                  <label>Sharing</label>
                    <select name="sharing" class="form-control input-lg selectpicker">
                      <option>Any</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                </div>
                <div class="col-md-2">
                  <label>Food</label>
                    <select name="food" class="form-control input-lg selectpicker">
                         <option>Any</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                </div>
                <div class="col-md-2">
                  <label>laundry</label>
                    <select name="laundry" class="form-control input-lg selectpicker">
                         <option>Any</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                </div>
                 <div class="col-md-2">
                  <label>AC</label>
                    <select name="ac" class="form-control input-lg selectpicker">
                         <option>Any</option>
                      <option>Yes</option>
                      <option>No</option>
                    </select>
                </div>
                 
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
     <div class="spacer-40"></div>
      
    <div class="container">
      <div class="row">
          <div class="property-columns" id="latest-properties">
              <div class="col-md-12">
                <div class="block-heading">
                  <h4><span class="heading-icon"><i class="fa fa-leaf"></i></span>Recently Listed</h4>
                  <a href="simple-listing-fw.html" class="btn btn-primary btn-sm pull-right">View more properties <i class="fa fa-long-arrow-right"></i></a>
                </div>
              </div>
              <div class="property-listing">
              <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="no">
                  <?php 
                  $q = mysqli_query($connection, "select * from tbl_pg_master") or die(mysqli_error($connection));
                  
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
                                
                               $description = substr($data['pg_desc'], 0, 50);
                                echo "<li class='col-md-12 col-sm-6'>
                              <div class='property-block'> <a href='pgdetails.php?pgid=$data[0]' class='property-featured-image'> <img src='../owner/uploads/{$imagepath}' style='width:150px;height:150px;' alt=''> <span class='images-count'><i class='fa fa-picture-o'></i> $count</span>  </a> </div>
                            <div class='col-md-12'>
                              <div class='property-info'>
                                <div class='price'><strong>Rs</strong><span>{$data['pg_monthlycharge']}</span></div>
                                <h3><a href='pgdetails.php?pgid=$data[0]'>{$data['pg_name']}</a></h3>
                                <span class='location'>{$areadata['area_name']}</span>
                                          
                               <p>$description...</p>
                              </div>
                               </div>
                          </li>";
                            }
                            
                            ?>
              </ul>
              </div>
          </div>
        </div>
      </div>
      <div id="featured-properties">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-heading">
                <h4><span class="heading-icon"><i class="fa fa-star"></i></span>Featured Properties</h4>
              </div>
            </div>
          </div>
          <div class="row">
              <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="no">
                  <?php
                  $q = mysqli_query($connection, "select * from tbl_pg_master") or die(mysqli_error($connection));
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
                                
                               $description = substr($data['pg_desc'], 0, 60);
                                echo "<li class='item property-block'>
                              <div class='col-md-12 col-sm-6'> <a href='pgdetails.php?pgid=$data[0]' class='property-featured-image'> <img src='../owner/uploads/{$imagepath}' style='width:150px;height:150px;' alt=''> <span class='images-count'><i class='fa fa-picture-o'></i> $count</span>  </a> </div>
                            <div class='col-md-12 col-sm-6'>
                              <div class='property-info'>
                                <div class='price'><strong>Rs</strong><span>{$data['pg_monthlycharge']}</span></div>
                                <h3><a href='pgdetails.php?pgid=$data[0]'>{$data['pg_name']}</a></h3>
                                <span class='location'>{$areadata['area_name']}</span>
                                          
                               <p>$description...</p>
                              </div>
                 
                            </div>
                          </li>";
                            }
                  ?>
                  <li class="item property-block">
                      <a href="property-detail.html" class="property-featured-image">
                          <img src="myimages/pg3p1.jpg" alt="">
                      <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                     
                      </a>
                      <div class="property-info">
                          <h4><a href="property-detail.html">Equinox</a></h4>
                          <span class="location">Ahmedabad</span>
                          <div class="price"><strong>Rs</strong><span>12000</span></div>
                      </div>
                  </li>
                  <li class="item property-block">
                  <a href="property-detail.html" class="property-featured-image">
                      <img src="myimages/pg1p2.jpg" alt="">
                      <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                        
                      </a>
                      <div class="property-info">
                          <h4><a href="property-detail.html">Lisbon House</a></h4>
                          <span class="location">Ahmedabad</span>
                          <div class="price"><strong>Rs</strong><span>11000</span></div>
                      </div>
                  </li>
                  <li class="item property-block">
                      <a href="property-detail.html" class="property-featured-image">
                          <img src="myimages/pg3p7.jpg" alt="">
                          <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                        
                      </a>
                      <div class="property-info">
                          <h4><a href="property-detail.html">Chester House</a></h4>
                          <span class="location">Ahmedabad</span>
                          <div class="price"><strong>Rs</strong><span>9000</span></div>
                      </div>
                  </li>
                  <li class="item property-block">
                      <a href="property-detail.html" class="property-featured-image">
                          <img src="myimages/pg4pp3.jpg" alt="">
                          <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                   
                      </a>
                      <div class="property-info">
                          <h4><a href="property-detail.html">Ripon House</a></h4>
                          <span class="location">Ahmedabad</span>
                          <div class="price"><strong>Rs</strong><span>10000</span></div>
                      </div>
                  </li>
                 <li class="item property-block">
                      <a href="property-detail.html" class="property-featured-image">
                          <img src="myimages/pg4pp3.jpg" alt="">
                          <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                   
                      </a>
                      <div class="property-info">
                          <h4><a href="property-detail.html">Four Walls PG</a></h4>
                          <span class="location">Ahmedabad</span>
                          <div class="price"><strong>Rs</strong><span>8000</span></div>
                      </div>
                  </li>
                  <li class="item property-block">
                      <a href="property-detail.html" class="property-featured-image">
                          <img src="myimages/pg4pp2.jpg" alt="">
                          <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                         
                      </a>
                      <div class="property-info">
                          <h4><a href="property-detail.html">Dresdon House</a></h4>
                          <span class="location">Ahmedabad</span>
                          <div class="price"><strong>Rs</strong><span>9000</span></div>
                      </div>
                  </li>
              </ul>
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

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:12 GMT -->
</html>
