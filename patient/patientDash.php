<?php
  include('../connection/connection.php');
  $notificationCount = "0";
  $notificationDate = "";
  $title = "";
?>

<!DOCTYPE html>
<html>
<head>
   <title>Patient | Dashboard</title>
  <style>
    .image img{
      width: 65px;
      height: 65px;
      border-radius: 50%;
    }
    .notification-content{
    /*        width: 60%;*/
    }        
    .flexer{
      display: flex;
      justify-content: space-between;
    }
    .custom-content{
      text-align: left;
      white-space: normal;
    }         
</style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">
        

            <!-- CSS here -->
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/owl.carousel.min.css">
            <link rel="stylesheet" href="../css/magnific-popup.css">
            <link rel="stylesheet" href="../css/font-awesome.min.css">
            <link rel="stylesheet" href="../css/themify-icons.css">
            <link rel="stylesheet" href="../css/nice-select.css">
            <link rel="stylesheet" href="../css/flaticon.css">
            <link rel="stylesheet" href="../css/gijgo.css">
            <link rel="stylesheet" href="../css/animate.css">
            <link rel="stylesheet" href="../css/slicknav.css">
            <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <div class="page">
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header">
              <div class="navbar-brand d-none d-sm-inline-block">
                <img src="../assets/img/logo2.png" alt="Arogya" width="40" height="40"> 
                  <a href="#" class="brand-text d-none d-lg-inline-block"><span> Aarogya Hospital -  </span><strong>Patient</strong></a>
              </div>
            </div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <li class="nav-item dropdown">
                <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="ti-bell"></i><span class="badge bg-red badge-corner"><?php echo $notificationCount ?></span></a>
                <ul aria-labelledby="notifications" class="dropdown-menu">
                  <?php 
                      $noti_query="SELECT * FROM notification ORDER BY notification_id DESC";
                      $result=mysqli_query($con,$noti_query);
                      while($rec=mysqli_fetch_assoc($result)){
                        $role = $rec['role'];
                        $ownRoleArr=(explode(",",$role));
                        foreach($ownRoleArr as $allRoles) {
                          if ($allRoles=="patient") {
                  ?>
                  <li>
                    <div class="notification mb-t mb-1">
                      <a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification-content flexer">
                          <div><i class="fa fa-envelope bg-green"></i></div> 
                          <div class="custom-content"><?php echo $rec['title'];?></div>
                        </div>
                        <div class="notification-time"><small><?php echo $rec['date'];?></small></div>
                      </a>
                    </div>
                  </li>
                  <?php
                        }
                      }
                    }
                  ?>
                  <li><a rel="nofollow" href="patientNotification.php" class="dropdown-item all-notifications text-center"> <strong>view all notifications </strong></a></li> 
                </ul>
              </li>
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
                    <img name="img" src="<?php echo $row['img']; ?>"> 
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
            	<li><a href="../patient/webtcr.php">WEBTCR Appointment</a></li>
            	<li><a href="../patient/physiotheropy.php">physiotherapy Appointment</a></li>
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
   
</body>
</html>
