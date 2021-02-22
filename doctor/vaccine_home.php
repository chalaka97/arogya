<?php
  
  include('../connection/connection.php');

  session_start();
    if(!isset($_SESSION['docter_reg_id'])){
        header("location:../logout.php");
    }

  
  include('vaccine_sms.php');
  include('vaccine_header.php');

$vaccine_c="";
$doctors="";
$pending=0;
$total=0;

    $q_1 ="SELECT COUNT(doctor_reg_id) AS doc FROM doctor ";
    $result_d=mysqli_query($con,$q_1);
    if($result_d){
      $count_d = mysqli_fetch_assoc($result_d);
      $doctors = $count_d['doc'];
    }

    $q_2 ="SELECT COUNT(vaccine_id) AS cou FROM vaxination ";
    $result_v=mysqli_query($con,$q_2);  
    if($result_v){
      $count_v = mysqli_fetch_assoc($result_v);
      $vaccine_c = $count_v['cou'];
    }

    $select_q = "SELECT * FROM vaxination";
    $result=mysqli_query($con,$select_q);
    if($result){
      while($table=mysqli_fetch_assoc($result)){
          $dob = $table['b_date'];
          $state = $table['state'];
          $today = date("Y-m-d");

              if ($state == 0) {
                  $date = $table['vaccine_1'];
                  $next = $table['vaccine_2'];
              }elseif ($state == 1) {
                  $date = $table['vaccine_2'];
                  $next = $table['vaccine_3'];
              }elseif ($state == 2) {
                  $date = $table['vaccine_3'];
                  $next = $table['vaccine_4'];
              }elseif ($state == 3) {
                  $date = $table['vaccine_4'];
                  $next = $table['vaccine_5'];
              }elseif ($state == 4) {
                  $date = $table['vaccine_5'];
                  $next = $table['vaccine_6'];
              }elseif ($state == 5) {
                  $date = $table['vaccine_6'];
                  $next = $table['vaccine_7'];
              }elseif ($state == 6) {
                  $date = $table['vaccine_7'];
                  $next = NULL;
              }else{
                  $date = NULL;
                  $next = NULL;
              }
              
              if (!$date==NULL) {
                $cond = date("Y-m-d",strtotime(date("Y-m-d", strtotime($date)) . "-7 days"));   
                if ($cond < $today) {
                  $pending++;
                }
              }
          }
              
      }

    $select_q2 = "SELECT state FROM vaxination";
    $result_t=mysqli_query($con,$select_q2);
    if ($result_t) {
      while ( $num = mysqli_fetch_assoc($result_t)) {
        $total += $num["state"];
      }
    }
?>
<!doctype html>
<html class="no-js" lang="zxx">
<body>
    
    <!-- header-start -->
<?php
   include('vaccine_dash.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Vaccination status</h2>
            </div>
          </header>

          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row has-shadow" style="background-image: url('img/img02.jpg');">

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class=""></i></div>
                    <div class="title">
                      <span class="text-dark">Total babies</span>
                    </div>
                    <?php echo "<div class=\"number\"><strong>$vaccine_c</strong></div>" ?>
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class=""></i></div>
                    <div class="title">
                      <span class="text-dark">Total Doctors</span>
                    </div>
                    <?php echo "<div class=\"number\"><strong>$doctors</strong></div>" ?> 
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class=""></i></div>
                    <div class="title">
                      <span class="text-dark">Pending Treatments</span>
                    </div>
                   <?php echo "<div class=\"number\"><strong>$pending</strong></div>" ?> 
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class=""></i></div>
                    <div class="title">
                      <span class="text-dark">Total Treatments</span>
                    </div>
                    <?php echo "<div class=\"number\"><strong>$total</strong></div>" ?> 
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div class="container">
              <div class="row">
                <div class="col">
                </div>
              </div>
            </div>
          </section>
<?php
   include('vaccine_footer.php');
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
    <?php
      mysqli_close($con); 
    ?>
</body>

</html>