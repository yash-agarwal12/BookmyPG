<?php 
session_start();
include './class/dbconnect.php';

$pgid = $_GET['pgid'];
$pgq = mysqli_query($connection,"select * from tbl_pg_master where pg_id= '{$pgid}'") or die(mysqli_error($connection));
$pgdata = mysqli_fetch_array($pgq);

$areaq = mysqli_query($connection, "select * from  tbl_area where area_id ='{$pgdata['area_id']}'")or die(mysqli_error($connection));
$areadata = mysqli_fetch_array($areaq);
    



?>
<!DOCTYPE HTML>
<html class="no-js">

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/property-detail-fw.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:29 GMT -->
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
    <!-- Start Google Map -->
    
    <!-- End Google Map --> 
  </div>
  <!-- Start Content -->
  <div class="main" role="main">
    <div id="content" class="content full">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="single-property">
              <h2 class="page-title"><?php echo $pgdata['pg_name']; ?><br><span class="location"><?php echo $areadata['area_name']; ?></span></h2>
              
                  <div class="price"><strong>Rs</strong><span><?php echo $pgdata['pg_monthlycharge']; ?></span></div>
                  
                  <button type="submit" class="btn btn-primary" onClick="window.location.href='booking.php?pgid=<?php echo $_GET['pgid']; ?>'">Book Now!</button>
                  <div align="right">
                      <button class="btn btn-primary" onclick="window.location='bookmark-process.php?pgid=<?php echo $_GET['pgid']; ?>';">Bookmark<i class="fa fa-heart-o"></i></button>
                  </div>
                 
              
             <div class="property-slider">
                <div id="property-images" class="flexslider">
                  <ul class="slides">
                      <?php 
                      
$imagq = mysqli_query($connection, "select * from  tbl_pgimages where pg_id ='{$pgdata['pg_id']}'")or die(mysqli_error($connection));
while($pgimagedata = mysqli_fetch_array($imagq)){
    echo "<li class='item'><img src='../owner/uploads/{$pgimagedata['pgimage_path']}'></li>";
}
                               
                      
                      ?>
                      
                  </ul>
                </div>
                <div id="property-thumbs" class="flexslider">
                  <ul class="slides">
                  
                   <?php 
                      
$imagq = mysqli_query($connection, "select * from  tbl_pgimages where pg_id ='{$pgdata['pg_id']}'")or die(mysqli_error($connection));
while($pgimagedata = mysqli_fetch_array($imagq)){
    echo "<li class='item'><img src='../owner/uploads/{$pgimagedata['pgimage_path']}'></li>";
}
                               
                      
                      ?>
                  </ul>
                </div>
              </div>
            </div>
              
              <div id="featured-properties">
        <div class="container">
            <div class="row"><br>
              <div class="col-md-12"><br>
                <div class="block-heading">
                <h4><span class="heading-icon"><i class="fa fa-star"></i></span>Feedbacks</h4>
              </div>
            </div>
          </div>
          <div class="row">
              <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="no">
                  
                  <?php 
                  
                  $fq = mysqli_query($connection, "SELECT *
FROM
    `tbl_user_master`
    INNER JOIN `tbl_feedback` 
        ON (`tbl_user_master`.`user_id` = `tbl_feedback`.`user_id`)
    INNER JOIN `tbl_pg_master` 
        ON (`tbl_pg_master`.`pg_id` = `tbl_feedback`.`pg_id`)  where tbl_pg_master.pg_id = '{$_GET['pgid']}'") or die(mysqli_error($connection));
                  while($fdata = mysqli_fetch_array($fq)){
                      echo "
                  <li class='item property-block'>
                      <div >
                          <h4><a href='property-detail.html'>{$fdata['user_fname']}</a></h4>
                          <span>{$fdata['feedback_details']}</span>
                          <h6>Given on: {$fdata['feedback_date']}</h6>
                              
                      </div>
                  </li>
                 ";
                  }
                  
                  ?>
                  <!--
                  <li class="item property-block">
                      <div >
                          <h4><a href="property-detail.html">Rohini Sharma</a></h4>
                          <span>Cleaning services not provided regularly.</span>
                          <h6>Given on: 26-02-2022</h6>
                          <h6>Replied on: 30-02-2022: Thanks for the feedback. We will improve it.</h6>
                      </div>
                  </li>
                 -->
                  
              </ul>
          </div>
        </div>
      </div>
            <!-- Start Related Properties -->
            
            <div id="featured-properties">
        <div class="container">
            <div class="row"><br>
              <div class="col-md-12"><br>
                <div class="block-heading">
                <h4><span class="heading-icon"><i class="fa fa-star"></i></span>Related Properties</h4>
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
                                
                               $description = substr($data['pg_desc'], 0, 200);
                                echo "<li class='type-rent col-md-12'>
                              <div class='col-md-8'> <a href='pgdetails.php?pgid=$data[0]' class='property-featured-image'> <img src='../owner/uploads/{$imagepath}' style='width:150px;height:150px;' alt=''> <span class='images-count'><i class='fa fa-picture-o'></i> $count</span>  </a> </div>
                            <div class='col-md-8'>
                              <div class='property-info'>
                                <div class='price'><strong>Rs</strong><span>{$data['pg_monthlycharge']}</span></div>
                                <h3><a href='pgdetails.php?pgid=$data[0]'>{$data['pg_name']}</a></h3>
                                <span class='location'>{$areadata['area_name']}</span>
                                          
                               
                              </div>

</div>
                          </li>";
                            }
                            ?>
                  <ul>
                          
                      
              </ul>
          </div>
        </div>
      </div>
          </div>
          <!-- Start Sidebar -->
          <div class="sidebar right-sidebar col-md-4">
          		<div class="widget">
                  <h3 class="widgettitle">PG Owner</h3>
                  <div class="agent">
                  	<!-- <img src="myimages/pgowner.jpg" alt="Ankur Prasad" class="margin-20">-->
                    	<h4><?php echo $pgdata['pg_ownername']; ?></h4>
                   	
                        <!--To contact:<br>
                        Reach out to - +91 8092072112<br>
                          Mail - ankurprasad@gmail.com-->
                 	</div>
             	</div>
          		<div class="widget">
                	<h3 class="widgettitle">Description</h3>
                  <div id="description">
                     <?php echo $pgdata['pg_desc']; ?>                       
                  </div>
               </div>
              
          		<div class="widget">
                	<h3 class="widgettitle">Additional Amenities</h3>
                  <div id="amenities">
                    <div class="additional-amenities">
                        <?php 
                           echo "<font size='4px'>";
                                echo "<strong><b>Amenities:</b> {$pgdata['pg_amenities']} </strong> \n";
                                  echo "<br>";
                                  echo "<br>";
                                  echo "\n <strong><b>No of Sharing: {$pgdata['pg_sharing']}</strong>";
                                  echo "<br>";
                                  echo "<br>";
                                    
                                    $var=$pgdata['pg_isgirlsboys'];
                                            if ($var=='g')
                                            {
                                                echo "\n <strong><b>PG is for: Girls</strong>";
                                            }
                                            else
                                            {
                                        echo "\n <strong><b>PG is for: Boys</strong>";
                                            }
                                    echo "</font>";
                                
                  
                  ?>
                    		
                     </div>
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
<script src="https://maps.google.com/maps/api/js?key=AIzaSyB-SpgMgJfnYGQYrkDIYKMuw0keyeNtqL0"></script> <!-- Google Map --> 
<script type="text/javascript">
        function PropertiesMap() {

            /* Properties Array */
            var properties = [
                { title:"116 Waverly Place",  price:"<strong>$</strong><span>2,800 monthly</span>",  lat:40.73238,  lng:-73.99948,  thumb:"images/property1-map.jpg",  url:"property-details.html",  icon:"images/map-marker.png", }
				
				];

            /* Map Center Location - From Theme Options */
            var location_center = new google.maps.LatLng(properties[0].lat,properties[0].lng);

            var mapOptions = {
                zoom: 4,
				center: new google.maps.LatLng(properties[0].lat,properties[0].lng),
				scrollwheel: false
            }

            var map = new google.maps.Map(document.getElementById("gmap"), mapOptions);

            var markers = new Array();
            var info_windows = new Array();

            for (var i=0; i < properties.length; i++) {

                markers[i] = new google.maps.Marker({
                    position: map.getCenter(),
					map: map,
                    icon: properties[i].icon,
                    title: properties[i].title,
                    animation: google.maps.Animation.DROP
                });

                bounds.extend(markers[i].getPosition());

                info_windows[i] = new google.maps.InfoWindow({
                    content:    '<div class="map-property">'+
                        '<h4 class="property-title"><a class="title-link" href="'+properties[i].url+'">'+properties[i].title+'</a></h4>'+
                        '<a class="property-featured-image" href="'+properties[i].url+'"><img class="property-thumb" src="'+properties[i].thumb+'" alt="'+properties[i].title+'"/></a>'+
                        '<p><span class="price">'+properties[i].price+'</span></p>'+
                        '<a class="btn btn-primary btn-sm" href="'+properties[i].url+'">Details</a>'+
                        '</div>'
                });

                attachInfoWindowToMarker(map, markers[i], info_windows[i]);
            }

            map.fitBounds(bounds);

            /* function to attach infowindow with marker */
            function attachInfoWindowToMarker( map, marker, infoWindow ){
                google.maps.event.addListener( marker, 'click', function(){
                    infoWindow.open( map, marker );
                });
            }

        }

        google.maps.event.addDomListener(window, 'load', PropertiesMap);
    </script> 
<!-- Style Switcher Start -->

</body>

<!-- Mirrored from demo1.imithemes.com/html/real-spaces/property-detail-fw.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Dec 2021 16:19:29 GMT -->
</html>