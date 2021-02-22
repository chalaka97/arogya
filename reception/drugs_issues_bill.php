<?php
session_start();
	include('connection.php');
	include('header.php');
	include('Dashboard.php');

	if(isset($_POST['submit']))
		{	
			$appoinment_id=$_POST['appoinment_id'];
			$doctor_name=$_POST['doctor_name'];
			$patient_name=$_POST['patient_name'];
			$description=$_POST['description'];
			$ex_date=$_POST['ex_date'];
			$qty=$_POST['qty'];
			$unit_price=$_POST['unit_price'];
			$amount=$_POST['amount'];

	$sql=mysqli_query($conn,"insert into treatement(appoinment_id,doctor_name,patient_name,description,ex_date,qty,unit_price,amount) values('$appoinment_id','$doctor_name','$patient_name','$description','$ex_date','$qty','$unit_price','$amount')");
	
			if($sql)
			{
			echo "<script>alert('treatement info added Successfully');</script>";


}
}
?>
	
	<!DOCTYPE html>
			<html lang="en">
				<head>
						<title>drug issues bill</title>
				</head>

	<body>

		
		<section id="page-title">
			<div class="row">
			<div class="col-sm-12"></div>
			</div>
		</section>
		<div class="container-fluid container-fullw bg-white">
		<div class="row">
		<div class="col-md-10">
		<div class="row margin-top-90">
		<div class="col-lg-12 col-md-10">
		<div class="panel panel-white">
		<div class="panel-heading"><br>
				<h5 class="panel-title">Drugs Issues Bill</h5>
		</div>
		<div class="panel-body">
				<form role="form" name="" method="post">

					<div class="form-group">
						<label for="AppoinmentId">
							Appoinment Id
						</label>
							<input type="text" name="appoinment_id" class="form-control"  placeholder="Enter Appoinment Id" required="true">
					</div>

					<div class="form-group">
						<label for="name">
							Doctor Name
						</label>
							<input type="text" name="doctor_name" class="form-control"  placeholder="Enter Doctor Name" required="true">
					</div>

					<div class="form-group">
						<label for="name">
							Patient Name
						</label>
							<input type="text" name="patient_name" class="form-control"  placeholder="Enter Patient Name" required="true">
					</div>

					<div class="form-group">
						<label for="description">
							Description
						</label>
							<input type="text" name="description" class="form-control"  placeholder="Description" required="true">
					</div>

					<div class="form-group">
						<label for="AppoinmentId">
							Drugs Expire Date
						</label>
							<input type="Date" name="ex_date" class="form-control"  placeholder="Drugs Expire Date" required="true">
					</div>

					<div class="form-group">
						<label for="qty">
							Quantity
						</label>
							<input type="text" name="qty" class="form-control"  placeholder="Enter Quentity" required="true">
					</div>

					<div class="form-group">
						<label for="Unit Price">
							Unit Price
						</label>
							<input type="text" name="unit_price" class="form-control"  placeholder="Enter Unit Price" required="true">
					</div>

					<div class="form-group">
						<label for="Amount">
							Amount
						</label>
							<input type="text" name="amount" class="form-control"  placeholder="Add Amount" required="true">
					</div>

					<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
							Submit
					</button>
				</form>
		</div>
		</div>
		</div>
		</div>
		</div>
				<div class="col-lg-12 col-md-12">
				<div class="panel panel-white"></div>
				</div>
		</div>
		</div>




