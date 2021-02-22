<?php 
    
    date_default_timezone_set("Asia/Colombo");
    $date=date("Y-m-d");
    $time=1;
    require_once "../connection/connection.php"; 
    
    $query="INSERT INTO `webtcrdoc`(`doc_id`, `patient_id`) VALUES ('{$_POST['doc_id']}','{$_POST['patient_id']}')";
    $query1="DELETE FROM `webtcrdoc` WHERE `doc_id` ='{$_POST['doc_id']}' AND  `patient_id` ='{$_POST['patient_id']}' ";
    $query2="INSERT into `appointment`(appointment_type,date,time,specialization,doctor_id,patient_id,isApproved,isDone,amount) VALUE('card','$date','$time','webtrc','{$_POST['doc_id']}','{$_POST['patient_id']}',0,0,1800)";
    $query3="DELETE FROM `appointment` WHERE `doctor_id` ='{$_POST['doc_id']}' AND  `patient_id` ='{$_POST['patient_id']}' ";
     
    if(0==strcmp($_POST['availability'],"0")){
        mysqli_query($con,$query);
        mysqli_query($con,$query2);
    }else{
        mysqli_query($con,$query1);
        mysqli_query($con,$query3);
    }
   

?>