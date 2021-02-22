<?php

function smsZoomLink($userName, $userMobile,$appointmentId,$link,$date,$time){
$user = "";//delete this beacuse of the security 
$password = ""; //delete this beacuse of the security 
    
   
    $text = urlencode("Arogya Hospital PVT LTD. Dear $userName, Your appointment ID: $appointmentId, on $date , at $time Please Join on time. Here is your Zoom link $link.
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