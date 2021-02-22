<?php
	include("connection/connection.php");
	session_start();

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
				$_SESSION['uname'] = $fetch['email'];
				$_SESSION['role'] = $fetch['role'];

				header('location:admin.php');

			}elseif ($fetch['role'] == 'doctor')  {
				$_SESSION['uname'] = $fetch['email'];
				$_SESSION['role'] = $fetch['role'];
				header('location:Doctor.php');

			}elseif ($fetch['role'] == 'mlt')  {
				$_SESSION['uname'] = $fetch['email'];
				$_SESSION['role'] = $fetch['role'];
				header('location:blood_main.php');

			}elseif ($fetch['role'] == 'patient')  {
				$_SESSION['uname'] = $fetch['email'];
				$_SESSION['role'] = $fetch['role'];
				header('location:viewPatient.php');

			}elseif ($fetch['role'] == 'pharmacist')  {
				$_SESSION['uname'] = $fetch['email'];
				$_SESSION['role'] = $fetch['role'];
				header('location:Pharmacist.php');

			}elseif ($fetch['role'] == 'reception')  {
				$_SESSION['uname'] = $fetch['email'];
				$_SESSION['role'] = $fetch['role'];
				header('location:viewReception.php');

			}else{
				$_SESSION['role_error'] = 'Problem with enrolling user role.';
				header('location:loginui.php');
			}
		}
	}else {
		$_SESSION['login_error'] = 'Your email or password is invalid.';
		header('location:loginui.php');
	}
?>