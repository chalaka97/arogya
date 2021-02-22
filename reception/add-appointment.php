<?php
session_start();

 include('../connection/connection.php');
 include('../include/header.php');
 include('../reception/Dashboard.php');

 $msg="";

if(isset($_POST['submit']))
{

$_SESSION['appointment_type'] =$type=$_POST['type'];
$_SESSION['date'] =$date=$_POST['date'];
$_SESSION['time']=$time=$_POST['time'];
$_SESSION['specilization'] =$specialization=$_POST['specialization'];
$_SESSION['doctor_id'] =$doctorid=$_POST['docter'];
$_SESSION['patient_id']=$patientid=$_SESSION['patient_id'];
$_SESSION['isApproved'] =$isapproved=1;
$_SESSION['isDone'] = $isdone=0;
$_SESSION['amount'] =$amount=$_POST['amount'];

$query=mysqli_query($con,"insert into appointment(appointment_type,date,time,specialization,doctor_id,patient_id,isApproved,isDone,amount) values('$type','$date','$time','$specialization','$doctorid','$patientid','$isapproved','$isdone','$amount')");

	if($query)
	{
		$msg="Your appointment successfully booked";
	}

	else{
		$msg="appointment added unsuccessfully";
	}

}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Appointment</title>

		<script>



function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}
</script>	


</head>
	<body>

		<div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Book Appointment</h2>
                </div>
            </header>
            <div class="col-md-12">
                <div class="row no-gutters">
                    <div class="col-md-12">
                    
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">  
							
	<?php echo "<font color='green'>".$msg."</font>"."<br>"."<br>"?>



			<form role="form" name="type" method="post" >
				<div class="form-group">
					<label for="type">Appointment Type</label><br>
					<input type="text" name="type" value="Manual" readonly class="form-control">
				</div>

			<div class="form-group">
				<label for="AppointmentDate">Select Date</label>
				<input type="date" class="form-control datepicker" name="date" required="required" data-date-format="yyyy-mm-dd" min=<?php echo date("Y-m-d"); ?>>
			</div>

			<div class="form-group">
				<label for="Appointmenttime">Time</label><br>
				<input type="time" name="time" class="form-control" id="timepicker1" required="required">
			</div>

			<div class="form-group">
				<label for="specialization">Doctor Specialization</label>

			<select name="specialization" class="form-control" onChange="getdoctor(this.value);" required="required">
					<option value="">Select Specialization</option>
					<?php 
							$ret=mysqli_query($con,"select specialization from doctor GROUP BY specialization");
							while($row=mysqli_fetch_array($ret))

							{
					?>
					<option name = "specialization" value="<?php echo htmlentities($row['specialization']);?>">
						 <?php 
                				echo htmlentities($row['specialization']);
                				//var_dump($row['specialization']);
            			 ?>
					</option>
							<?php 
                				}
           					 ?>
				</select>
			</div>


		

			<div class="form-group">
				<label for="doctor">Doctors</label>
				<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
				<option value="<php echo ">Select Doctor</option>
					<?php 
							$ret=mysqli_query($con,"select name from doctor");
							while($row=mysqli_fetch_array($ret))

							{
					?>
					<option value="<?php echo htmlentities($row['name']);?>">
						 <?php 
                				echo htmlentities($row['name']);
            			 ?>

					</option>
							<?php 
                				}
           					 ?>	
				</select>
			</div>

			<form role="form" name="type" method="post" >
				<div class="form-group">
					<label for="amount">Amount</label><br>
					<input type="number" name="amount" class="form-control" id=amount required="required">
				</div>	


			

																
														
			<button style="background-color:green" type="submit" name="submit" class="btn btn-o btn-primary">
				Submit
			</button>
			<button style="background-color:blue" type="submit" name="reset" class="btn btn-o btn-primary">
				Reset
			</button>
		</form>
												</div>
											</div>
		<?php
			include('../include/footer.php');
		?>
	
										</div>
										</div>
										</div>
									
									</div>
								</div>
						
					</div>
				</div>
			</div>
			
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

			$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});
		</script>
		  <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="../reception/assets/http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
