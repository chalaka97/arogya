<?php
    require_once "../connection/connection.php"; 
    include('smsWebTCRLink.php');
    date_default_timezone_set("Asia/Colombo");
    
    $_SESSION['doctor_reg_id'] = "doc001";

    $p_name=$_GET['p_name'];
    $p_mobile=$_GET['p_mobile'];
    $appointment_id = "1023";
    $link = "";
    //$date=date("Y:m:dd");
    //$time=date("h:i:s");

    $sql="SELECT * FROM `session` WHERE doc_id='$_SESSION[doctor_reg_id]'";
    $resu=mysqli_query($con,$sql);
    $recode=(mysqli_fetch_assoc($resu));

    if(isset($_POST['send_btn'])){

        $link = $_POST['zoomLink'];
        //$msg="update webtcrdoc set is_msg_send=1 where patient_id='$p_id'";
        //$msg="update appointment set isApproved=1 where patient_id='$p_id'";

            smsZoomLink($p_name,$p_mobile,$appointment_id,$link,$recode['date'],$recode['time'],$link);
        }

    
?>

<html>
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
                .img{
                    background-size: cover;
                    background-attachment: fixed;
                    background-repeat: no-repeat;
                    background-position: center;
                    
                }

                .msgframe{
                    width: 100%;
                    height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                body{

                    background: linear-gradient(to top left,rgba(0,0,0,0.5)0%,#728db8 100%), url("../img/doctor.jpg");
                }

                .form label {
                    font-size: 24px;
                    color: rgba(255, 255, 255, 0.6);
                    margin-bottom: 10px;
                }

                input[type=text],
                input[type=textarea],
                input[type=password],
                input[type=email] {
                    margin: 10px;
                    padding: 0px 0px 0px 10px;
                    border: 1px solid rgba(255, 255, 255, 0.6);
                    background-color: rgba(255, 255, 255, 0.2);
                    height: 30px;
                    width: 220px;
                    border-radius: 7px;
                    outline: none;
                    color: #FFF;
                }
                
                input[type=submit] {
                    margin-top: 10px;
                    padding: 2px;
                    height: 30px;
                    width: 100px;
                    border: 1px solid rgba(255, 255, 255, 0.6);
                    background-color: rgba(255, 255, 255, 0.2);
                    color: #ffffff;
                    border-radius: 7px;
                    outline: none;
                    transition: transform 0.4s;
                }
                
                input[type=submit]:hover {
                    transform: scale(1.1);
                    transition: transform 0.4s;
                }
                
                input[type=submit]:active {
                    transform: scale(0.9);
                    transition: transform 0.4s;
                }
                
                ::placeholder {
                    color: rgba(255, 255, 255, 0.7);
                }

            </style>
        </head>
    <body class="img">
        <div class="msgframe">
            <table>
                <form method="post">
                   
                    <tr>    
                        <th>Patient Name</th>
                        <td><input type="text"  id="p_Name" value="<?php echo $p_name;?>" required></td>
                    </tr>
                    <tr>
                        <th>Patient Mobile</th>
                        <td><input type="text"  id="p_mobile" value="<?php echo $p_mobile;?>" required></td>
                    </tr>
                    <tr>
                        <th>Link</th>
                        <td><input type="text"  id="msg" name ="zoomLink" placeholder="Add the zoom link...." required>
                        <?php
                            //echo $link;
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="message" name="send_btn"  id="p_mobile" required></td>
                    </tr>

        </div>

    </body>

</html>


    <?php 
            mysqli_close($con);

    ?>
