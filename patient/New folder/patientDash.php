<?php

  //session_start();

  include('../connection/connection.php');
?>
<head>
  <style>
    .image img{
      width: 65px;
      height: 65px;
      border-radius: 50%;
    }
            
  </style>
</head>
  <div class="page">
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header">
              <div class="navbar-brand d-none d-sm-inline-block">
                  <img src="../img/logo1.jpg" alt="arogya image">
                  <span> Aarogya Hospital - </span>
                  <strong>Patient</strong>
              </div> 
            </div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <li class="nav-item"><a href="../login.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fas fa-sign-out-alt"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="page-content d-flex align-items-stretch"> 
      <nav class="side-navbar">
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"></div>
            <div class="title">
             <h1 class="h4">
                <?php 
                  $sql=mysqli_query($con,"select name from patient where patient_email='". $_SESSION['patient_email'] ."'");
                  while($row=mysqli_fetch_array($sql))
                  {  
                    echo $row['name'];
                  }
                ?>
              </h1>
              <?php 
                  $sql=mysqli_query($con,"select img from patient where patient_email='". $_SESSION['patient_email'] ."'");
                  while($row=mysqli_fetch_array($sql)){
              ?>
                  <div class="image">
                    <img name="img" src="../img/ProfilePic/<?php echo $row['img']; ?>"> 
                  </div>           
                <?php 
                  }
                ?>
            </div>
        </div>
        <ul class="list-unstyled">
          <li>
            <a href="patient.php"><i class="ti-home"> Dashboard</i></a>
          </li>
          <li>
            <a href="edit-profile.php"><i class="ti-user"> Edit Profile</i></a>
          </li>
          <li>
            <a href=""><i class="ti-calendar"> Book Appointment</i></a>
            <ul>
            	<li><a href="">WEBTCR Appointment</a></li>
            	<li><a href="">physiotherapy Appointment</a></li>
            	<li><a href="book-appointment.php">Other Appointment</a></li>
            </ul>
          </li>
          <li>
            <a href="view-appointment.php"><i class="ti-menu-alt"> View Appointment</i></a>
          </li>
          <li>
            <a href="medical-history.php"><i class="ti-clipboard"> View Medical History</i></a>
          </li>
        </ul>
      </nav>

