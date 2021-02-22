<?php
    session_start();
    
    include('../connection/connection.php');

    $msg = "";
    if(isset($_POST['submit']))
    { 
        $isDone=1;
        $sql=mysqli_query($con,"Update appointment set isDone = '$isDone' where appointment_id='". $_GET['appointment_id'] ."' ");

        if($sql){
            $msg ="Your online payment Successfully !!";

        }else{
            $msg ="Unable to pay!!";
        }
    }
?>


<!doctype html>
<html>
    <head>
        <title>Arogya | Patient</title>
        <!-- header-start -->
        <?php
            include('../include/header.php');
        ?>     
        <!-- header-end -->
    </head>
    <body>   
         <?php
            include('patientDash.php');
        ?> 
        <!-- body start -->
        <div class="content-inner">
            <!-- Page Header-->
            <header class="page-header">
                <div class="container-fluid">
                  <h2 class="no-margin-bottom">Dashboard</h2>
                </div>
            </header>
            <!-- Dashboard Counts Section-->
            <div class="col-md-12 form">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">

            <?php echo "<font color='green'>".$msg."</font>"?><br><br>
            <h6>
                Select your payment type:
            </h6>
            <div class="form-group row">
                <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <input type="radio" name="payment" value=""><img src="../img/payment/1.jfif">
                        <input type="radio" name="payment" value=""><img src="../img/payment/2.png">
                        <input type="radio" name="payment" value=""><img src="../img/payment/3.png">
                    </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <a href="book-appointment.php">
                        <input type="button" name="back" class="btn btn-success saveBtn" value="Back"></a> 
                        <button type="submit" name="submit" class="btn btn-success saveBtn">
                            Pay
                        </button>
                    </div>
            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Dashboard Header Section    -->               
        <!-- body end -->

        <!-- footer start -->
        <?php
           //include('../include/footer.php');
        ?>
        <!-- footer end  -->
        
        
    </body>
</html>

<?php
    mysqli_close($con);
?>
