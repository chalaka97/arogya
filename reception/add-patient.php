<?php
session_start();
	include('../connection/connection.php');
	include('../include/header.php');
	include('../reception/Dashboard.php');

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


$sql=mysqli_query($con,"insert into patient(patient_id,patient_email,name,address,district,mobile,age,gender,blood_type) values('$id','$email','$name','$address','$district','$mobile','$age','$gender','$blood_type')");

		if($sql){
				echo "<script>alert('Patient info added Successfully');</script>";
		}
		else{
			echo "<script>alert('patient data added unsuccessfull');</script>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Patient</title>
	</head>

<body>

<div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Add Patient</h2>
                </div>
            </header>
            <div class="col-md-12 form">
                <div class="row no-gutters">
                    <div class="col-md-12">
                    
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">  
                             

<form role="form" name="" method="post">

	<div class="form-group">
	<label for="Patient name">
	Patient Id
	</label>
	<input type="text" name="id" class="form-control"  placeholder="Enter Patient ID"  required="true">
	</div>

	<div class="form-group">
	<label for="fess">
	Patient Email
	</label>
	<input type="email" id="email" name="email" class="form-control"  placeholder="Enter Patient Email id" required="true" >

	</div>

	<div class="form-group">
	<label for="patientname">
	Patient Name
	</label>
	<input type="text" name="name" class="form-control"  placeholder="Enter Patient Name" required="true">
	</div>

	<div class="form-group">
	<label for="address">
	Patient Address
	</label>
	<textarea name="address" class="form-control"  placeholder="Enter Patient Address" required="true"></textarea>
	</div>


	<div class="form-group">
	<label for="district">
	District
	</label>
	<textarea name="district" class="form-control"  placeholder="Enter Patient District" required="true"></textarea>
	</div>

	<div class="form-group">
	<label for="fess">
	 Patient Contact no
	</label>
	<input type="number" name="mobile" class="form-control"  placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="0[0-9]{9}>
	</div>

	<div class="form-group">
	<label for="fess">
	 Patient Age
	</label>
	<input type="number" name="age" class="form-control"  placeholder="Enter Patient Age" required="true" maxlength="2">
	</div>

	<div class="form-group">
	<label class="block">
	Gender
	</label>
	<div class="clip-radio radio-primary">
	<input type="radio" id="rg-female" name="gender" value="female" >
	<label for="rg-female">
	Female
	</label>
	<input type="radio" id="rg-male" name="gender" value="male">
	<label for="rg-male">
	Male
	</label>
	</div>
	</div>


	<div class="form-group">
	<label for="fess">
	 Blood Type
	</label>
	<select name="blood_type" class="form-control" required="required">
		<option value="Select Blood Type">Select Blood Type</option>
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="AB+">AB+</option>
		<option value="AB-">AB-</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>
	</select>
	
	</div>	

	
            <input type ="submit" name="submit" value ="submit" class="btn btn-success registerBtn" data-toggle="modal">

			<input type ="reset" name="reset" value ="Reset" class="btn btn-danger registerBtn">
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>

			
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