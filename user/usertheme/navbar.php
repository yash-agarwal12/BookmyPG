<header class="site-header">
    <div class="top-header hidden-xs">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <ul class="horiz-nav pull-left">
              <li class="dropdown"><a data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "Hi ".$_SESSION['user_fname']; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  
                  <li><a href="bookmark.php" >Bookmarks</a></li>
                  <li><a href="view-booking.php" ">View Bookings</a></li>
                  <li><a href="changepass.php">Change Password</a></li>
                </ul>
              </li>
            
              </ul>
          </div>
          <div class="col-md-8 col-sm-6">
            <ul class="horiz-nav pull-right">
                
                   <li><a href="login.php"><i class="fa fa-check-circle"></i> Logout</a></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
    <div class="middle-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-8 col-xs-8">
              <h1 class="logo"> <a href="home.php"><img  width="200" height="150" src="myimages/logo_user_c.png"  alt="Logo"></a> </h1>
          </div>
          <div class="col-md-8 col-sm-4 col-xs-4">
              
              <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="main-menu-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navigation">
              <ul class="sf-menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                
                <li><a href="#">Category</a>
                  <ul class="dropdown">
                     <?php 
                
                $q = mysqli_query($connection,"select  *  from tbl_pg_category") or die(mysqli_error($connection));
                while($data= mysqli_fetch_array($q))
                {
                    echo "<li><a href='pglisting.php?cid={$data['category_id']}'>{$data['category_name']}</a></li>";
                    
                }
                
                ?>
                </li>
                  </ul>
                </li>
                
                <li><a href="pglisting.php">PGs</a>
                <li>
               
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>