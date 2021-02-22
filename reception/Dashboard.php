<?php 

//session_start();
include('../connection/connection.php'); 

?>
<html>
  <head>
    <style>

    .image img{
      width:100px;
      height:100px;
     }

  </style>
</head>

        
 
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
                <!-- Navbar Brand --><div class="navbar-brand d-none d-sm-inline-block">
                  <img src="../img/logo2.png" style="width:40px; height:40px;">
                  <a href="index.html" class="brand-text d-none d-lg-inline-block"><span>Aarogya Hospital -  </span><strong>Reception</strong></a>
                 </div>
               
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                
                <!-- Notifications-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                    <li><a rel="nofollow" href="unread-notification.php" class="dropdown-item all-notifications text-center"> <span class="">view all notifications</span></a></li>
                  </ul>
                </li>
              
                <li class="nav-item"><a href="../loginui.php" class="nav-link Logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fas fa-sign-out-alt"></i></a></li>
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
            <div class="avatar">
              
              <?php 
                     $sql=mysqli_query($con,"select * from reception where reception_email='". $_SESSION['reception_email'] ."'");
                        while($data=mysqli_fetch_array($sql))
                        {

                          ?>
                          <!--<div class="image">
                            <div class="ima" align="center">
                                <img  src="<?php echo $data['img'];?>">
                            </div>
                         </div>-->
                
                <?php
                  }
                ?>
                <div class="image">
                            <div class="ima" align="center">
                                <img  src="<?php echo $_SESSION['reception_image'];?>">
                            </div>
                </div>
                
       
          </div>
          <br/>


          </div>
          <div class="title">
              <br/>
               <?php echo $_SESSION['reception_name'];?>
            </div>


                        
                                
          
          <ul class="list-unstyled">

            <li><a href="reception.php"> <i class="ti-home"></i>DashBoard</a>
            <li><a href="edit-profile.php"> <i class="ti-user"></i>My Profile</a>          
            <li><a href="addpatient.php"> <i class="ti-pencil"></i>Add Patient</a></li>
            <li><a href="view-patient.php"> <i class="fa fa-eye"></i>View Patient</a></li>
            <li><a href="add-appointment.php"> <i class="fa fa-address-book-o"></i>Add Appointment</a></li>
            <li><a href="view-appointment.php"> <i class="ti-list"></i>View Appointment </a></li>
            <li><a href="add_invoice.php"> <i class="fa fa-book fa-fw"></i>Create Invoice</a></li>
            <li><a href="search.php"> <i class="ti-search"></i>Search </a></li>
           
          </ul>
            
        </nav>

   </html>

    