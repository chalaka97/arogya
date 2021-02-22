<?php
    session_start();
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
        <style>
            .profile_pic{
                width:50%;
                height: 50px;
                border-collapse: separate;
                border-spacing: 16px;
                position: relative;
                top: 100px;
                left: 50px;
            }
            .img_p img{
                width: 200px;
                height: 200px;
                 border-radius:50%;
            }
        </style>
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
                    <?php
                        $ret=mysqli_query($con,"select * from patient where patient_email='". $_SESSION['patient_email'] ."'");
                        while ($row=mysqli_fetch_array($ret)) {
                    ?>
                            <div class="profile_pic">
                                <div class="img_p" align="center">
                                    <img name="img" src="../img/profilePic/<?php echo $row['img']; ?>">
                                </div>
                            </div>           
                        <?php 
                            }
                        ?> 

            <div class="col-md-12 form">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="row margin-top-30">
                        <div class="col-lg-8 col-md-12">        
        <?php 
            $sql=mysqli_query($con,"select * from patient where patient_email='". $_SESSION['patient_email'] ."'");
            while($row=mysqli_fetch_array($sql))
            {
        ?>
        <br><br><br><br><br><br><br><br><br><br>
        <form role="form" name="edit-profile" method="post">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Patient Name</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="name" class="form-control" value="<?php echo ($row['name']);?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Patient Email</strong>
                </label>
                <div class="col-sm-7">
                      <input type="email" name="email" class="form-control" value="<?php echo ($row['patient_email']);?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Address</strong>
                </label>
                <div class="col-sm-7">
                     <textarea name="address" class="form-control" readonly><?php echo ($row['address']);?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>District</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="district" class="form-control" readonly value="<?php echo ($row['district']);?>" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Mobile No.</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="mobile" class="form-control" value="<?php echo ($row['mobile']);?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Age</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="age" class="form-control" readonly  value="<?php echo ($row['age']);?>" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Gender</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="gender" class="form-control" readonly  value="<?php echo ($row['gender']);?>" >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Blood Type</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="blood_type" class="form-control" value="<?php echo ($row['blood_type']);?>" readonly>     
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <a href="change_pwd.php">
                        <input type="button" name="change_pwd" class="btn btn-success saveBtn" value="Change Password"></a>
                        <a href="deactivate.php">
                        <input type="button" name="deactivate" class="btn btn-success saveBtn" value="Deactivate Account"></a>
                    </div>
            </div>
        </form>
        <?php 
            } 
        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
              <!-- Dashboard Header Section    -->
        </div>               
        <!-- body end -->

        <!-- footer start -->
        <?php
           //include('../include/footer.php');
        ?>
        <!-- footer end  -->
        
        
    </body>
</html>