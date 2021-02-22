<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
session_start();
    $_SESSION['doctor_reg_id'] = "doc001";

    include('../connection/connection.php');
    
    if(!isset($_SESSION['doctor_reg_id'])){
        header("location:../logout.php");
    }
    include('vaccine_sms.php');
    include('vaccine_header.php');

    // function nameOf($idof,$con) {

    // $out="";
    // $select_c = "SELECT * FROM patient WHERE patient_id ='$idof'";
    // $result_c=mysqli_query($con,$select_c);
    // if($result_c){
    //   $count_d = mysqli_fetch_assoc($result_c);
    //   $out = $count_d['name'];
    // }else{
    //     echo "Query Failed <br>";
    // }
    // return $out;
    // }
?>
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
            margin-top: 70px;
            margin-bottom: 150px;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .customers td, .customers th {
            border: 1px solid #0a0a0a;
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
    
    <!-- header-start -->
        <?php
   include('vaccine_dash.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
            </div>
          </header>
                <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                            <table class="customers table-striped">
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Button</th>
        
                                </tr>
                                <?php 
                                    $query = "select p.patient_id,p.name,p.address,p.mobile,p.age,p.gender from patient p,appointment a where p.patient_id=a.patient_id and a.specialization='physiotheropy' and a.doctor_id='$_SESSION[doctor_reg_id]'" ;
                                                                
                                    $result = mysqli_query($con, $query);

                                    if($result){
                                        mysqli_num_rows($result);
                                        while($result2 = mysqli_fetch_assoc($result)){

                                ?>
                                
                                
                                <tr>
                                    <td align="center"><?php echo $result2['patient_id']; ?></td>
                                    <td align="center"><?php echo $result2['name']; ?></td>
                                    <td align="center"><?php echo $result2['address']; ?></td>
                                    <td align="center"><?php echo $result2['mobile']; ?></td>
                                    <td align="center"><?php echo $result2['age']; ?></td>
                                    <td align="center"><?php echo $result2['gender']; ?></td>
                                    <td align="center"><a href="messageform2.php?p_name=<?php echo $result2['name'];?>&p_mobile=<?php echo $result2['mobile']; ?>"><input type="submit" name="btn" value="Send Message" class="btn"></a></td>
               
            
                                </tr>
                                
                                <?php
                                    }
                                }
                        ?>
                            </table>
                        </div>
                    </div>
                        </div>
        
        
          
<!--end code-->
    
<!-- footer start -->
<div class="row">
    <div class="col-md-12" style="margin-top:80px">
<?php
    include('../include/footer.php');
?>
    </div>
</div>
<!-- footer end  -->
 
    
    <!-- form itself end -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    </script>
    <script>
        $("#srch1").on("keyup",function(){
            var value=$(this).val();
            $("table tr").each(function(records){
                if(records!==0){
                    var id=$(this).find("td:first").text();
                    var id2=$(this).find("td:first+").text();
                    var id3=$(this).find("td:first+2").text();
                    if((id.indexOf(value)!==0)&&(id2.indexOf(value)!==0)&&(id3.indexOf(value)!==0)){
                       $(this).hide();
                       }else{
                           $(this).show();
                       }
                   }
            });
        });
    </script>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<?php
    mysqli_close($con); 
?>
</html>