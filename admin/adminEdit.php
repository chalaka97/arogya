<?php

    session_start();
    include('../connection/connection.php');
    include('../include/header.php');

$admId=$_SESSION['admin_id'];
$admName = $_SESSION['admin_name'];
$admMobile= $_SESSION['admin_mobile'];
$Message;
$db_pic_name = $_SESSION['admin_image'];
$success="none";
$not_suc="none";
//update part here

if(isset($_POST["save"])){

        $name = $_POST["admFullName"];
        $email = $_POST["admEmail"];
        $CurrentPass = $_POST["CurrentPass"];
        $NewPass = $_POST["NewPass"];
        $conPass = $_POST["conPass"];
        $mobile = $_POST["admMobile"];
        $pic = $_FILES["file"]["name"];

        $uploding_folder = "../img/profilePic/";
        
        move_uploaded_file($_FILES["file"]["tmp_name"],"$uploding_folder".$pic);
        $db_pic_name= $uploding_folder.$pic;
        //Select Query here
    
        $selectQuA = "SELECT * FROM user WHERE email = '$email'";

        $runQA=mysqli_query($con,$selectQuA);

         if($runQA){
            while($data=mysqli_fetch_assoc($runQA)){
            
            $Password=$data["pwd"];
            
            }
        //select Query end
    
        //check password correct
               $encyptedCuurentPw = sha1($CurrentPass);
        //end check pass
               if($Password==$encyptedCuurentPw) {
                   if($NewPass==$conPass){
                    $userPwd=sha1($conPass);
                    $queryAdminUpdate = "UPDATE admin SET name='$name',mobile='$mobile',img='$db_pic_name' WHERE admin_email='$email'";

                    $runR=mysqli_query($con,$queryRole);

                    $queryUser = "UPDATE user SET pwd='$userPwd' WHERE email='$email'";

                    $runU=mysqli_query($con,$queryUser);

                        if($runR && $runU){

                            $success="block";
                            $not_suc="none";


                        }
                        else{
                            $success="none";
                            $not_suc="block";

                        }
                }
                else{
                            $Message="Password Does not Match";
                            $success="none";
                            $not_suc="block";

                }
                   
               }
                
        else{
            $success="none";
            $not_suc="block";
            $Message= "Current password incorrect";
        }
    
    }
}
//update part end

?>
<!doctype html>
<html class="no-js" lang="zxx">
      <head>
      <style>
          .custome_width{
              width: 100%;
              
          }
      
    </style>
  </head>
<body>
    
    <!-- header-start -->
<?php
   include('../admin/adminDash.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Admin Edit Profile</h2>
            </div>
          </header>
            <br>
            <br>
            <div class="container">
            <div class="row">
            <div class="col-md-12">
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
                                    <label class="col-sm-3 col-form-label"><strong>Full Name <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="admFullName" id="fullName" value="<?php echo $admName?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Email Address <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control" name="admEmail" id="email" value="<?php echo $_SESSION['admin_email']?>" disabled>
                                    </div>
                                </div>
                     
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Mobile No <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control" name="admMobile" id="mobile" value="<?php echo $admMobile?>" pattern="0[0-9]{9}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Current Password <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="CurrentPass" id="CurrentPass" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>New Password <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="NewPass" id="NewPass" placeholder="New Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Re-enter Password <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" name="conPass" id="conPass" placeholder="Re-enter Password" required>
                                    </div>
                                </div>
                               
                                 <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Upload Your Image <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                     <div class="col-sm-7">
                                    <input type="file" name="file" class="" id="image">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        
                                        <input type ="submit" name="Save" value ="Save Changes" class="btn btn-success registerBtn">
                                    </div>
                                </div>
                            </form>
            </div>
            </div>
            </div>
            <div  ><?php include('../include/footer.php'); ?>  </div>
          
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
