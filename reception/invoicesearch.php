<?php
session_start();


include('../connection/connection.php');
include('../include/header.php');
include('../reception/Dashboard.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>search</title>
	</head>
	<body>
		
<div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Search</h2>
                </div>
            </header>
            <!-- <div class="col-md-12 form">
                <div class="row no-gutters"> -->
                    <div class="col-md-12">
                    
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12"> 

	<form role="form" method="post" name="search">
		<div class="form-group">
			<label for="search">
				Search invoice by Id.
			</label>
				<input type="number" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
		</div>

	<button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
		Search
	</button>

	</form>	


	<?php
		if(isset($_POST['search']))
		{ 

		$sdata=$_POST['searchdata'];
  	?>

	<table border="1" class="table table-bordered">
							<thead>
    						<tr align="center">
      							<td colspan="9" style="font-size:20px;color:blue">Invoice Details</td>
    						</tr>	
							
								<tr>
									<th class="center">No.</th>
									<th scope>Doctor Name</th>
									<th scope>Doctor Charge</th>
									<th scope>Address</th>
									<th scope>Description</th>
									<th scope>Appointment Date</th>
									<th scope>Appointment Time </th>
									<th scope>Pdf</th>
									
								</tr>
							</thead>
						    <tbody>

<?php
	$sql=mysqli_query($con,"select * from invoice where invoice_id like '%$sdata%' ");
	$num=mysqli_num_rows($sql);

		if($num>0){
		$cnt=1;
		while($row=mysqli_fetch_array($sql))
		{
?>

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
			
			<td><a href="downlord.php"> <input type="button" value="Downlord" class="btn btn-o btn-primary" ></a></td>

		</tr>
		
		<?php 
		$cnt=$cnt+1;
		}
		}
	}
	?>

<?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php }} ?></tbody>
</table>
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
