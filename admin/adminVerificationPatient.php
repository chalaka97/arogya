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
                    //$encyTypeCode= sha1($code); //ecypted type code here 
                      /*$encyTypeCode= $code; //for testing*/
                     
                    $sentTextCode = getValue();
//                     echo "send".$sentTextCode."<br>";
//                     
                      //echo "<script>alert('$c')</script>"; 
                        if($sentTextCode == $code){
                          //echo "<script>alert('$encyTypeCode')</script>"; 
                         
                         $queryRole = "INSERT INTO  patient(patient_email,name,address,district,mobile,age,gender,blood_type,img)
                            VALUES('$email','$name',' $address','$district','$mobile','$age',' $gender','$blood','$db_pic_name')";
                                //var_dump($queryRole);
                                $runR=mysqli_query($con,$queryRole);
                                $queryUser = "INSERT INTO  user(email,pwd,role)VALUES('$email','$userPwd','patient')";
                                $runU=mysqli_query($con,$queryUser);
                                    if($runU && $runR){
                                       // $Message="Added";
                                       //move_uploaded_file($picFile["file"]["tmp_name"],"$uploding_folder".$pic);
                                        //echo "<script>alert('$uploding_folder $picFile["file"]["name"]')</script>";
                                        $success="block";
                                        $not_suc="none";
                                        header("refresh: 1");
//                                        header('location:../admin/adminUpatient.php');
                                
                                    }
                                    else{
                                        $success="none";
                                        $not_suc="block";
                                        header("Refresh:2");
                                        header('location:adminUpatient.php');
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
               header('location:../admin/adminUpatient.php');
            }
       

        
    
?>
<style>
    .alert{display: none;}
</style>

<body>
    
    <!-- header-start -->
        <?php
   include('../admin/adminDash.php');
?>
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