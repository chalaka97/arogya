<?php

	$servername = "104.223.62.248";
	$username = "smartlkm_admin”";
	$pw = "adminarogya@1";
	$db = "smartlkm_arogya";

	$con = mysqli_connect($servername,$username,$pw,$db);
	if(!$con){
		echo "Error Connection".mysqli_error($con);
	}
  

	

?>
