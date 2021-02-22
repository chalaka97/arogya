<?php
    session_start();
    include('../connection/connection.php'); 
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User - Notification</title>
		<?php
        	include('../include/header.php');
    	?>
	</head>
	<body>
		<?php
        	include('patientDash.php');
    	?>
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
	      									<td colspan="9" style="font-size:20px;color:black">Notification
	      									</td>
	      								</tr>
										<tr>
											<th class="center">No.</th>
											<th>Title</th>
											<th>Message</th>
											<th>Date</th>
										<tr>
									</thead>
									<tbody>
		<?php
			$sql=mysqli_query($con,"select * from notification where IsRead is null and role='patient'");
				$cnt=1;
				while($row=mysqli_fetch_array($sql)) {
				
		?>
										<tr>
											<td class="center"><?php echo $cnt;?></td>
											<td><?php echo $row['title'];?></td>
											<td><?php echo $row['msg'];?></td>
											<td><?php echo $row['date'];?></td>
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
		
	</body>
</html>

<?php  mysqli_close($con)?>
