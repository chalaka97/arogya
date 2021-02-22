<!doctype html>
<html class="no-js" lang="zxx">
<?php
    session_start();
    include('../connection/connection.php');
    include('../include/header.php');
    include('../admin/sms.php');
   
    $success="";
    $not_suc="";
    $mobile = "";
    $email="";
   //var_dump($_SESSION['patientImg']);
    
    if(isset($_SESSION['patientEmail'])){
            $email = $_SESSION['patientEmail'];
            $name = $_SESSION['patientName'];
            $address = $_SESSION['patientAddress'];
            $district = $_SESSION['patientDistrict'];
            $mobile = $_SESSION['patientMobile'];
            $age = $_SESSION['patientAge']; 
            $gender = $_SESSION['patientGender'];
            $blood = $_SESSION['patientBlood'];
            $db_pic_name = $_SESSION['patientPic'];
            $userPwd = $_SESSION['patientPWD'];
            //$picFile = $_SESSION['patientImg'];
            $uploding_folder = "../img/profilePic/";
            //$c= $_SESSION['code'];
            //$pic = $picFile["file"]["name"];
        
            
                 if(isset($_POST["verify"])){
                     
                    $code = $_POST["code"];
                    $encyTypeCode= sha1($code); //ecypted type code here 
                      /*$encyTypeCode= $code; //for testing*/
                     
                    $sentTextCode = getValue();
                     echo "send".$sentTextCode."<br>";
                     echo "ency".$encyTypeCode."<br>";
                      //echo "<script>alert('$c')</script>"; 
                        if($sentTextCode == $encyTypeCode){
                          //echo "<script>alert('$encyTypeCode')</script>"; 
                         
                         $queryRole = "INSERT INTO  patient(patient_email,name,address,district,mobile,age,gender,blood_type,img)
                            VALUES('$email','$name',' $address','$district','$mobile','$age',' $gender','$blood','$db_pic_name')";
                                //var_dump($queryRole);
                                $runR=mysqli_query($con,$queryRole);
                                $queryUser = "INSERT INTO  user(email,pwd,role)
                                            VALUES('$email','$userPwd','patient')";
                                $runU=mysqli_query($con,$queryUser);
                                    if($runR && $runU){
                                       // $Message="Added";
                                       //move_uploaded_file($picFile["file"]["tmp_name"],"$uploding_folder".$pic);
                                        //echo "<script>alert('$uploding_folder $picFile["file"]["name"]')</script>";
                                        $success="block";
                                        $not_suc="none";
                                        header("Refresh:1");
                                        header('location:../login.php');
                                
                                    }
                                    else{
                                        $success="none";
                                        $not_suc="block";
                                        header("Refresh:1");
                                        header('location:../admin/homePatientCreate.php');
                                        }
                                     }
                     else{
                        echo "<script>alert('Error Code Try again!')</script>";
                         /*echo "type code =".$encyTypeCode."<br>";
                         echo "sent code =".$c."<br>";*/
                         
                        }
             
                 }
                
            }
            else{
              header('location:../admin/homePatientCreate.php');
            }
       

        
    
?>
<style>
    .alert{display: none;}
</style>

<body>
        <!-- header-start -->
    <header>
        <div class="header-area ">
           <div class="header-top_area">
               
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo1.png" alt="arogya" height = "100px" weight = "100px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">home</a></li>
                                        <li><a href="Department.html">Department</a></li>
                                       
                                       
                                        <li><a href="Doctors.html">Doctors</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                            <?php
                                if(empty($_SESSION["uname"])){
                                ?>
                                <div class="book_btn d-none d-lg-block">
                                    <a class="" href="../admin/homePatientCreate.php">Patient Register</a>
                                     <!--<a class="popup-with-form" href="#test-form">Patient Register</a>-->          
                                </div>
                                <div class="book_btn d-none d-lg-block">
                                    <a class="" href="../loginui.php">Login</a>
                                     <!--<a class="popup-with-form" href="#test-form">Patient Register</a>-->          
                                </div>
                                <?php  }else{ ?>
                                <ul class="btn myclzBtn">
                                        <li class="nav-item submenu dropdown">
                                            <a href="loginui" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                               aria-expanded="false"><?php if(!empty($_SESSION["role"])){echo $_SESSION["role"];}?></a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a class="nav-link" href="login.html">Profile</a></li>
                                                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                                                
                                            </ul>
                                        </li>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
      <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Patient Verification</h3>
                        <p><a href="../index.php">Home /</a><a href="../admin/homePatientCreate.php">Register /</a>Patient Verification </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
    <div class="container">
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Patient Validate </h2>
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                            <a href="viewPatient.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i>  Patient List</button></a>
                            <br><hr><br>
                            <!-- Form -->
                            <form method ="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-7">
                                         <div class="alert alert-primary" style="display:<?php echo $success;?>">
                                          Successfully Created
                                        </div>
                                        <div class="alert alert-danger" style="display:<?php echo $not_suc;?>">
                                          Incorrect Code!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-7 col-form-label"><strong>Validation Code has been sent to your <?php echo $mobile?> Please enter the code below to verify your account. </strong></label>
                                    
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Code <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="code" id="code" placeholder="XXXX" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        <input type ="reset" name="reset" value ="Reset" class="btn btn-danger registerBtn">
                                        <input type ="submit" name="verify" value ="Verify" class="btn btn-success registerBtn" data-toggle="modal" data-target="#exampleModalCenter">
                                    </div>
                                </div>  
                            </form>
                         


                        </div>
                    </div>
            </div>
        </div>
        </div>
        
       
          
<!--end code-->
    
<!-- footer start -->

<!-- footer end  -->
 
    
    <!-- form itself end -->

    <!-- JS here -->
    

    <!-- JS here -->
    <script src="../js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/ajax-form.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/scrollIt.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/nice-select.min.js"></script>
    <script src="../js/jquery.slicknav.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="../js/contact.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.form.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/mail-script.js"></script>

    <script src="../js/main.js"></script>
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
</body>

</html>