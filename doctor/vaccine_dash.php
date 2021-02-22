<?php
$current_url= substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
    
    $home="";
    $view_list="";
    $view_pending_list="";
    $add_baby="";

    if($current_url=="vaccine_home.php"){
        $home="active";
    }else if($current_url=="vaccine_view_list.php"){
        $view_list="active";
    }else if($current_url=="vaccine_view_pending_list.php"){
        $view_pending_list="active";
    }else if($current_url=="vaccine_register.php"){
        $add_baby="active";
    }
?>

<!-- header-Starts -->
  <header>
    <style>
        .{
            font-size: 18px;
        }
      .image img{
        width: 70px;
        height: 70px;
        border-radius:50%;
    }
    </style>
<!--
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
-->
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
                    <img src="../img/doctor/logo1.jpg">
                    <span>Arogya Hospital -  </span>
                    <strong>Doctor - <?php echo $_SESSION['docter_spec'];?> </strong>
                  </div>
                </div>
              </div>
              <li class="nav-item"><a href="../logout.php" class="nav-link logout">
                <span class="d-none d-sm-inline">Logout</span><i class="fas fa-sign-out-alt"></i></a>
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
                <?php
                  $sql=mysqli_query($con,"select name from doctor where doctor_email='".$_SESSION["docter_email"]."'");
                  while ($data=mysqli_fetch_array($sql)) {
                    echo $data['name'];
                  }
                  ?>
              </h1>
              <?php
                  $sql=mysqli_query($con,"select img from doctor where doctor_email='". $_SESSION["docter_email"] ."'");
                  while ($data=mysqli_fetch_array($sql)) {
                    
                  ?>
                  <div class="image">
                    <?php
                      echo '<img src ="'.$data['img'].'">';
                    ?>
                  </div>
                <?php  }  ?>

              <!--<p>useridr</p>-->
            </div>
          </div>

  <!-- Sidebar Navidation Menus-->
  <?php
    if(strcmp(trim($_SESSION['docter_spec']),'webtcr')==0){
      $url="webtcrdoc.php";
    }else if (strcmp(trim($_SESSION['docter_spec']),'pediatrician')==0) {
      $url="vaccine_view_list.php";
    }else{
      $url="physiotheropydoc.php";
    }
  ?>
  <ul class="list-unstyled h4 text-dark">
    <li class="<?php echo $home ?>"><a href="doctor.php">Status </a></li>
   <!--  <li class="<?php echo $view_pending_list ?>"><a href="#"> Edit Profile</a></li>
    <li class="<?php echo $add_baby ?>"><a href="#"> Appoiment List </a></li>
    <li class="<?php echo $view_list ?>"><a href="#">Appoiment History </a></li> -->
    <li class="<?php echo $view_list ?>"><a href="<?php echo $url;?>"><?php echo $_SESSION['docter_spec'];?></a></li>
  </ul>
</nav>