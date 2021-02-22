<?php
	include('connection/connection.php');
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];
// 	echo " ".$username." ".$password;

		$eny_password = sha1($password);
		$login = $con->query("SELECT * FROM user WHERE email='$username' AND pwd='$eny_password'");
	
	$fetch = $login->fetch_array();
	
// 	echo var_dump($fetch);
	
	if($login->num_rows == 1){
		if($fetch['isDelete'] == 1){
			$_SESSION['cdelete'] = 'Your account has been Deactivated';
			header('location:loginui.php');
		}else{
			if($fetch['role'] == 'admin'){
				$userData="SELECT * FROM admin WHERE admin_email='$username'";

				if($userData = $con->query($userData)){
				    
				    
// echo "this is test";


        			if($userData->num_rows > 0){
        			    
        			 //   echo var_dump($userData->num_rows);

						$fetchUserData=$userData->fetch_array();
						$_SESSION['admin_id'] = $fetchUserData['admin_id'];
						$_SESSION['admin_name'] = $fetchUserData['name'];
						$_SESSION['role'] = $fetch['role'];
						$_SESSION['admin_email'] = $fetchUserData['admin_email'];
						$_SESSION['admin_mobile'] = $fetchUserData['mobile'];
						$_SESSION['admin_image'] = $fetchUserData['img'];

						
						echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.location.href='admin/admin.php';
                         </SCRIPT>");
					}
				}

			}elseif ($fetch['role'] == 'doctor')  {
				$userData="SELECT * FROM doctor WHERE doctor_email='$username'";
				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){
						$fetchUserData=$userData->fetch_array();
						$_SESSION['docter_name'] = $fetchUserData['name'];
						$_SESSION['doctor_reg_id'] = $fetchUserData['doctor_reg_id'];
						$_SESSION['docter_role'] = $fetch['role'];
						$_SESSION['docter_email'] = $fetchUserData['doctor_email'];
						$_SESSION['docter_mobile'] = $fetchUserData['mobile'];	
						$_SESSION['docter_adress'] = $fetchUserData['address'];
						$_SESSION['docter_amount'] = $fetchUserData['amount'];
						$_SESSION['docter_spec'] = $fetchUserData['specialization'];

						$_SESSION['image'] = $fetchUserData['img'];
						echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.location.href='doctor/doctor.php';
                         </SCRIPT>");
					}
				}

			}elseif ($fetch['role'] == 'mlt')  {


				$userData="SELECT * FROM mlt WHERE mlt_email='$username'";


				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){

						$fetchUserData=$userData->fetch_array();

						

						$_SESSION['mlt_name'] = $fetchUserData['name'];
						
						$_SESSION['mlt_id'] = $fetchUserData['mlt_id'];
						$_SESSION['mlt_role'] = $fetch['role'];
						$_SESSION['mlt_email'] = $fetchUserData['mlt_email'];
						$_SESSION['mlt_mobile'] = $fetchUserData['mobile'];
						$_SESSION['mlt_image'] = $fetchUserData['img'];
						
						echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.location.href='mlt/mlt.php';
                         </SCRIPT>");
					}
				}


			}elseif ($fetch['role'] == 'patient')  {
				$userData="SELECT * FROM patient WHERE patient_email='$username'";

				if($userData = $con->query($userData)){


        			if($userData->num_rows > 0){
                        //echo $userData;
						$fetchUserData=$userData->fetch_array();
                        //echo $fetchUserData;
						$_SESSION['patient_name'] = $fetchUserData['name'];
						$_SESSION['role'] = $fetch['role'];
						$_SESSION['patient_id'] = $fetchUserData['patient_id'];
						$_SESSION['patient_district'] = $fetchUserData['district'];
						$_SESSION['patient_email'] = $fetchUserData['patient_email'];
						$_SESSION['patient_mobile'] = $fetchUserData['mobile'];
						$_SESSION['patient_image'] = $fetchUserData['img'];
						$_SESSION['patient_address'] = $fetchUserData['address'];
						$_SESSION['patient_age'] = $fetchUserData['age'];
						$_SESSION['patient_gender'] = $fetchUserData['gender'];
						$_SESSION['patient_blood_type'] = $fetchUserData['blood_type'];
						
						
						echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.location.href='patient/patient.php';
                         </SCRIPT>");
						
						
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
						
						echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.location.href='pharmacist/pharmacist.php';
                         </SCRIPT>");
						
						

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
						
						echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.location.href='reception/reception.php';
                         </SCRIPT>");
					}
				}

			}else{

				$_SESSION['role_error'] = 'Problem with enrolling user role.';

				
				echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.location.href='loginui.php';
                         </SCRIPT>");
			}
		}
	}else {
		$_SESSION['login_error'] = 'Your email or password is invalid.';

		
		echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.location.href='loginui.php';
                         </SCRIPT>");
	}
?>