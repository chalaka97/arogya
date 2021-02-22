
<!-- header-Starts -->
  <header>
      <div class="header-area ">
          <div class="header-top_area">
              <div class="container">
                  <div class="row">

                      <div class="col-xl-6 col-md-6 ">
                      </div>

                      <div class="col-xl-6 col-md-6">
                          <div class="short_contact_list">
                              <ul>
                                  <li><a href="#"> <i class="fa fa-envelope"></i> info@arogya.com</a></li>
                                  <li><a href="#"> <i class="fa fa-phone"></i> 011-2 123 123</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>    
      </div>
  </header>
<!-- header-end -->

<!-- code here -->
        <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <div class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block">
                    <span>Arogya Hospital -  </span>
                    <strong>Vaccination System</strong>
                  </div>
                </div>
              </div>

              <li class="nav-item"><a href="../doctor/logout.php" class="nav-link logout">
                <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a>
              </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <div class="page-content d-flex align-items-stretch"> 

<!-- Side Navbar -->
<nav class="side-navbar">

  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar"><img src="" alt="" class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h4">
              <?php echo nameOf($_SESSION['uname'],$con); ?>
        </h1>
        <div class="image">
            <?php 
            echo '<img src ="'.imageOf($_SESSION['uname'],$con).'">';
          ?>
              <!--<p>useridr</p>-->
      </div>
  </div>

  <!-- Sidebar Navidation Menus-->

  <ul class="list-unstyled h4 text-dark">
    <li class="<?php echo $home ?>"><a href="../doctor/vaccine_home.php"> Vaccination Status </a></li>
    <li class="<?php echo $view_pending_list ?>"><a href="../doctor/vaccine_view_pending_list.php"> Pending List For Vaccination </a></li>
    <li class="<?php echo $add_baby ?>"><a href="../doctor/vaccine_register.php"> Add new Baby for Vaccination </a></li>
    <li class="<?php echo $view_list ?>"><a href="../doctor/vaccine_view_list.php">View Baby list of Vaccination </a></li>
  </ul>
</nav>