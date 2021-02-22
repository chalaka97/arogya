<?php

    include('../connection/connection.php');
 	include('../include/header.php');
	include('../reception/Dashboard.php');

  ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>invoice</title>
	</head>
	<body>
		
        <section id="page-title">
    		<div class="row">
    			<div class="col-sm-12">
    			</div>
  			</div>
		</section>

		<div class="container-fluid container-fullw bg-white">
			<div class="row">
				<div class="col-md-12">
					<br>
						<br>
						

						<!--<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
						<?php echo htmlentities($_SESSION['msg']="");?></p>-->

						<table border="1" class="table table-bordered">
							<thead>
    						<tr align="center">
      							<td colspan="9" style="font-size:20px;color:blue">Invoice Details</td>
    						</tr>	
							
								<tr>
									<th class="center">No.</th>
									<th>Doctor Name</th>
									<th>Doctor Charge</th>
									<th>Address</th>
									<th>Description</th>
									<th>Appointment Date</th>
									<th>Appointment Time </th>
									<th>Pdf</th>
									
								</tr>
							</thead>
						    <tbody>
<?php

	$cnt=1;

	$sql1 = "select * from doctor";
	$result1 = mysqli_query($con, $sql1);


	while ($row1 = mysqli_fetch_array($result1)) {
		$docid = $row1['doctor_reg_id'];

		$sql2 = "select * from appointment where doctor_id='$docid'";
		$result2 = mysqli_query($con, $sql2);

		while ($row2 = mysqli_fetch_array($result2)) {
			$appid = $row2['appointment_id'];

			$sql3 = "select * from invoice where appointment_id='$appid'";
			$result3 = mysqli_query($con, $sql3);

			while ($row3 = mysqli_fetch_array($result3)) {
				
			
	// $sql=mysqli_query($con,"select doctor.name as docname ,appointment.*  from appointment join doctor on doctor.doctor_reg_id=appointment.doctor_id "); 


	// $cnt=1;
	// while($row=mysqli_fetch_array($sql))
	
	// {
	// 	$appointment_id = $row['appointment_id'];



	// 	$sql1=mysqli_query($con,"select * from invoice where appointment_id='$appointment_id'"); 
	// 	while ($r = mysqli_fetch_array($sql1)) {
			
		
?>
	<tr>
		<td class="center"><?php echo $cnt;?>.</td>
		
		<td class="hidden-xs"><?php echo $row1['name'];?></td>
		<td><?php echo $row1['amount'];?></td>
		<!--<td><?php echo $row['specialization'];?></td>-->
		<td><?php echo $row1['address'];?></td>
		<td><?php echo $row3['description'];?></td>
		
		<td><?php echo $row2['date'];?></td>
		<td><?php echo$row2['time'];?></td>
		<td><a href="invoice.php"> <input type="button" value="print" class="btn btn-o btn-primary" ></a></td>


		<!--<td><?php //echo $row['postingDate'];?></td>-->
		<!-- <td><?php 
			if(($row2['isApproved']==1))  
			{
				echo "Approved";
			}
			if(($row2['isApproved']==0))  
			{
				echo "Canceled";
			}
			?>
		</td> -->
		
		<!-- <td >
		<a href="view-appointment.php?appointment_id=<?php echo $row2['appointment_id']?>&del=delete" onClick="return confirm('Are you sure you want to cancel this appointment?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
		</td> -->

		<!-- <td><a href="invoice.php <i class="fa fa-pdf"> </i></a></td>
 -->
	</tr>
	<?php 
		$cnt=$cnt+1;
		}
		}
	}
	?>
											
											
							</tbody>
						</table>
					</div>
				</div>
			</div>
	    </div>
    </div>
</div>

        <!-- body-end -->

    <!-- footer start -->
    <?php
       //include('include/footer.php');
    ?>
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



