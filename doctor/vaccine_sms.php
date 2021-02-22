<?php

function numberOf($idof,$con) {

    $out="";
    $select_c = "SELECT * FROM patient WHERE patient_id ='$idof'";
    $result_c=mysqli_query($con,$select_c);
    if($result_c){
      $count_d = mysqli_fetch_assoc($result_c);
      $out = $count_d['mobile'];
    }else{
        echo "Query Failed <br>";
    }
    return $out;
}

function updateOf($idof,$con) {

    $out="";
    $sql="UPDATE `vaxination` SET state2=state2+1 WHERE vaccine_id='$idof'";
    $result=mysqli_query($con,$sql);
        if($result){
        }else{
            echo "Query Failed <br>";
        }
}

function sendSMS($date,$contact,$babyname,$gender,$vaccineId,$con) {
   
    $user = "94771712924";
    $password = "2461";
    $text = urlencode("Arogya Hospital PVT LTD. Your $gender $babyname have vaccine tratment is on $date. Please remember to follow helth guidlines and regulatins when you come to the hospital... Thank You! Best regard, Arogya Team. ");
    $to = "94$contact";
     
    $baseurl ="http://www.textit.biz/sendmsg";
    $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
    $ret = file($url);
     
    $res= explode(":",$ret[0]);
     
    if (trim($res[0])=="OK"){
        //echo "Message Sent - ID : ".$res[1];
        updateOf($vaccineId,$con);
    }
    else
    {
       // echo "Sent Failed - Error : ".$res[1];
    }
}


$select_q = "SELECT * FROM vaxination";
$result=mysqli_query($con,$select_q);
if($result){
    while($table = mysqli_fetch_assoc($result)){

        $vaccineId = $table['vaccine_id'];
        $doctorId = $table['doctor_id'];
        $patientId = $table['patient_id'];
        $dob = $table['b_date'];
        $state2 = $table['state2'];
        $babyname = $table['baby_name'];
        $gender = $table['gender'];

        if (strcmp($gender,"M") == 0) {
          $gender = "Son,";
        }elseif (strcmp($gender,"F") == 0){
          $gender = "daughter";
        }else{
          $gender = "Baby";
        }

        $date = "";
        $next = "";
        $contact = numberOf($patientId,$con);
        $today = date("Y-m-d");


            if ($state2 == 0) {
                $date = $table['vaccine_1'];
                $next = $table['vaccine_2'];
            }elseif ($state2 == 1) {
                $date = $table['vaccine_2'];
                $next = $table['vaccine_3'];
            }elseif ($state2 == 2) {
                $date = $table['vaccine_3'];
                $next = $table['vaccine_4'];
            }elseif ($state2 == 3) {
                $date = $table['vaccine_4'];
                $next = $table['vaccine_5'];
            }elseif ($state2 == 4) {
                $date = $table['vaccine_5'];
                $next = $table['vaccine_6'];
            }elseif ($state2 == 5) {
                $date = $table['vaccine_6'];
                $next = $table['vaccine_7'];
            }elseif ($state2 == 6) {
                $date = $table['vaccine_7'];
                $next = NULL;
            }else{
                $date = NULL;
                $next = NULL;
            }

            if(!$date==NULL){
                $cond = date("Y-m-d",strtotime(date("Y-m-d", strtotime($date)) . "-7 days"));   
                if ($cond < $today) {
                    sendSMS($date,$contact,$babyname,$gender,$vaccineId,$con);
                }
            }   
    }
}
?>