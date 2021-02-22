<?php
    session_start();

    include('../connection/connection.php');

    $msg = "";
    if(isset($_GET['deactivate']))
    {
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];

        if($email==$_SESSION['uname']){
            if ($pwd==$_SESSION['pwd']) {
                mysqli_query($con,"Update from user set isDelete = 1 where email=patient_email ");
                $msg ="Your Account is Delete !!";
            }
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
        include('patientDash.php');
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
                    <div class="row margin-top-30">
                        <div class="col-lg-8 col-md-12">        
        <?php 
            $sql=mysqli_query($con,"select * from patient where patient_email='". $_SESSION['patient_email'] ."'");
            while($data=mysqli_fetch_array($sql))
            {
        ?>
        <form role="form" name="edit-profile" method="post">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>E-mail</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="email" class="form-control" reqiured>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Password</strong>
                </label>
                <div class="col-sm-7">
                    <input type="Password" name="pwd" class="form-control" reqiured>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <a href="patient.php">
                            <input type="button" name="back" class="btn btn-success saveBtn" value="Back">
                        </a>
                        <input type="reset" value="Cancel" class="btn btn-success saveBtn">
                        <button type="submit" name="deactivate" class="btn btn-success saveBtn">
                            Deactivate
                        </button>
                    </div>
            </div>
        </form>
        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- body end -->

    <!-- footer start -->
    <?php
       //include('../include/footer.php');
    ?>
    <!-- footer end  -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
   
</body>

</html>

<?php
    mysqli_close($con);
?>