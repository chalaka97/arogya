<?php

function smsZoomLink($userName, $userMobile,$appointmentId,$date,$time){
$user = "94771712924";
$password = "2461";
    
   
    $text = urlencode("Arogya Hospital PVT LTD. Dear $userName, Your appointment ID: $appointmentId, on $date , at $time Please Come for your phisiotheropy session on time.
    Arogya Team. ");
    $to = $userMobile;

    $baseurl ="http://www.textit.biz/sendmsg";
    $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
    $ret = file($url);

    $res= explode(":",$ret[0]);

    if (trim($res[0])=="OK")
        {
        
        echo '<script>alert("Message sent Successfully")</script>'; 
        //echo "Message Sent - ID : ".$res[1];
        
        
        }
        else
        {
        echo "Sent Failed - Error : ".$res[1];
        }
   

    
//    echo "h".$code."<br>";
}

?>