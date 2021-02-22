<?php
	include("../connection/connection.php");
	  session_start();
    if(!isset($_SESSION['docter_reg_id'])){
        header("location:../logout.php");
    }
	include('vaccine_sms.php');

    $id=$_GET["id"];
    
    $sql="DELETE FROM `vaxination` WHERE vaccine_id ='$id'";
  	$result=mysqli_query($con,$sql);

  	if($result){

    }

	mysqli_close($con); 
?>