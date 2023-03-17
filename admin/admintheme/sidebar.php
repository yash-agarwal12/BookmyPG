
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="home_admin.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#area" aria-expanded="false" aria-controls="area">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Manage Area</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="area" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-area.php">Add Area</a></li>
                <li class="nav-item"> <a class="nav-link" href="display-area.php">View Area</a></li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#user_master" aria-expanded="false" aria-controls="user_master">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">User Master</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="user_master" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="display-user_master.php">View User</a></li>
                
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#pg_master" aria-expanded="false" aria-controls="pg_master">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">PG Master</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="pg_master" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="display-pg_master.php">View PG</a></li> 
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#pgimages" aria-expanded="false" aria-controls="pgimages">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">PG Images</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="pgimages" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="display-pgimages.php">View PG Images</a></li> 
              </ul>
            </div>
          </li>
           
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#pg_category" aria-expanded="false" aria-controls="pg_category">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">PG Category</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="pg_category" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="add-pg_category.php">Add Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="display-pg_category.php">View Category</a></li>
                
              </ul>
            </div>
              
          </li>
          
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#booking" aria-expanded="false" aria-controls="booking">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Manage Booking</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="booking" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="display-booking.php">View Booking</a></li>   
              </ul>
            </div>
          </li>
          
           <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="payment">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Manage Payment</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="payment" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="display-payment.php">View Payment</a></li>   
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#bookmark" aria-expanded="false" aria-controls="bookmark">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Bookmark</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="bookmark" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="display-bookmark.php">View Bookmark</a></li>   
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#feedback" aria-expanded="false" aria-controls="feedback">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Feedback</span>
              <i class="menu-arrow" align="right"></i>
            </a>
            <div class="collapse" id="feedback" >
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="display-feedback.php">View Feedback</a></li>   
              </ul>
            </div>
          </li>
          

          <li class="nav-item">
            <a class="nav-link" href="login.php" aria-expanded="false" aria-controls="feedback">
                <i class="ti-power-off menu-icon"></i>
              <span class="menu-title">Log Out</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="changepassword.php" aria-expanded="false" aria-controls="error">
              <i class="icon-archive menu-icon"></i>
              <span class="menu-title">Change Password</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->