<?php
session_start();
	include('../connection/connection.php');
	include('../include/header.php');
	include('../reception/Dashboard.php');

	$msg="";

if(isset($_POST['submit']))
{	
	$_SESSION['invoice_id'] =$invoice_id=$_SESSION['invoice_id'];
	$_SESSION['appointment_id'] =$appointment_id=$_SESSION['appointment_id'];
	$_SESSION['payment_id'] =$payment_id=$_POST['payment_id'];
	$_SESSION['patient_id'] =$patient_id=$_SESSION['patient_id'];
	$_SESSION['description'] =$description=$_POST['description'];
	$_SESSION['amount'] =$amount=$_POST['amount'];
	


$sql=mysqli_query($con,"insert into invoice(invoice_id,appointment_id,payment_id,patient_id,description,amount) values('$invoice_id','$appointment_id','$payment_id','$patient_id','$description','$amount')");

		if($sql){
				$msg="Patient info added Successfully";
		}
		else{
			$msg="patient data added unsuccessfull";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>generate invoice</title>
	</head>

<body>

<div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">generate invoice</h2>
                </div>
            </header>
            <div class="col-md-12 ">
                <div class="row no-gutters">
                    <div class="col-md-12">
                    
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">  
                             
<?php echo "<font color='green'>".$msg."</font>"."<br>"."<br>"?>

<form role="form" name="" method="post">

	

	<div class="form-group">
	<label for="appointment_id">
	Appointment Id
	</label>
	<input type="text" id="appointment_id" name="appointment_id" class="form-control"  placeholder="Enter Appointment Id" required="true" >

	</div>

	<div class="form-group">
	<label for="payment_id">
	Payment Id
	</label>
	<input type="text" name="payment_id" class="form-control"  placeholder="Enter Payment Id" required="true">
	</div>

	<!-- <div class="form-group">
	<label for="patient_id">
	Patient Id
	</label>
	<input type="text" name="patient_id" class="form-control"  placeholder="Enter Patient Id" required="true">
	</div> -->
	


	<div class="form-group">
	<label for="description">
	Description
	</label>
	<textarea name="description" class="form-control"  placeholder="Enter Description" required="true"></textarea>
	</div>

	<div class="form-group">
	<label for="fess">
	 Amount
	</label>
	<input type="number" name="amount" class="form-control"  placeholder="Enter amount" required="true" >
	</div>

	

	
            <input type ="submit" name="submit" value ="submit" class="btn btn-success registerBtn" data-toggle="modal">

			<input type ="reset" name="reset" value ="Reset" class="btn btn-danger registerBtn">
</form>
</div>
</div>
<?php
include('../include/footer.php');
?>
</div>

</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
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