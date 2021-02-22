<?php
	include("../connection/connection.php");
	session_start();
    if(!isset($_SESSION['docter_reg_id'])){
        header("location:../logout.php");
    }
	include('vaccine_sms.php');

    $id=$_GET["id"];
    
    $sql="UPDATE `vaxination` SET state=state+1 WHERE vaccine_id='$id'";
    $result=mysqli_query($con,$sql);

    if($result){

    }
	mysqli_close($con); 
?>