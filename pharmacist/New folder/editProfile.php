<?php
    session_start();
    include('../connection/connection.php');

    $msg="";
    if(isset($_POST['submit']))
    {
    	$regid=$_POST['rid'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
      

        $sql=mysqli_query($con,"Update pharmacist set  name='$name', pharmacist_email='$email',mobile='$mobile' where pharmacist_email='". $_SESSION['pharmacist_email'] ."'"); //$_SESSION['id']
        //$_SESSION['msg']="Your Profile updated Successfully !!";

        if($sql)
        {
            $msg="Your Profile updated Successfully !!";

        }
        else{
            $msg="Unable to update Your profile";
        }
    }
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <title>Arogya | Edit Profile</title>
    <?php
        include('../include/header.php');
    ?>
</head>
<body>   
    <!-- header-start -->
    <?php
        include('../pharmacist/PharmacistDash.php');
    ?>
    <!-- header-end -->

    <br><br>

    <!-- body start -->
    <div class="container p-0">
        <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Edit Profile</h2>
            </div>
        </header>
        <div class="col-md-12 form">
            <div class="row no-gutters">
                <div class="col-md-12">
                <?php echo "<font color='green'>".$msg."</font>"."<br>"."<br>"; ?>
                    <div class="row margin-top-30">
                        <div class="col-lg-8 col-md-12">        
        <?php 
            $sql=mysqli_query($con,"select * from pharmacist where pharmacist_email='". $_SESSION['pharmacist_email'] ."'");
            //$_SESSION['id']
            while($data=mysqli_fetch_array($sql))
            {
        ?>
        <h4 class="text-center">
            <?php echo ($data['name']);?>'s Profile
        </h4>
        
        <?php echo ($_SESSION['msg']="");?>                              
        <form role="form" name="edit-profile" method="post">
        	<div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Registration ID<sup></i></sup></strong>
                </label>
                <div class="col-sm-7">
                    <input readonly type="text" name="rid" class="form-control"  value="<?php echo ($data['pharmacist_reg_id']);?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Pharamacist Name</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="name" class="form-control" value="<?php echo ($data['name']);?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Pharamacist Email<sup></i></sup></strong>
                </label>
                <div class="col-sm-7">
                      <input type="email" name="email" class="form-control" value="<?php echo ($data['pharmacist_email']);?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Contact No<sup></i></sup></strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="mobile" placeholder="07********" class="form-control" value="<?php echo ($data['mobile']);?>" maxlength="10" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <button type="submit" name="submit" class="btn btn-success saveBtn">
                            Update</button>
                        
                    </div>
            </div>
        </form>
        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
       include('../include/footer.php');
    ?>
    </div>
</div>

    <!-- body end -->

    <!-- footer start -->
    
    <!-- footer end  -->
    
    <!-- JS here -->
    <script src="../pharmacist/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../pharmacist/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../pharmacist/assets/js/popper.min.js"></script>
    <script src="../pharmacist/assets/js/bootstrap.min.js"></script>
    <script src="../pharmacist/assets/js/owl.carousel.min.js"></script>
    <script src="../pharmacist/assets/js/isotope.pkgd.min.js"></script>
    <script src="../pharmacist/assets/js/ajax-form.js"></script>
    <script src="../pharmacist/assets/js/waypoints.min.js"></script>
    <script src="../pharmacist/assets/js/jquery.counterup.min.js"></script>
    <script src="../pharmacist/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../pharmacist/assets/js/scrollIt.js"></script>
    <script src="../pharmacist/assets/js/jquery.scrollUp.min.js"></script>
    <script src="../pharmacist/assets/js/wow.min.js"></script>
    <script src="../pharmacist/assets/js/nice-select.min.js"></script>
    <script src="../pharmacist/assets/js/jquery.slicknav.min.js"></script>
    <script src="../pharmacist/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../pharmacist/assets/js/plugins.js"></script>
    <script src="../pharmacist/assets/js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="../pharmacist/assets/js/contact.js"></script>
    <script src="../pharmacist/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="../pharmacist/assets/js/jquery.form.js"></script>
    <script src="../pharmacist/assets/js/jquery.validate.min.js"></script>
    <script src="../pharmacist/assets/js/mail-script.js"></script>

    <script src="../pharmacist/assets/js/main.js"></script>
</body>

</html>
<?php mysqli_close($con)?>