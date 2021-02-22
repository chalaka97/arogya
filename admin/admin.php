<?php
    session_start();
    include('../connection/connection.php');
    include('../include/header.php');

$totPatients="";
$totDoctors="";
$totAppoinment="";
$totIncome="";
$todayAppointment = "0";
$todayDoneAppointment = "0";
$todayToDoAppointment = "0";
$smsBalance = "0";
$totWeb = "0";
$totVax = "0";
$totPhy = "0";
$totCon = "0";
$totOPD = "0";
$totCash = "0";
$totCard = "";

    $docQuery ="SELECT COUNT(doctor_reg_id) AS doc FROM doctor ";
    $runDoc=mysqli_query($con,$docQuery);
       
        if($runDoc){
            $runCountDoc = mysqli_fetch_assoc($runDoc);
            $totDoctors = $runCountDoc['doc'];
        }
        else{
            
             $totDoctors = "Err";
        }


    $patQuery ="SELECT COUNT(patient_id) AS patient FROM patient ";
    $runPat=mysqli_query($con,$patQuery);
       
        if($runPat){
            $runCountPat = mysqli_fetch_assoc($runPat);
            $totPatients = $runCountPat['patient'];
        }
        else{
            
             $totPatients = "Err";
        }


    $amoQuery ="SELECT SUM(amount) As income FROM payment";
    $runAmo=mysqli_query($con,$amoQuery);
       
        if($runAmo){
            $runCountAmo = mysqli_fetch_assoc($runAmo);
            $totIncome = $runCountAmo['income'];
        }
        else{
            
             $totIncome = "Err";
        }

    $appQuery ="SELECT COUNT(appointment_id) AS appointment FROM appointment ";
    $runApp=mysqli_query($con,$appQuery);
       
        if($runApp){
            $runCountApp = mysqli_fetch_assoc($runApp);
            $totAppoinment = $runCountApp['appointment'];
        }
        else{
            
             $totAppoinment = "Err";
        }
    $smsBalance = file_get_contents("http://www.textit.biz/creditchk/index.php?id=94771712924&pw=2461");

$totAppoinment
?>
<!doctype html>
<html class="no-js" lang="zxx">
      <head>
      <style>
          .custome_width{
              width: 100%;
              
          }
      
      </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
        <?php 
    //===========================WEB TCR==============================================//
            $countWeb ="SELECT COUNT(specialization) AS web FROM appointment WHERE specialization ='webtcr' ";
            $runWeb=mysqli_query($con,$countWeb);
       
                if($runWeb){
                    $runCountWeb = mysqli_fetch_assoc($runWeb);
                    $totWeb = $runCountWeb['web'];
                }
                else{

                     $totWeb = "0";
                }
        //===============================Vaxination======================================//
            $countVax ="SELECT COUNT(specialization) AS vaxination FROM appointment WHERE specialization ='vaxination' ";
            $runVax=mysqli_query($con,$countVax);
       
                if($runVax){
                    $runCountVax = mysqli_fetch_assoc($runVax);
                    $totVax = $runCountVax['vaxination'];
                }
                else{

                     $totVax = "0";
                }
        //===============================Physical Therapy======================================//
            $countPhy ="SELECT COUNT(specialization) AS physicaltherapy FROM appointment WHERE specialization ='physicaltherapy' ";
            $runPhy=mysqli_query($con,$countPhy);
       
                if($runPhy){
                    $runCountPhy = mysqli_fetch_assoc($runPhy);
                    $totPhy = $runCountPhy['physicaltherapy'];
                }
                else{

                     $totPhy = "0";
                }

        //===============================Counseling======================================//
            $countCon ="SELECT COUNT(specialization) AS counseling FROM appointment WHERE specialization ='counseling' ";
            $runCon=mysqli_query($con,$countCon);
       
                if($runCon){
                    $runCountCon = mysqli_fetch_assoc($runCon);
                    $totCon = $runCountCon['counseling'];
                }
                else{

                     $totCon = "0";
                }
        //===============================opd======================================//
            $countOPD ="SELECT COUNT(specialization) AS opd FROM appointment WHERE specialization ='opd' ";
            $runOPD=mysqli_query($con,$countOPD);
       
                if($runOPD){
                    $runCountOPD = mysqli_fetch_assoc($runOPD);
                    $totOPD = $runCountOPD['opd'];
                }
                else{

                     $totOPD = "0";
                }
        ?>
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Type', 'Appointment Count'],
          ['WEB TCR',     <?php echo $totWeb?>],
          ['Vaxination',      <?php echo $totVax?>],
          ['Physical Therapy',  <?php echo $totPhy?>],
          ['Counseling', <?php echo $totCon?>],
          ['OPD',    <?php echo $totOPD?>]
    
        ]);

        var options = {
          title: 'Appointment',
          pieHole: 0.5,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
        
        
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);
        
        //time chart//
        
        <?php
        //time 7.30 8.30 //
            $countOne ="SELECT COUNT(time) AS one FROM appointment WHERE time =1 ";
            $runOne=mysqli_query($con,$countOne);
       
                if($runOne){
                    $runCountOne = mysqli_fetch_assoc($runOne);
                    $totOne= $runCountOne['one'];
                }
                else{

                     $totOne = "0";
                }
           //time 9.00 10.00//
            $countTwo ="SELECT COUNT(time) AS two FROM appointment WHERE time =2 ";
            $runTwo=mysqli_query($con,$countTwo);
       
                if($runTwo){
                    $runCountTwo = mysqli_fetch_assoc($runTwo);
                    $totTwo= $runCountTwo['two'];
                }
                else{

                     $totTwo = "0";
                }
           //time 10.30 11.30//
            $countTh ="SELECT COUNT(time) AS three FROM appointment WHERE time =3 ";
            $runTh=mysqli_query($con,$countTh);
       
                if($runTh){
                    $runCountTh = mysqli_fetch_assoc($runTh);
                    $totTh= $runCountTh['three'];
                }
                else{

                     $totTh = "0";
                }
           //time 12.00 1.00//
            $countFour ="SELECT COUNT(time) AS four FROM appointment WHERE time =4 ";
            $runFour=mysqli_query($con,$countFour);
       
                if($runFour){
                    $runCountFour = mysqli_fetch_assoc($runFour);
                    $totFour= $runCountFour['four'];
                }
                else{

                     $totFour = "0";
                }
           //time 1.30 2.30//
            $countFive ="SELECT COUNT(time) AS five FROM appointment WHERE time =5 ";
            $runFive=mysqli_query($con,$countFive);
       
                if($runFive){
                    $runCountFive = mysqli_fetch_assoc($runFive);
                    $totFive= $runCountFive['five'];
                }
                else{

                     $totFive = "0";
                }
           //time 3.00 4.00//
            $countSix ="SELECT COUNT(time) AS six FROM appointment WHERE time =6 ";
            $runSix=mysqli_query($con,$countSix);
       
                if($runSix){
                    $runCountSix = mysqli_fetch_assoc($runSix);
                    $totSix= $runCountSix['six'];
                }
                else{

                     $totSix = "0";
                }
           //time 4.30 5.30//
            $countSev ="SELECT COUNT(time) AS seven FROM appointment WHERE time =7 ";
            $runSev=mysqli_query($con,$countSev);
       
                if($runSev){
                    $runCountSev = mysqli_fetch_assoc($runSev);
                    $totSev= $runCountSev['seven'];
                }
                else{

                     $totSev = "0";
                }
        
        ?>
    
function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Number of Appointment');

      data.addRows([
        [{v: [7, 30, 0], f: '7.30 am'}, <?php echo $totOne?>],
        [{v: [9, 0, 0], f: '9.00 am'}, <?php echo $totTwo?>],
        [{v: [10, 30, 0], f:'10.30 am'}, <?php echo $totTh?>],
        [{v: [12, 0, 0], f: '12.00 pm'}, <?php echo $totFour?>],
        [{v: [13, 30, 0], f: '1.30 pm'}, <?php echo $totFive?>],
        [{v: [15, 0, 0], f: '3.00 pm'}, <?php echo $totSix?>],
        [{v: [16, 30, 0], f: '4.30 pm'}, <?php echo $totSev?>],
  
        
      ]);

      var options = {
        title: 'Appointment Peak Level',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 00, 0],
            max: [18, 00, 0]
          }
        },
        vAxis: {
          title: 'Number of Appointment'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
        
   // payment
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChartPayment);
      
        
      function drawChartPayment() {
            
        <?php
            $countCash ="SELECT COUNT(payment_type) AS cash FROM payment WHERE payment_type ='cash' ";
            $runCash=mysqli_query($con,$countCash);
       
                if($runCash){
                    $runCountCash = mysqli_fetch_assoc($runCash);
                    $totCash = $runCountCash['cash'];
                    //echo "<script>alert('$totCash')</script>"; 
                }
                else{

                     $totCash = "0"; //
                }
           //====================================== card ==================
            $countCard ="SELECT COUNT(payment_type) AS card FROM payment WHERE payment_type ='card' ";
            $runCard=mysqli_query($con,$countCard);
       
                if($runCard){
                    $runCountCard = mysqli_fetch_assoc($runCard);
                    $totCard = $runCountCard['card'];
                    //echo "<script>alert('$totCash')</script>"; 
                }
                else{

                     $totCard = "0"; //
                }
          ?>
        var dataPayment = google.visualization.arrayToDataTable([
          ['Type', 'Payment Types'],
          ['Cash',     <?php echo $totCash?>],
          ['Card',      <?php echo $totCard?>],

        ]);

        var optionsPayment = {
          title: 'Payments',
          pieHole: 0.0,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchartPayment'));
        chart.draw(dataPayment, optionsPayment);
      }
        
        
    </script>
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
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>Total Patients</span>
                     
                    </div>
                    <?php echo "<div class=\"number\"><strong>$totPatients</strong></div>" ?> 
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Total Doctors</span>
                      <!--<div class="progress">
                        <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>-->
                    </div>
                    <?php echo "<div class=\"number\"><strong>$totDoctors</strong></div>" ?> 
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>Total<br>Income</span>
                     
                    </div>
                   <?php echo "<div class=\"number\"><strong>$totIncome</strong></div>" ?> 
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-check"></i></div>
                    <div class="title"><span>Total<br>Appoinment</span>
                     
                    </div>
                      <?php echo "<div class=\"number\"><strong>$totAppoinment</strong></div>" ?> 
                 
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Dashboard Header Section    -->
            <center>
          <section class="dashboard-header">
            <div class="container-fluid">
              <div class="row">
                <!-- Statistics -->
                <div class="statistics col-lg-3 col-12">
<!--
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-red"><i class="fa fa-book"></i></div>
                    <div class="text"><strong><?php echo $todayAppointment ?></strong><br><small>Today Total Appointments</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-green"><i class="fa fa-check-circle-o"></i></div>
                    <div class="text"><strong><?php echo $todayDoneAppointment ?></strong><br><small>Today Done Appointments</small></div>
                  </div>
                  <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
                    <div class="text"><strong><?php echo $todayToDoAppointment ?></strong><br><small>To Do Appointments list</small></div>
                  </div>
-->
                    <div class="statistic d-flex align-items-center bg-white has-shadow">
                    <div class="icon bg-violet"><i class="fa fa-paper-plane-o"></i></div>
                    <div class="text"><strong><?php echo $smsBalance ?></strong><!--<a href="http://www.textit.biz/creditchk/index.php?id=94771712924&pw=2461" target="_blank">--><br><small>SMS Gateway Balance<!--</a>--></small></div>
                  </div>
                        <!-- Payment Chart here-->
                    <div class="row">
                    <div class="chart col-lg-12">
                        <!-- Bar Chart   -->
                        <div class="bar-chart has-shadow bg-white">
                            <div id="donutchartPayment" style="height: 280px;"></div>
                        </div>
                                              

                    </div>
<!--
                    <div class="chart col-lg-5">
                         Bar Chart   
                        <div class="bar-chart has-shadow bg-white">
                            <div id="donutchartPayment" style="height: 380px;"></div>
                        </div>
                                              

                    </div>
-->
                   
                    </div>
                    
<!--                    end payment chart-->
                    
                </div>
               
                
                <div class="chart col-lg-5">
                  <!-- Bar Chart   -->
                  <div class="bar-chart has-shadow bg-white">
                    <div id="donutchart" style="width: 500px; height: 380px;"></div>
                  </div>
                  
                  
                </div>
                  <div class="col-lg-4">
                  <div class="overdue card">
                    
                    <div class="card-body">
                      <h3>Appointment Time</h3><small>Sri lanka Time Zone</small>
                     <div id="chart_div" class="custome_width" style="width: auto; height: 280px;"></div>
                    </div>
                  </div>
                </div>
                   
              </div>
                
              </div>
          </section>
                
                <!-- new here-->
        <section class="dashboard-header no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="chart col-lg-4 col-16">
                        <!-- Bar Chart   -->
                        <div class="bar-chart has-shadow bg-white">
                            <div id="donutchartPayment"></div>
                        </div>
                                              

                    </div>
                  <div class="chart col-lg-4 col-16">
                        <!-- Bar Chart   -->
                        <div class="bar-chart has-shadow bg-white">
                            <div id="donutchartPayment" ></div>
                        </div>
                                              

                    </div>
                   
              </div>
            </div>
          </section>
                <!--new end here-->
            </center>

       
          
<!--end code-->
<!-- footer start -->
<?php include('../include/footer.php'); ?>

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
