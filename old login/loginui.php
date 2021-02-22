<?php
	session_start();
include('connection/connection.php');
	
if(isset($_POST['loginbtn'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	//echo " ".$username." ".$password;

		$eny_password = sha1($password);
		$login = $con->query("SELECT * FROM user WHERE email='$username' AND pwd='$eny_password'");
	
	$fetch = $login->fetch_array();
	if($login->num_rows == 1){
		if($fetch['isDelete'] == 1){
			$_SESSION['cdelete'] = 'Your account has been Deactivated';
			header('location:loginui.php');
		}else{
			if($fetch['role'] == 'admin'){
				$userData="SELECT * FROM admin WHERE admin_email='$username'";

				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){

						$fetchUserData=$userData->fetch_array();
						$_SESSION['admin_id'] = $fetchUserData['admin_id'];
						$_SESSION['admin_name'] = $fetchUserData['name'];
						$_SESSION['role'] = $fetch['role'];
						$_SESSION['admin_email'] = $fetchUserData['admin_email'];
						$_SESSION['admin_mobile'] = $fetchUserData['mobile'];
						$_SESSION['admin_image'] = $fetchUserData['img'];
						header('location:admin/admin.php');
					}
				}

			}elseif ($fetch['role'] == 'doctor')  {
				$userData="SELECT * FROM doctor WHERE doctor_email='$username'";
				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){
						$fetchUserData=$userData->fetch_array();
						$_SESSION['docter_name'] = $fetchUserData['name'];
						$_SESSION['docter_reg_id'] = $fetchUserData['doctor_reg_id'];
						$_SESSION['docter_role'] = $fetch['role'];
						$_SESSION['docter_email'] = $fetchUserData['doctor_email'];
						$_SESSION['docter_mobile'] = $fetchUserData['mobile'];	
						$_SESSION['docter_adress'] = $fetchUserData['adress'];
						$_SESSION['docter_amount'] = $fetchUserData['amount'];
						$_SESSION['docter_spec'] = $fetchUserData['specialization'];

						$_SESSION['image'] = $fetch['img'];
						if ($_SESSION['docter_spec']=='pediatrician') {
							header('location:doctor/vaccine_home.php');
						}elseif ($_SESSION['docter_spec']=='pediatrician') {
							header('location:doctor/doctor.php');
						}
						
					}
				}

			}elseif ($fetch['role'] == 'mlt')  {


				$userData="SELECT * FROM mlt WHERE mlt_email='$username'";


				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){

						$fetchUserData=$userData->fetch_array();

						$_SESSION['mlt_name'] = $fetchUserData['name'];
						echo($fetchUserData['name']);
						$_SESSION['mlt_id'] = $fetchUserData['mlt_id'];
						$_SESSION['mlt_role'] = $fetch['role'];
						$_SESSION['mlt_email'] = $fetchUserData['mlt_email'];
						$_SESSION['mlt_mobile'] = $fetchUserData['mobile'];
						$_SESSION['mlt_image'] = $fetchUserData['img'];
						header('location:mlt.php');
					}
				}


			}elseif ($fetch['role'] == 'patient')  {
				$userData="SELECT * FROM patient WHERE patient_email='$username'";

				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){

						$fetchUserData=$userData->fetch_array();
						$_SESSION['patient_name'] = $fetchUserData['name'];
						$_SESSION['role'] = $fetch['role'];
						$_SESSION['patient_id'] = $fetchUserData['patient_id'];
						$_SESSION['patient_district'] = $fetchUserData['district'];
						$_SESSION['patient_amount'] = $fetchUserData['amount'];
						$_SESSION['patient_email'] = $fetchUserData['patient_email'];
						$_SESSION['patient_mobile'] = $fetchUserData['mobile'];
						$_SESSION['patient_image'] = $fetchUserData['img'];
						$_SESSION['patient_address'] = $fetchUserData['address'];
						$_SESSION['patient_age'] = $fetchUserData['age'];
						$_SESSION['patient_gender'] = $fetchUserData['gender'];
						$_SESSION['patient_blood_type'] = $fetchUserData['blood_type'];
						header('location:patient.php');
					}
				}

			}elseif ($fetch['role'] == 'pharmacist')  {
				$userData="SELECT * FROM pharmacist WHERE pharmacist_email='$username'";
				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){

						$fetchUserData=$userData->fetch_array();
						$_SESSION['pharmacist_uname'] = $fetchUserData['name'];
						$_SESSION['pharmacist_role'] = $fetch['role'];
						$_SESSION['pharmacist_mobile'] = $fetchUserData['mobile'];
						$_SESSION['pharmacist_email'] = $fetchUserData['pharmacist_email'];
						$_SESSION['pharmacist_image'] = $fetchUserData['img'];
						$_SESSION['pharmacist_reg_id'] = $fetchUserData['pharmacist_reg_id'];
						header('location:pharmacist/pharmacist.php');

					}
				}

			}elseif ($fetch['role'] == 'reception')  {
				$userData="SELECT * FROM reception WHERE reception_email='$username'";

				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){

						$fetchUserData=$userData->fetch_array();
						$_SESSION['reception_name'] = $fetchUserData['name'];
						$_SESSION['role'] = $fetch['role'];
						$_SESSION['reception_id'] = $fetchUserData['reception_id'];
						$_SESSION['reception_email'] = $fetchUserData['reception_email'];
						$_SESSION['reception_mobile'] = $fetchUserData['mobile'];
						$_SESSION['reception_image'] = $fetchUserData['img'];
						header('location:reception/reception.php');
					}
				}

			}else{

				$_SESSION['role_error'] = 'Problem with enrolling user role.';
				header('location:loginui.php');
			}
		}
	}else {
		$_SESSION['login_error'] = 'Your email or password is invalid.';
		header('location:loginui.php');
	}
}

?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Arogya</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo2.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo2.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
		<?php
						if(isset($_SESSION['success'])){
							echo "";
						}
					?>
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">					
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo2.png" alt="Arogya"></div>
							</div>

							<form class="form-auth-small" method="post">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" class="form-control" name="username" id="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block" name="loginbtn">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="admin/homePatientCreate.php">Register </a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Welcome AROGYA Hospital Management System</h1>
							<p>"The gratest  wealth is health"</p>
							<?php if(!empty($_SESSION['login_error'])){?>
								<font color="red">
									<p><?=$_SESSION['login_error']?></p>
								</font>
							<?php } ?>

							<?php if(!empty($_SESSION['cdelete'])){?>
								<font color="red">
									<p><?=$_SESSION['cdelete']?></p>
								</font>
							<?php } ?>

							<?php if(!empty($_SESSION['role_error'])){?>
								<font color="red">
									<p><?=$_SESSION['role_error']?></p>
								</font>
							<?php } ?>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	
</body>

</html>
