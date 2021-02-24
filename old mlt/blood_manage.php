
<!-- Blood Manage  -->
<?php?>

<link rel="stylesheet" href="../css/font-awesome.min.css">

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
                <!-- Navbar Brand --><div class="navbar-brand d-none d-sm-inline-block">
                  <a href="index.html" class="brand-text d-none d-lg-inline-block"><span>Aarogya Hospital -  </span><strong>MLT -  Blood Bank Management</strong></a>
                 </div>
               
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                
                <!-- Notifications-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner">!</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">

                        
                        <?php
                              foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "A+"') as $row){
                                  if($row['COUNT(*)']<5){
                                   
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-red"></i>A+ '.$row['COUNT(*)']. ' Packets available</div>';
                                    echo'<div class="notification-time"><small style="color:red;">Critical</small></div>';

                                    
                                  }elseif($row['COUNT(*)']<10){
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>A+ '.$row['COUNT(*)']. ' Packets available</div>';
                                    // echo'<div class="notification-time"><small>4 minutes ago</small></div>';

                                    
                                  }else {
                                    
                                  }
                                  
                              }
                                  ?>
                          
                        </div></a></li>

                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">

                        
                        <?php
                              foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "A-"') as $row){
                                  if($row['COUNT(*)']<5){
                                   
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-red"></i>A- '.$row['COUNT(*)']. ' Packets available</div>';
                                    echo'<div class="notification-time"><small style="color:red;">Critical</small></div>';

                                    
                                  }elseif($row['COUNT(*)']<10){
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>A- '.$row['COUNT(*)']. ' Packets available</div>';
                                    // echo'<div class="notification-time"><small>4 minutes ago</small></div>';

                                    
                                  }else {
                                    
                                  }
                                  
                              }
                                  ?>
                          
                        </div></a></li>

                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">

                        
                        <?php
                              foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "B+"') as $row){
                                  if($row['COUNT(*)']<5){
                                   
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-red"></i>B+ '.$row['COUNT(*)']. ' Packets available</div>';
                                    echo'<div class="notification-time"><small style="color:red;">Critical</small></div>';

                                    
                                  }elseif($row['COUNT(*)']<10){
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>B+ '.$row['COUNT(*)']. ' Packets available</div>';
                                    // echo'<div class="notification-time"><small>4 minutes ago</small></div>';

                                    
                                  }else {
                                    
                                  }
                                  
                              }
                                  ?>
                          
                        </div></a></li>

                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">

                        
                        <?php
                              foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "B-"') as $row){
                                  if($row['COUNT(*)']<5){
                                   
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-red"></i>B- '.$row['COUNT(*)']. ' Packets available</div>';
                                    echo'<div class="notification-time"><small style="color:red;">Critical</small></div>';

                                    
                                  }elseif($row['COUNT(*)']<10){
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>B- '.$row['COUNT(*)']. ' Packets available</div>';
                                    // echo'<div class="notification-time"><small>4 minutes ago</small></div>';

                                    
                                  }else {
                                    
                                  }
                                  
                              }
                                  ?>
                          
                        </div></a></li>

                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">

                        
                        <?php
                              foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "AB+"') as $row){
                                  if($row['COUNT(*)']<5){
                                   
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-red"></i>AB+ '.$row['COUNT(*)']. ' Packets available</div>';
                                    echo'<div class="notification-time"><small style="color:red;">Critical</small></div>';

                                    
                                  }elseif($row['COUNT(*)']<10){
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>AB+ '.$row['COUNT(*)']. ' Packets available</div>';
                                    // echo'<div class="notification-time"><small>4 minutes ago</small></div>';

                                    
                                  }else {
                                    
                                  }
                                  
                              }
                                  ?>
                          
                        </div></a></li>

                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">

                        
                        <?php
                              foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "AB-"') as $row){
                                  if($row['COUNT(*)']<5){
                                   
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-red"></i>AB- '.$row['COUNT(*)']. ' Packets available</div>';
                                    echo'<div class="notification-time"><small style="color:red;">Critical</small></div>';

                                    
                                  }elseif($row['COUNT(*)']<10){
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>AB- '.$row['COUNT(*)']. ' Packets available</div>';
                                    // echo'<div class="notification-time"><small>4 minutes ago</small></div>';

                                    
                                  }else {
                                    
                                  }
                                  
                              }
                                  ?>
                          
                        </div></a></li>

                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">

                        
                        <?php
                              foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "O+"') as $row){
                                  if($row['COUNT(*)']<5){
                                   
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-red"></i>O+ '.$row['COUNT(*)']. ' Packets available</div>';
                                    echo'<div class="notification-time"><small style="color:red;">Critical</small></div>';

                                    
                                  }elseif($row['COUNT(*)']<10){
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>O+ '.$row['COUNT(*)']. ' Packets available</div>';
                                    // echo'<div class="notification-time"><small>4 minutes ago</small></div>';

                                    
                                  }else {
                                    
                                  }
                                  
                              }
                                  ?>
                          
                        </div></a></li>

                        <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">

                        
                        <?php
                              foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "O-"') as $row){
                                  if($row['COUNT(*)']<5){
                                   
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-red"></i>O- '.$row['COUNT(*)']. ' Packets available</div>';
                                    echo'<div class="notification-time"><small style="color:red;">Critical</small></div>';

                                    
                                  }elseif($row['COUNT(*)']<10){
                                    echo'<div class="notification-content"><i class="fas fa-exclamation-triangle bg-orange"></i>O- '.$row['COUNT(*)']. ' Packets available</div>';
                                    // echo'<div class="notification-time"><small>4 minutes ago</small></div>';

                                    
                                  }else {
                                    
                                  }
                                  
                              }
                                  ?>
                          
                        </div></a></li>
                                      
                    <!-- <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li> -->
                  </ul>
                </li>
                <!-- Messages                        -->
              
                <!-- Languages dropdown    -->
                
                <!-- Logout    -->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
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
            <div class="avatar"><img src="img/experts/7.png" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">MLT</h1>
              <p>mlt0546</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><ul class="list-unstyled">
            <li class="active"><a href="../mlt/mlt.php"> <i class="icon-home"></i>Dashboard </a></li>
            <li ><a href="../mlt/blood_view.php"> <i class="icon-home"></i>View All blood </a></li>
            <li ><a href="../mlt/blood_add.php"> <i class="icon-home"></i>Add Blood </a></li>

              <!-- <li><a href="#DropdownViewUser" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>View Users </a>
              <ul id="DropdownViewUser" class="collapse list-unstyled ">
                <li><a href="viewAdmin.php">Admin</a></li>
                <li><a href="viewDoctor.php">Doctor</a></li>
                <li><a href="viewPatient.php">Patient</a></li>
                <li><a href="viewPharmacist.php">Pharmacist</a></li>
                <li><a href="viewReception.php">Reception</a></li>
                <li><a href="viewMLT.php">MLT</a></li>
              </ul>
            </li>
            <li><a href="sendNotification.php"> <i class="icon-grid"></i>Send Notification </a></li>
              <li><a href="viewNotification.php"> <i class="icon-grid"></i>View Send Notification </a></li>
            <li><a href="contactMessage.php"> <i class="fa fa-bar-chart"></i>Contact Messages </a></li>
            -->
           
          </ul>
            
        </nav>
