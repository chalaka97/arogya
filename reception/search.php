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
				Search patient by Name/Mobile No.
			</label>
				<input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
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


<table class="table table-hover" id="sample-table-1">
	<thead>
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
	</thead>
<tbody>

<?php
	$sql=mysqli_query($con,"select * from patient where name like '%$sdata%'|| mobile like '%$sdata%'");
	$num=mysqli_num_rows($sql);

		if($num>0){
		$cnt=1;
		while($row=mysqli_fetch_array($sql))
		{
?>

<tr>


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
<!-- </div>
</div> -->
</div>
</div>
</div>
			
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
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
