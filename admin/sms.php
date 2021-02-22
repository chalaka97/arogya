<?php

$code="";
function smsVerification($userMobile, $userEmail){
$user = ""; // delete this beacuse of the security 
$password = ""; //delete this beacuse of the security 
     global $code;
     
    
   // echo "<script>alert('sms gateway')</script>";
    $code = rand(1000,9999);
    //$ency = sha1($code); //Encypted code here
    
    $text = urlencode("Arogya Hospital PVT LTD. This is your verification code $code. Thanks for verifying your $userEmail account.
    Arogya Team. ");
    $to = $userMobile;

    $baseurl ="http://www.textit.biz/sendmsg";
    $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
    $ret = file($url);

    $res= explode(":",$ret[0]);

//    if (trim($res[0])=="OK")
//        {
//        echo "Message Sent - ID : ".$res[1];
//        
//        
//        }
//        else
//        {
//        echo "Sent Failed - Error : ".$res[1];
//        }
//   
    
 

    
//    echo "h".$code."<br>";
}

//smsVerification("h", "jj");

function getValue(){
    
    global $code;
    return $code;
}
/*echo getValue();*/



?>

