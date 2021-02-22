<!doctype html>
<html class="no-js" lang="zxx">
 <?php
    session_start();
    $Message = "";
    $success="none";
    $not_suc="none";
    include('../include/header.php');
    include('../connection/connection.php');
    
    if(isset($_POST["submit"])){
        $reg_id = $_POST["reg_id"];
        $email = $_POST["email"];
        $name = "Dr.".$_POST["fullName"];
        $specialization =$_POST["specialization"];
        $mobile = $_POST["mobile"];
        $address = $_POST["address"];
        $pass = $_POST["pass"];
        $conPass = $_POST["conPass"];
        $amount = $_POST["amount"];
        $pic = $_FILES["file"]["name"];
        
        $uploding_folder = "../img/profilePic/";
        
        move_uploaded_file($_FILES["file"]["tmp_name"],"$uploding_folder".$pic);
        $db_pic_name= $uploding_folder.$pic;
        //echo $db_pic_name;
        
        if($pass==$conPass){
            $userPwd=sha1($conPass);
            $queryRole = "INSERT INTO  doctor(doctor_reg_id,doctor_email,name,specialization,mobile,address,amount,img)
                VALUES('$reg_id','$email','$name',' $specialization','$mobile','$address','$amount',' $db_pic_name')";

            $runR=mysqli_query($con,$queryRole);

            $queryUser = "INSERT INTO  user(email,pwd,role)
                VALUES('$email','$userPwd','doctor')";

            $runU=mysqli_query($con,$queryUser);
		
                if($runR && $runU){
                 
                   // $Message="Added";
                    $success="block";
                    $not_suc="none";

                }
                else{
                   
                    $success="none";
                    $not_suc="block";
                }
        }
        else{
            $success="none";
            $not_suc="block";
            $Message= "password incorrect";
        }
    }
?>


<body>
    
    <!-- header-start -->
        <?php
   include('../admin/adminDash.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Create Doctor</h2>
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                            <a href="viewDoctor.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i>  Doctor List</button></a>
                            <br><hr><br>
                            <!-- Form -->
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-7">
                                        <div class="alert alert-primary" style="display:<?php echo $success;?>">
                                          Successfully Created
                                        </div>
                                        <div class="alert alert-danger" style="display:<?php echo $not_suc;?>">
                                            <?php echo $Message;?>
                                            Error Occure Try Again!
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Registration ID <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="reg_id" id="reg_id" placeholder="Registration ID" required>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Email Address <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Full Name <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Specialization <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="specialization" required>
                                            <option value = "webtcr">WEB TCR</option>
                                            <option value = "vaxination">Vaxination</option>
                                            <option value = "physicaltherapy">Physical Therapy</option>
                                            <option value = "counseling">Counseling</option>
                                            <option value = "opd">OPD</option>
                                            <option value = "pediatrician">Pediatrician</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Mobile No <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile No 07********" pattern="0[0-9]{9}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Address <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="textarea" class="form-control" name="address" id="address" placeholder="address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Password <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Re-enter Password <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="conPass" id="conPass" placeholder="Re-enter Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Amount <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control" name="amount" id="amount" placeholder="amount in ruppes" required>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Upload Your Image <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                     <div class="col-sm-7">
                                    <input type="file" name="file" class="" id="image" required>
                                    </div>
                                </div>
                                
                               
                                
                                
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        <input type ="reset" name="reset" value ="Reset" class="btn btn-danger registerBtn">
                                        <input type ="submit" name="submit" value ="Register" class="btn btn-success registerBtn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        
        
       
          
<!--end code-->
    
<!-- footer start -->
<?php
   include('../include/footer.php');
?>
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
    </script>
</body>

</html>