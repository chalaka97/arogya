<?php
session_start();
include("connection/connection.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pharmacist | View Notifications</title>
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

        <!-- body-start -->
        <div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">View notification</h2>
                </div>
            </header>
            <div class="col-md-12 form">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">   

<table class="table table-hover" id="sample-table-1">
    <thead>
    <tr>
        <th class="center">Notifications</th>
        
        
    </tr>
    </thead>
<tbody>
    <?php echo $table_d; ?>
</tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        <!-- body-end -->

        <!-- footer start -->
        <?php
            //include('include/footer.php');
        ?>
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