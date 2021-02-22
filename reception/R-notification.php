<?php
include('../connection/connection.php');
include('../include/header.php');
include('../reception/Dashboard.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>notification</title>
	</head>
			<body>
					<div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">View Notification</h2>
                </div>
            </header>
            <div class="col-md-24 form">
                <div class="row no-gutters">
                    <div class="col-md-12">
                    
                        <div class="row margin-top-30">
                            <div class="col-lg-16 col-md-24">  
								<table class="table table-hover" id="sample-table-1">
									<thead>
									<tr align="center">
      									<td colspan="9" style="font-size:20px;color:black">Notification</td>
      								</tr>
									
											<tr>
												<th class="center">#</th>
												<th>Title</th>
												<th>Message</th>
												<th>Role</th>
												<th>Date</th>
												
											</tr>
										</thead>
										<tbody>
		<?php
				$sql=mysqli_query($con,"select * from notification where IsRead is null and role='reception'");
				$cnt=1;
						while($row=mysqli_fetch_array($sql))
						{
		?>

							<tr>
								<td class="center"><?php echo $cnt;?>.</td>
									<td><?php echo $row['title'];?></td>
									<td><?php echo $row['msg'];?></td>
									<td><?php echo $row['role'];?></td>
									<td><?php echo $row['date'];?></td>
								</td >
							</tr>
											
				<?php 
					$cnt=$cnt+1;
					 }
				?>
											
											
							</tbody>
						</table>
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
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>

<?php  mysqli_close($con)?>
