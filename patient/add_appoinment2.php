<?php 
    
    date_default_timezone_set("Asia/Colombo");
    $date=date("Y-m-d h:i:s");
    $time=date("h:i:s");
    require_once "../connection/connection.php"; 
    
   
    $query2="INSERT into `appointment`(appointment_type,date,time,specialization,doctor_id,patient_id,isApproved,isDone) VALUE('{$_POST['payment']}','$date','$time','physiotheropy','{$_POST['doc_id']}','{$_POST['patient_id']}',0,0)";
    $query3="DELETE FROM `appointment` WHERE `doctor_id` ='{$_POST['doc_id']}' AND  `patient_id` ='{$_POST['patient_id']}' ";
     
    if(0==strcmp($_POST['availability'],"0")){
        mysqli_query($con,$query2);
    }else{
        mysqli_query($con,$query3);
    }
   

?>