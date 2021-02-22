<!doctype html>
<html>
    <head>
        <title>Arogya | Pharmacist</title>
        <!-- header-start -->
            <?php
                include('../include/header.php');
            ?>
        <!-- header-end -->
    </head>
    <body>    
        <?php
           include('../pharmacist/PharmacistDash.php');
        ?>

        <!-- body start -->
        <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
        </header>
        <!-- Dashboard Counts Section-->
        <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
                <div class="row bg-white has-shadow">

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h2 class="StepTitle">Add Drugs</h2>
                        <p>
                            <a href="AddDrugs.php">Add Drugs</a>
                        </p>
                    </div>
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h2 class="StepTitle">Drug Details</h2>
                        <p>
                            <a href="viewDrugs.php">View Drugs</a>
                        </p>
                    </div>
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h2 class="StepTitle">Manage Drugs</h2>
                        <p>
                            <a href="updateDrug.php">Update Drugs</a>
                        </p>
                    </div>
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h2 class="StepTitle">Notification</h2>                    
                        <p>
                            <a href="view_notification.php">View Notification</a>
                        </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </section>
          <!-- Dashboard Header Section    -->
                          
        <!-- body end -->

        <!-- footer start -->
        <?php
           //include('footer.php');
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
