<?php
//    session_start();
    include('../include/header.php');
    include('../connection/connection.php');
    $notificationCount = "0";
    $notificationDate = "";
    $title = "";

    ?>

    <style>
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
                      <img src="../assets/img/logo2.png" alt="Arogya" width="40" height="40"> 
                      <a href="#" class="brand-text d-none d-lg-inline-block"><span> Aarogya Hospital -  </span><strong>Administrator</strong></a>
                     </div>

                  </div>
                  <!-- Navbar Menu -->
                  <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

                    <!-- Notifications-->
                    <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa-bell-slash-o"></i><span class="badge bg-red badge-corner"><?php echo $notificationCount ?></span></a>
                      <ul aria-labelledby="notifications" class="dropdown-menu">

                        

                                <?php 
                                    $noti_query="SELECT * FROM notification ORDER BY notification_id DESC";
                                    $result=mysqli_query($con,$noti_query);
                                    while($rec=mysqli_fetch_assoc($result)){
                                        $role = $rec['role'];
                                        
                                        $ownRoleArr=(explode(",",$role));
                                        //print_r ($ownRole);
                                        foreach($ownRoleArr as $allRoles) {
                                        if ($allRoles=="admin") {
                                            ?>
                          
                                            <li>
                                            <div class="notification mb-t mb-1">
                                            <a rel="nofollow" href="#" class="dropdown-item"> 
                                    
                                            <div class="notification-content flexer">
                                            <div><i class="fa fa-envelope bg-green"></i></div> <div class="custom-content"><?php echo $rec['title'];?></div>
                                            </div>
                                    
                                            <div class="notification-time"><small><?php echo $rec['date'];?></small></div>
                                                </a>
                                            </div></li>
                                            <?php
                                            }

                                    }
                                        }
                                 
                                    
                                  ?> 


                            

                        <li><a rel="nofollow" href="adminNotification.php" class="dropdown-item all-notifications text-center"> <strong>view all notifications </strong></a></li>
                      </ul>
                    </li>
                    <!-- Messages                        -->

                    <!-- Languages dropdown    -->

                    <!-- Logout    -->
                    <li class="nav-item"><a href="../logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
                  </ul>
                </div>
              </div>
            </nav>
          </header>
          <div class="page-content d-flex align-items-stretch" > 
            <!-- Side Navbar -->
            <nav class="side-navbar">
              <!-- Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="<?php echo $_SESSION['admin_image']; ?>" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                  <h1 class="h4"><?php echo $_SESSION['admin_name'];?></h1>
                  <p>User ID: <?php echo $_SESSION['admin_id'];?></p>
                    <p><a href="../admin/adminEdit.php"><b>Edit Profile</b></a></p>
                </div>
              </div>
              <!-- Sidebar Navidation Menus--><ul class="list-unstyled">
                <li class="active"><a href="../admin/admin.php"> <i class="icon-home"></i>Dashboard </a></li>
                 <li><a href="#DropdownCreateUser" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Add Users </a>
                  <ul id="DropdownCreateUser" class="collapse list-unstyled ">
                    <li><a href="../admin/adminUadmin.php">Admin</a></li>
                    <li><a href="../admin/adminUdoctor.php">Doctor</a></li>
                    <li><a href="../admin/adminUpatient.php">Patient</a></li>
                    <li><a href="../admin/adminUpharmacist.php">Pharmacist</a></li>
                    <li><a href="../admin/adminUreception.php">Reception</a></li>
                    <li><a href="../admin/adminUmlt.php">MLT</a></li>
                  </ul>
                </li>
                  <li><a href="#DropdownViewUser" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>View Users </a>
                  <ul id="DropdownViewUser" class="collapse list-unstyled ">
                    <li><a href="../admin/viewAdmin.php">Admin</a></li>
                    <li><a href="../admin/viewDoctor.php">Doctor</a></li>
                    <li><a href="../admin/viewPatient.php">Patient</a></li>
                    <li><a href="../admin/viewPharmacist.php">Pharmacist</a></li>
                    <li><a href="../admin/viewReception.php">Reception</a></li>
                    <li><a href="../admin/viewMLT.php">MLT</a></li>
                  </ul>
                </li>
                <li><a href="../admin/sendNotification.php"> <i class="icon-grid"></i>Send Notification </a></li>
                  <li><a href="../admin/viewNotification.php"> <i class="icon-grid"></i>View Send Notification </a></li>
                <li><a href="../admin/contactMessage.php"> <i class="fa fa-bar-chart"></i>Contact Messages </a></li>


              </ul>

            </nav>
    <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                    rightIcon: '<span class="fa fa-caret-down"></span>'
                }
            });
            $('#datepicker2').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                    rightIcon: '<span class="fa fa-caret-down"></span>'
                }

            });
        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
        </script>