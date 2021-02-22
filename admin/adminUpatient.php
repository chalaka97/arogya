<!doctype html>

<?php
    session_start();
    include('../connection/connection.php');
    include('../include/header.php');
    include('../admin/sms.php');
   
    $success="none";
    $not_suc="none";
    
    $Message = "";

   
    $preID = "SELECT patient_id FROM patient ORDER BY patient_id desc LIMIT 1";
    $runPre = mysqli_query($con,$preID);
        if (mysqli_num_rows($runPre) > 0) {
          
          while($row = mysqli_fetch_assoc($runPre)) {
            $id = $row["patient_id"];
            $preID = $id+1;
          }
        } else {
          echo "0 results";
        }
    
    
    if(isset($_POST["submit"])){
       
        //========================
        $_SESSION['patientEmail']=$email = $_POST["email"];
        $_SESSION['patientName']=$name = $_POST["fullName"];
        $_SESSION['patientAddress']=$address = $_POST["address"];
        $_SESSION['patientDistrict']=$district =$_POST["district"];
        $_SESSION['patientMobile']=$mobile = $_POST["mobile"];
        $_SESSION['patientAge'] = $age = $_POST["age"]; 
        $_SESSION['patientGender']=$gender = $_POST["gender"];
        $_SESSION['patientBlood']=$blood = $_POST["blood"];
        $pass = $_POST["pass"];
        $conPass = $_POST["conPass"];
        $picName = $_FILES['fileImage']['name'];
        $uploding_folder = "../img/profilePic/";
         $_SESSION['patientPic']=$db_pic_name = $uploding_folder.$picName;
        
        $is_email="SELECT * FROM user WHERE email='$email'";
        $resu=mysqli_query($con,$is_email);
        
        if($resu){
            if(mysqli_num_rows($resu)>0){
                $success="none";
                $not_suc="block";
                $Message= "Patient alrady Created";
            }else{
            
                if($pass==$conPass){
                    $_SESSION['patientPWD']=$userPwd=sha1($conPass);
                    smsVerification($mobile,$email);
                        $_SESSION['code'] = getValue();
                    header('location:../admin/adminVerificationPatient.php');

                } 
                else{
                   //$Message= "password incorrect";
                     $success="none";
                     $not_suc="block";
                }
            }
        }else{
//            $success="none";
//            $not_suc="block";
//            $Message= "Patient alrady Created";
        }
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
              <h2 class="no-margin-bottom">Create Patient</h2>
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                            <a href="viewPatient.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i>  Patient List</button></a>
                            <br><hr><br>
                            <!-- Form -->
                            <form method ="post" enctype="multipart/form-data" id="form_id">
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
                                    <label class="col-sm-3 col-form-label"><strong>Patient ID <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                   
                                    <div class="col-sm-3">
                                        <?php
                                        echo "<input type=\"text\" class=\"form-control\" name=\"pre_petient_id\" id=\"petient_id\" value= $preID placeholder=\"Patient ID\" disabled>";
                                            ?>
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
                                    <label class="col-sm-3 col-form-label"><strong>Address <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>District <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="district" required>
                                            
                                            <option value="Gampaha">Gampaha</option> 
                                            <option value="Colombo">Colombo</option> 
                                            <option value="Kalutara">Kalutara</option> 
                                            <option value="Kandy">Kandy</option> 
                                            <option value="Kegalle">Kegalle</option>
                                            <option value="Jaffna">Jaffna</option> 
                                            <option value="Kilinochchi">Kilinochchi</option> 
                                            <option value="Mannar">Mannar</option> 
                                            <option value="Mullaitivu">Mullaitivu</option> 
                                            <option value="Vavuniya">Vavuniya</option> 
                                            <option value="Puttalam">Puttalam</option> 
                                            <option value="Kurunegala">Kurunegala</option> 
                                            <option value="Polonnaruwa">Polonnaruwa</option> 
                                            <option value="Anuradhapura">Anuradhapura</option>
                                            <option value="Matale">Matale</option> 
                                            <option value="Nuwara Eliya">Nuwara Eliya</option> 
                                            <option value="Ratnapura">Ratnapura</option> 
                                            <option value="Trincomalee">Trincomalee</option> 
                                            <option value="Batticaloa">Batticaloa</option>
                                            <option value="Ampara">Ampara</option> 
                                            <option value="Badulla">Badulla</option>
                                            <option value="Monaragala">Monaragala</option> 
                                            <option value="Hambantota">Hambantota</option> 
                                            <option value="Matara">Matara</option> 
                                            <option value="Galle">Galle</option> 
                                            
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Mobile No <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-3">
                                        <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Mobile No 07********" pattern="0[0-9]{9}" required>
                                    </div>
                             
                                    <label class="col-sm-2 col-form-label"><strong>Age <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-2">
                                        <input type="tel" class="form-control" name="age" id="age" placeholder="age" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Gender <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="gender" required>
                                            
                                             <option value="Male">Male</option> 
                                            <option value="Female">Female</option> 
                                                  </select>
                                    </div>
                                    <label class="col-sm-2 col-form-label"><strong>Blood Type <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="blood" required>
                                           
                                            <option value="A+">A+</option> 
                                            <option value="A-">A-</option> 
                                            <option value="B+">B+</option> 
                                            <option value="B-">B-</option> 
                                            <option value="AB+">AB+</option> 
                                            <option value="AB-">AB-</option> 
                                            <option value="O+">O+</option> 
                                            <option value="O-">O-</option> 
                                                  </select>
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
                                        <input type="password" class="form-control" name="conPass" id="rePass" placeholder="Re-enter Password" required>
                                    </div>
                                </div>
                               
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Upload Your Image <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                     <div class="col-sm-7">
                                    <input type="file" name="fileImage" class="" id="image" required>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        <input type ="reset" name="reset" value ="Reset" class="btn btn-danger registerBtn">
                                        <input type ="submit" name="submit" id="sumbit_btn" value ="Register" class="btn btn-success registerBtn">
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
    </div>            
<!-- footer end  -->

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