<?php
    include("../connection/connection.php");
    session_start();
    if(!isset($_SESSION['docter_reg_id'])){
        header("location:../logout.php");
    }
    include("vaccine_sms.php");
    

    $name=$_GET["name"];
    
    $sql="SELECT * FROM `patient` WHERE patient_name LIKE '%$name%' OR patient_nic LIKE '%$name%'";
    $result=mysqli_query($con,$sql);

    if($result){
        while($rec=mysqli_fetch_assoc($result)){
            $id=$rec['patient_id'];
            $name=base64_encode($rec['patient_name']);
            $nic=$rec['patient_nic'];
            $nic_encr=base64_encode($nic);
            echo "<a href=\"home.php?patient_id=$id&name=$name&nic=$nic_encr\">$rec[patient_name]<br></a>";
        }
    }

    
    mysqli_close($con); 

?>