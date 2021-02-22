<?php
	include('../connection/connection.php');
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
				$userData=$con->query("SELECT * admin WHERE admin_email==$username");
				$fetchUserData=$userData->fetch_array();
				$_SESSION['admin_id'] = $fetch['admin_id'];
				$_SESSION['admin_amount'] = $fetch['amount'];
				$_SESSION['admin_name'] = $fetchUserData['name'];
				$_SESSION['role'] = $fetch['role'];
				$_SESSION['admin_email'] = $fetch['admin_email'];
				$_SESSION['admin_mobile'] = $fetch['mobile'];
				$_SESSION['admin_image'] = $fetch['img'];
				header('location:admin/admin.php');

			}elseif ($fetch['role'] == 'doctor')  {
				$userData=$con->query("SELECT * doctor WHERE doctor_email==$username");
				$fetchUserData=$userData->fetch_array();
				$_SESSION['docter_name'] = $fetch['name'];
				$_SESSION['docter_reg_id'] = $fetch['doc_reg_id'];
				$_SESSION['docter_role'] = $fetch['role'];
				$_SESSION['docter_email'] = $fetch['docter_email'];
				$_SESSION['docter_mobile'] = $fetch['mobile'];	
				$_SESSION['docter_adress'] = $fetch['adress'];
				$_SESSION['docter_amount'] = $fetch['amount'];
				$_SESSION['docter_spec'] = $fetch['specialization'];

				$_SESSION['image'] = $fetch['img'];
				header('location:doctor/doctor.php');

			}elseif ($fetch['role'] == 'mlt')  {
				$userData=$con->query("SELECT * mlt WHERE mlt_email==$username");
				$fetchUserData=$userData->fetch_array();
				$_SESSION['mlt_name'] = $fetch['name'];
				$_SESSION['mlt_id'] = $fetch['mlt_id'];
				$_SESSION['mlt_role'] = $fetch['role'];
				$_SESSION['mlt_email'] = $fetch['mlt_email'];
				$_SESSION['mlt_mobile'] = $fetch['mobile'];
				$_SESSION['mlt_image'] = $fetch['img'];
				header('location:mlt/mlt.php');

			}elseif ($fetch['role'] == 'patient')  {
				$userData=$con->query("SELECT * patient WHERE patient_email==$username");
				$fetchUserData=$userData->fetch_array();
				$_SESSION['patient_name'] = $fetch['name'];
				$_SESSION['role'] = $fetch['role'];
				$_SESSION['patient_id'] = $fetch['patient_id'];
				$_SESSION['patient_district'] = $fetch['district'];
				$_SESSION['patient_amount'] = $fetch['amount'];
				$_SESSION['patient_email'] = $fetch['patient_email'];
				$_SESSION['patient_mobile'] = $fetch['mobile'];
				$_SESSION['patient_image'] = $fetch['img'];
				$_SESSION['patient_address'] = $fetch['address'];
				$_SESSION['patient_age'] = $fetch['age'];
				$_SESSION['patient_gender'] = $fetch['gender'];
				$_SESSION['patient_blood_type'] = $fetch['blood_type'];
				header('location:patient/patient.php');

			}elseif ($fetch['role'] == 'pharmacist')  {
				$userData=$con->query("SELECT * pharmacist WHERE pharmacist_email==$username");
				$fetchUserData=$userData->fetch_array();
				$_SESSION['pharmacist_uname'] = $fetch['name'];
				$_SESSION['pharmacist_role'] = $fetch['role'];
				$_SESSION['pharmacist_mobile'] = $fetch['mobile'];
				$_SESSION['pharmacist_email'] = $fetch['pharmacist_email'];
				$_SESSION['pharmacist_image'] = $fetch['img'];
				$_SESSION['pharmacist_reg_id'] = $fetch['pharmacist_reg_id'];
				header('location:pharmacist/pharmacist.php');

			}elseif ($fetch['role'] == 'reception')  {
				$userData=$con->query("SELECT * reception WHERE reception_email==$username");
				$fetchUserData=$userData->fetch_array();
				$_SESSION['reception_name'] = $fetch['name'];
				$_SESSION['role'] = $fetch['role'];
				$_SESSION['reception_id'] = $fetch['reception_id'];
				$_SESSION['reception_email'] = $fetch['reception_email'];
				$_SESSION['reception_mobile'] = $fetch['mobile'];
				$_SESSION['reception_image'] = $fetch['img'];
				header('location:reception/reception.php');

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