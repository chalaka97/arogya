<?php

	$servername = "localhost";
	$username = "root";
	$pw = "";
	$db = "arogya";

	$con = mysqli_connect($servername,$username,$pw,$db);
	if(!$con){
		echo "Error Connection".mysqli_error($con);
	}
  

	

?>
