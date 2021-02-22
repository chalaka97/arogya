<?php
	session_start();
    include('../connection/connection.php');
 	include('../include/header.php');
	include('../reception/Dashboard.php');

	$msg="";

	 if(isset($_GET['del']))
    {
    	$sql = mysqli_query($con,"delete from appointment where appointment_id = '". $_GET['appointment_id'] ."'"); //$_GET['id']

    	if($sql){
    		$msg ="Your appointment canceled !!";
    	} else{
    		$msg ="Unable to canceled your appointment!!";
    	}
   
    	
    } 

  ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>View appointment</title>
	</head>
	<body>
		<div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">View Appointment </h2>
                </div>
            </header>
                <div class="col-md-12">
                    <div class="row margin-top-30">
                            <div class="col-lg-16 col-md-24">  

                            	<?php echo "<font color='green'>".$msg."</font>"?>

							<table border="1" class="table table-bordered">
							<thead>
    						<tr align="center">
      							<td colspan="9" style="font-size:20px;color:black"> Appointment Details </td>
    						</tr>	
							
								<tr>
									<th class="center"> No.</th>
									
									<th>Doctor Name</th>
									<th>Specialization</th>
									<<th>Doctor Fees</th>
									<th>Appointment Date</th>
									<th>Appointment Time </th>
									<th>Status</th>
									<th>Delete</th>
								</tr>
							</thead>
						    <tbody>
<?php
	$sql=mysqli_query($con,"select doctor.name as docname ,appointment.*  from appointment join doctor on doctor.doctor_reg_id=appointment.doctor_id "); 
	$cnt=1;
	while($row=mysqli_fetch_array($sql))
	{
?>

	<tr>
		<td class="center"><?php echo $cnt;?>.</td>
		
		<td class="hidden-xs"><?php echo $row['docname'];?></td>
		<td><?php echo $row['specialization'];?></td>
		<td><?php echo $row['amount'];?></td>
		<td><?php echo $row['date'];?></td>
		<td><?php echo$row['time'];?></td>
		<!--<td><?php //echo $row['postingDate'];?></td>-->
		<td><?php 
			if(($row['isApproved']==1))  
			{
				echo "Approved";
			}
			if(($row['isApproved']==0))  
			{
				echo "Canceled";
			}
			?>
		</td>
		<td >
		<a href="view-appointment.php?appointment_id=<?php echo $row['appointment_id']?>&del=delete" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
		</td>
	</tr>
	<?php 
		$cnt=$cnt+1;
		}
	?>
											
											
											</tbody>
										</table>
									</div>
								</div>
								<?php
									include('../include/footer.php');
								?>
							</div>
						</div>

        <!-- body-end -->

    <!-- footer start -->
    
    <!-- footer end  -->

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


