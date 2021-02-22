<?php
    include("../connection/connection.php");
    $today = strtotime(date("yy-m-d"));
    $details;
    $table ="";
    $table_d="";
    $noti = 0;
    $query = "SELECT DISTINCT* FROM drug limit 3";
    $result=mysqli_query($con,$query);

    if(mysqli_num_rows($result)>0){
        $details = mysqli_fetch_assoc($result);

        while($data =mysqli_fetch_assoc($result)){
            $diff = $today - strtotime($data['drug_expire_date']);
            $real =abs(floor($diff / (60 * 60 * 24)));
            //echo $real;
            if( $real < 7){
                $noti++;
                
                $table.="<li><a rel='nofollow' href='#' class='dropdown-item'>"; 
                $table.="<div class='notification'>";
                $table.="<div class='notification-content'><i class='fa fa-envelope bg-green'></i>".$data['drugsName']." Drug expire soon</div>";
                $table.="</div></a></li>";

                $table_d.="<tr>";
                $table_d.="<td>".$data['drugsName']." "."Drug is expired on"." ".$data["drug_expire_date"]."</td>";
                $table_d.="</tr>";


                

            }
            
        }
    }
    else{
        echo "no";
    }
    
?>
