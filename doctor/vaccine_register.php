<!DOCTYPE html>
<html class="no-js" lang="en">
  <?php
    
    include('../connection/connection.php');

    session_start();
    if(!isset($_SESSION['doctor_reg_id'])){
        header("location:../logout.php");
    }

    include('vaccine_sms.php');
    include('vaccine_header.php');

    function pIdOf($idof,$con) {

        $out="Empty";
        $select_c = "SELECT * FROM patient WHERE patient_id ='$idof'";
        $result_c=mysqli_query($con,$select_c);
        if($result_c){
            
          $res = mysqli_fetch_assoc($result_c);
          $out = $res['patient_id'];
        }else{
            echo "Query Failed <br>";
        }
        return $out;
        }

    function dIdOf($idof,$con) {

        $out="Empty";
        $select_c = "SELECT * FROM doctor WHERE doctor_reg_id ='$idof'";
        $result_c=mysqli_query($con,$select_c);
        if($result_c){
            
          $res = mysqli_fetch_assoc($result_c);
          $out = $res['doctor_reg_id'];
        }else{
            echo "Query Failed <br>";
        }
        return $out;
    }

    if(isset($_POST["reg_baby"])){

        //$vaccineId = $_POST['vaccineId'];
        $doctorId = $_POST['doctorId'];
        $patientId = $_POST['patientId'];
        $babyName = $_POST['babyName'];
        $babyGender = $_POST['gender'];

        if (strcmp($babyGender,"Male") == 0) {
          $babyGender = "M";
        }else if (strcmp($babyGender,"Female") == 0){
          $babyGender = "F";
        }else{
          $babyGender = NULL;
        }

        echo "$babyGender";

        $dob = $_POST['dob'];
        $date2 =date("Y-m-d",strtotime(date("Y-m-d", strtotime($dob)) . "+2 months"));
        $date3 =date("Y-m-d",strtotime(date("Y-m-d", strtotime($dob)) . "+4 months"));
        $date4 =date("Y-m-d",strtotime(date("Y-m-d", strtotime($dob)) . "+6 months"));
        $date5 =date("Y-m-d",strtotime(date("Y-m-d", strtotime($dob)) . "+9 months"));
        $date6 =date("Y-m-d",strtotime(date("Y-m-d", strtotime($dob)) . "+18 months"));
        $date7 =date("Y-m-d",strtotime(date("Y-m-d", strtotime($dob)) . "+36 months"));
        $date8 =date("Y-m-d",strtotime(date("Y-m-d", strtotime($dob)) . "+60 months"));
        $state = 0;
        
        $inset_q="INSERT INTO `vaxination`(doctor_id, patient_id, baby_name, b_date, gender, vaccine_1, vaccine_2, vaccine_3, vaccine_4, vaccine_5, vaccine_6, vaccine_7, state, state2) VALUES ('{$doctorId}','{$patientId}','{$babyName}','{$dob}','{$babyGender}','{$date2}','{$date3}','{$date4}','{$date5}','{$date6}','{$date7}','{$date8}','{$state}','{$state}')";
        
        if ( $doctorId == "Select Doctor ID" || $patientId == "Select Patient ID" || $babyGender == NULL) {
            echo "<script>alert('You have Fill All fields!')</script>";
        }else{

            $test_id1 = pIdOf($patientId,$con);
            $test_id2 = dIdOf($doctorId,$con);
            
            if (!$test_id1 == NULL && !$test_id2 == NULL){
                if(mysqli_query($con,$inset_q)){
                    echo "<script>alert('added')</script>"; 
                }
                else{
                    echo "<script>alert('Error')</script>"; 
                }
            }
            else{
                echo "<script>alert('You have to select Doctor ID and patient ID!')</script>";
            }
        }

    }
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>

<body>
    
    <!-- header-start -->
        <?php
   include('vaccine_dash.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
         <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Register Baby for Vaccination</h2> 
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                  
                    <a href="vaccine_view_list.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> View Baby List</button></a>
                    <br><hr><br>

                    <!-- Form -->
                    <form method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><strong>Patient ID</strong></label>
                            <div class="col-sm-7">
                                <select class="form-control" name="patientId" id="patientId">
                                    <option>Select Patient ID</option>
                                <?php
                                    $patient="SELECT * FROM `patient`";
                                    $result=mysqli_query($con,$patient);
                                    if($result){
                                        while ($re=mysqli_fetch_assoc($result)) {
                                            echo "<option>$re[patient_id]</option>";
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><strong>Doctor ID</strong></label>
                            <div class="col-sm-7">
                                <select name="doctorId" id="doctorId">
                                    <option>Select Doctor ID</option>
                                <?php
                                    $doctor="SELECT * FROM `doctor`";
                                    $result=mysqli_query($con,$doctor);
                                    if($result){
                                        while ($re=mysqli_fetch_assoc($result)) {
                                            echo "<option>$re[doctor_reg_id]</option>";
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><strong>Gender of the Baby</strong></label>
                            <div class="col-sm-7">
                                <select name="gender" id="gender">
                                    <option>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><strong>Name of the Baby</strong></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="babyName" id="babyName" placeholder="Enter the Name of the Baby" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><strong>Birthday of Baby </strong></label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="dob" id="dob" placeholder="Enter the Date of Birth" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7">
                                <input type ="reset" name="reset" value ="Reset" class="btn btn-danger registerBtn">
                                <input type ="submit" name="reg_baby" value ="Register" class="btn btn-success registerBtn">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    
  <?php include('vaccine_footer.php');
?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>
    <?php
        mysqli_close($con); 
     ?>
</html>