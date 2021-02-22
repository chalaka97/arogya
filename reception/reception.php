<?php
    
session_start();
  include('../connection/connection.php');
  include('../include/header.php');
  include('../reception/Dashboard.php');
?>

<!doctype html>
    <html class="no-js" lang="zxx">
    <head>
     
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Arogya</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

   
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
     

       
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/owl.carousel.min.css">
        <link rel="stylesheet" href="../css/magnific-popup.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/themify-icons.css">
        <link rel="stylesheet" href="../css/nice-select.css">
        <link rel="stylesheet" href="../css/flaticon.css">
        <link rel="stylesheet" href="../css/gijgo.css">
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/slicknav.css">
        <link rel="stylesheet" href="../css/style.css">

</head>


    
    <body>
       
      <div class="content-inner">
          <header class="page-header">
          </header>
          <!-- Dashboard Counts Section-->

          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
                <div class="row bg-white has-shadow">

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h3 class="StepTitle">Patient Details</h3>
                        <p>
                            <a href="../reception/addpatient.php"><span>Add Patient</span></a>
                        </p>
                    </div>
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h3 class="StepTitle">Patient Details</h3>
                        <p>
                            <a href="../reception/view-patient.php"><span>View Patient</span></a>
                        </p>
                    </div>
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h3 class="StepTitle">Appointment Details</h3>
                        <p>
                            <a href="add-appointment.php"><span>Add Appointment</span></a>
                        </p>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h3 class="StepTitle">Appointment Details</h3>
                        <p>
                            <a href="view-appointment.php"><span>View Appoinment</span></a>
                        </p>
                    </div>
                  </div>
                </div>

          
         
          <!-- Dashboard Header Section    -->
           
            <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="title">
                        <h3 class="StepTitle">Invoice Details</h3>
                        <p>
                            <a href="invoicesearch.php"><span>generate invoice </span></a>
                        </p>
                    </div>
                  </div>
                </div>



              
       
          


    <!-- JS here -->
    <script src="../reception/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../reception/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../reception/assets/js/popper.min.js"></script>
    <script src="../reception/assets/js/bootstrap.min.js"></script>
    <script src="../reception/assets/js/owl.carousel.min.js"></script>
    <script src="../reception/assets/js/isotope.pkgd.min.js"></script>
    <script src="../reception/assets/js/ajax-form.js"></script>
    <script src="../reception/assets/js/waypoints.min.js"></script>
    <script src="../reception/assets/js/jquery.counterup.min.js"></script>
    <script src="../reception/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../reception/assets/js/scrollIt.js"></script>
    <script src="../reception/assets/js/jquery.scrollUp.min.js"></script>
    <script src="../reception/assets/js/wow.min.js"></script>
    <script src="../reception/assets/js/nice-select.min.js"></script>
    <script src="../reception/assets/js/jquery.slicknav.min.js"></script>
    <script src="../reception/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../reception/assets/js/plugins.js"></script>
    <script src="../reception/assets/js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="../reception/assets/js/contact.js"></script>
    <script src="../reception/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="../reception/assets/js/jquery.form.js"></script>
    <script src="../reception/assets/js/jquery.validate.min.js"></script>
    <script src="../reception/assets/js/mail-script.js"></script>

    <script src="../reception/assets/js/main.js"></script>
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



<?php  mysqli_close($con)?>