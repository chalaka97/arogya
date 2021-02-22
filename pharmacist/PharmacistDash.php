<?php
//session_start();
  include("../connection/connection.php");
  include("get_notification.php");
?>
<style>
  
  .image img{
                width: 70px;
                height: 70px;
                 border-radius:50%;
            }
</style>
<header>
<div class="header-area ">
  <div class="header-top_area">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-md-6 ">
                            
        </div>
        <div class="col-xl-6 col-md-6">
        </div>
      </div>
    </div>
  </div>    
</div>
</header>
<!-- header-end -->
<div class="page">
<!-- Main Navbar-->
<body>
  <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand -->
                <div class="navbar-brand d-none d-sm-inline-block">
                  
                    <img src="../img/logo2.png" width="40" height="40">
                    <span>Arogya Hospital -</span><strong>Pharmacist</strong>
                  
                </div> 
              </div>

              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Notifications-->
                <li class="nav-item dropdown"> 
                  <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                    <i class="fa fa-bell"></i>
                      <span class="badge bg-red badge-corner"><?php echo $noti ?></span>
                  </a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <?php echo $table;?>

                    <li>
                      <a rel="nofollow" href="view_notification.php" class="dropdown-item all-notifications text-center"><strong>view all notifications</strong></a>
                    </li>
                  </ul>
                </li>
              
                
                <!-- Logout    -->
                <li class="nav-item"><a href="../login.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fas fa-sign-out-alt"></i></a></li>
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
            
            <div class="title">
              
              <div class="avatar"><img src="<?php echo $_SESSION['pharmacist_image']; ?>" alt="..." class="img-fluid rounded-circle"></div>
                <br>
                <h1 class="h5">
                <?php
                  echo $_SESSION['pharmacist_uname'];
                  ?>
              </h1>
              <!--<p>useridr</p>-->
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <ul class="list-unstyled">
            <li class="active"><a href="Pharmacist.php"><i class="ti-home">Dashboard</i></a></li>
            <li><a href="../pharmacist/editProfile.php"><i class="ti-user">My Profile</i></a></li>
            <li><a href="../pharmacist/AddDrugs.php" aria-expanded="false"><i class="ti-pencil">Add Drugs</i> </a> </li>
            <li><a href="../pharmacist/viewDrugs.php"><i class ="ti-menu-alt">View Drugs</i> </a></li>
            <li><a href="../pharmacist/manageDrugs.php"><i class ="ti-pencil-alt">Manage Drugs</i></a></li>
            <li><a href="../pharmacist/searchDrugs.php"><i class ="ti-search">Search Drugs</i></a></li>
            
           
           
          </ul>
            
        </nav>
        </html>
        
        