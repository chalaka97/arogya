<?php
    session_start();

    //temp data
    $_SESSION['patient_id'] = "p001";

    require_once "../connection/connection.php";
    //include('Dashboard.php');

    date_default_timezone_set("Asia/Colombo");

  ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Arogya</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">
        

            <!-- CSS here -->
            <link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/owl.carousel.min.css">
            <link rel="stylesheet" href="../css/magnific-popup.css">
            <link rel="stylesheet" href="../css/font-awesome.min.css">
            <link rel="stylesheet" href="../css/themify-icons.css">
            <link rel="stylesheet" href="../css/nice-select.css">
            <link rel="stylesheet" href="../css/flaticon.css">
            <link rel="stylesheet" href="../css/gijgo.css">
            <link rel="stylesheet" href="../css/animate.css">
            <link rel="stylesheet" href="../css/slicknav.css">
            <link rel="stylesheet" href="../css/style.css">
            <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    
    
    <style>
        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .customers td, .customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .customers tr:hover {background-color: #ddd;}

        .customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color:#4da7fa;
            color: white;
        }

</style>
    
</head>

<body>
    
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                        
                            
                        </div>
                        <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> info@arogya.com</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i> 011-2 123 123</a></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                        </div>
                        
                        <div class="col-xl-4 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                        
                        
                        <div class="search">
                            <form action = "webtcr.php" method = "get">
                            <p>
                            <input type="text" name="search" id="txt_searchall" placeholder="Type Doctor name" required autofocus>
                            </p>
                            </form>
                            
                            
                        </div>
                        
                        
                        
                        
                        <div class="container">
                            <table class="customers table-striped">
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Specialization</th>
                                    <th>Mobile No</th>
                                    <th>Session Date</th>
                                    <th>Session Time</th>
                                    <th>Action</th>
        
                                </tr>
                                <?php 
                                    $query = "SELECT `s`.*, `d`.`doctor_reg_id`,`d`.`name`,`d`.`specialization`,`d`.`mobile` FROM `session` as `s`,`doctor` as `d` WHERE `s`.`doc_id`= `d`.`doctor_reg_id` AND  `s`.`doc_id` NOT IN (SELECT doc_id FROM `webtcrdoc` HAVING COUNT(doc_id)>5)";
                                    //$query = "SELECT `s`.*, `d`.`doctor_reg_id`,`d`.`name`,`d`.`specialization`,`d`.`mobile` FROM `session` as `s`,`doctor` as `d` WHERE `s`.`doc_id`= `d`.`doctor_reg_id` AND `s`.`doc_id` NOT IN (SELECT doctor_id FROM `appointment` WHERE `description`='webtcr' HAVING COUNT(doctor_id)>5)";
                                    $result = mysqli_query($con, $query);

                                    if($result){
                                        mysqli_num_rows($result);
                                        while($result2 = mysqli_fetch_assoc($result)){

                                ?>
                                
                                
                                <tr>
                                    <td align="center"><?php echo $result2['name']; ?></td>
                                    <td align="center"><?php echo $result2['specialization']; ?></td>
                                    <td align="center"><?php echo $result2['mobile']; ?></td>
                                    <td align="center"><?php echo $result2['date']; ?></td>
                                    <td align="center"><?php echo $result2['time']; ?></td>

                                    <?php
                                        $query = "SELECT * FROM `webtcrdoc` WHERE `doc_id`='{$result2['doctor_reg_id']}' AND `patient_id`='{$_SESSION['patient_id']}' LIMIT 1";
                                        $result3 = mysqli_query($con, $query);

                                        if(mysqli_num_rows($result3)>0){
                                            echo "<td align=\"center\"><input  type=\"button\" name = \"button\" id=\"{$result2['session_id']}\" value=\"Remove Appoinment\" class=\"btn btn-danger\" onclick=\"set_appoinment('{$result2['session_id']}','{$result2['doctor_reg_id']}','{$_SESSION['patient_id']}')\"  ></td>";
                                        }else{
                                            echo "<td align=\"center\"><input  type=\"button\" name = \"button\" id=\"{$result2['session_id']}\"  value=\"Add Appoinment\" class=\"btn btn-primary\" onclick=\"set_appoinment('{$result2['session_id']}','{$result2['doctor_reg_id']}','{$_SESSION['patient_id']}')\"  ></td>";
                                        }
                                    ?>

                                   
            
                                </tr>
                                
                                <?php
                                    }
                                }
                        ?>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </header>



<script>

    function set_appoinment(session_id,doc_id,patient_id){

        var x = document.getElementById(session_id).value;
       

        if(x=="Remove Appoinment"){
            document.getElementById(session_id).value = "Add Appoinment";
            document.getElementById(session_id).classList.remove("btn-danger");
            document.getElementById(session_id).classList.add("btn-primary");
            availability = '1';
        }else{
            document.getElementById(session_id).value = "Remove Appoinment";
            document.getElementById(session_id).classList.remove("btn-primary");
            document.getElementById(session_id).classList.add("btn-danger");
            availability = '0';
        }
    

        $.ajax({
            type: "POST",
            url: "add_appoinment.php",
            data:  "availability="+ availability + "&doc_id=" + doc_id+ "&patient_id=" + patient_id,
            success: function(data) {
                alert("sucess");
            }
        });

    }

</script>
<script>
            $(document).ready(function(){
              // Search all columns
              $('#txt_searchall').keyup(function(){
                // Search Text
                var search = $(this).val();
                // Hide all table tbody rows
                $('table tbody tr').hide();
                // Count total search result
                var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;
                if(len > 0){
                  // Searching text in columns and show match row
                  $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
                    $(this).closest('tr').show();
                  });
                }else{
                  $('.notfound').show();
                }
              });
            });
            // Case-insensitive searching (Note - remove the below script for Case sensitive search )
            $.expr[":"].contains = $.expr.createPseudo(function(arg) {
               return function( elem ) {
                 return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
               };
            });     
        </script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


    <?php 
            mysqli_close($con);

    ?>
