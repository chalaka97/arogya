<?php

session_start();

include('../connection/connection.php');
include('../include/header.php');
include('../reception/Dashboard.php');
?>

<?php
if(isset($_POST['submit']))
  {
    
  $id=$_POST['id'];
  $email=$_POST['email'];
  $name=$_POST['name'];
  $address=$_POST['address'];
  $district=$_POST['district'];
  $mobile=$_POST['mobile'];
  $age=$_POST['age'];
  $gender=$_POST['gender'];
  $blood_type=$_POST['blood_type'];
 
      $query=mysqli_query($con, "select(patient_id,patient_email,name,address,district,mobile,age,gender,blood_type)from patient limit 5");

  
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>View Patients</title>
	</head>
	<body>
		
  <div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">View Patient</h2>
                </div>
            </header>
            <!-- <div class="col-md-12 form">
                <div class="row no-gutters"> -->
                    <div class="col-md-12">
                    
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">  
   

  <table border="1" class="table table-bordered">
    <tr align="center">
      <td colspan="9" style="font-size:20px;color:black">patient details</td>
    </tr>

    <tr>
      <th scope>Patient Id</th> 
      <th scope>Patient Email</th>
      <th scope>Patient Name</th>
      <th scope>Patient Address</th>
      <th scope>Patient District</th>
      <th scope>Patient Mobile Number</th>
      <th scope>Patient Age</th>
      <th scope>Patient Gender</th>
      <th scope>Patient Blood Type</th>
    </tr>
    <tr>
         <?php
            $ret=mysqli_query($con,"select * from patient limit 5");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {
         ?>

        <td><?php  echo $row['patient_id'];?></td>
        <td><?php  echo $row['patient_email'];?></td>
        <td><?php  echo $row['name'];?></td>
        <td><?php  echo $row['address'];?></td>
        <td><?php  echo $row['district'];?></td>
        <td><?php  echo $row['mobile'];?></td>
        <td><?php  echo $row['age'];?></td>
        <td><?php  echo $row['gender'];?></td>
        <td><?php  echo $row['blood_type'];?></td>
      </tr>
   
 
<?php }?>
</table>

  

 <a href="reception.php" button style="background-color:green";type="button" name="Back" class="btn btn-o btn-primary">Back</a>
 
  
</div>
</div>
<?php
include('../include/footer.php');
?>
</div>


		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../reception/assets/vendor/jquery/jquery.min.js"></script>
		<script src="../reception/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../reception/assets/vendor/modernizr/modernizr.js"></script>
		<script src="../reception/assets/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../reception/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../reception/assets/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../reception/assets/vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../reception/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../reception/assets/vendor/autosize/autosize.min.js"></script>
		<script src="../reception/assets/vendor/selectFx/classie.js"></script>
		<script src="../reception/assets/vendor/selectFx/selectFx.js"></script>
		<script src="../reception/assets/vendor/select2/select2.min.js"></script>
		<script src="../reception/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../reception/assets/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../reception/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../reception/assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>

<?php  mysqli_close($con)?>