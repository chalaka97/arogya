<?php
    session_start();
    include('../connection/connection.php'); 
?>
<?php 

    $msg = "";
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $district=$_POST['district'];
        $mobile=$_POST['mobile'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $blood_type=$_POST['blood_type'];
        $img=$_POST['img'];

        if (isset($_FILES['img']['name']) && ($_FILES['img']['name']!="")) {
            $temp = $_FILES['img']['tmp_name'];
            $img = $_FILES['img']['name'];
            move_uploaded_file($temp, "../img/profilePic/$img");
        }

        $sql=mysqli_query($con,"Update patient set name='$name', patient_email='$email', address='$address',district='$district', mobile='$mobile', age='$age', gender='$gender', blood_type='$blood_type', img='$img' where patient_email='". $_SESSION['patient_email'] ."'");
        
        if($sql){
            $msg ="Your Profile updated Successfully !!";

        }else{
            $msg ="Unable to update your profile!!";
        }

    }

    
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <title>Arogya | Edit Profile</title>
    <?php
        include('../include/header.php');
    ?>
    <!--Bootstrap 4 pic -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>   
    <!-- header-start -->
    <?php
        include('patientDash.php');
    ?>
    <!-- header-end -->

    <br><br>

    <!-- body start -->
    <div class="container p-0">
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">Edit Profile</h2>
            </div>
        </header>
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
        <h4 class="text-center">
            <?php echo ($row['name']);?>'s Profile
        </h4>

            <?php echo "<font color='green'>".$msg."</font>"?><br><br>
            <form role="form" name="edit-profile" method="post">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Patient Name</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="name" class="form-control" value="<?php echo ($row['name']);?>" reqiured>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Patient Email</strong>
                </label>
                <div class="col-sm-7">
                      <input type="email" name="email" class="form-control" value="<?php echo ($row['patient_email']);?>" reqiured>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Address</strong>
                </label>
                <div class="col-sm-7">
                     <textarea name="address" class="form-control" required><?php echo ($row['address']);?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>District</strong>
                </label>
                <div class="col-sm-7">
                    <select name="district" class="form-control" required>
                        <option value="<?php echo ($row['district']);?>"><?php echo ($row['district']);?></option>
                        <option value="Gampaha">Gampaha</option> 
                        <option value="Colombo">Colombo</option> 
                        <option value="Kalutara">Kalutara</option> 
                        <option value="Kandy">Kandy</option> 
                        <option value="Kegalle">Kegalle</option>
                        <option value="Jaffna">Jaffna</option> 
                        <option value="Kilinochchi">Kilinochchi</option> 
                        <option value="Mannar">Mannar</option> 
                        <option value="Mullaitivu">Mullaitivu</option> 
                        <option value="Vavuniya">Vavuniya</option> 
                        <option value="Puttalam">Puttalam</option> 
                        <option value="Kurunegala">Kurunegala</option> 
                        <option value="Polonnaruwa">Polonnaruwa</option> 
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Matale">Matale</option> 
                        <option value="Nuwara Eliya">Nuwara Eliya</option> 
                        <option value="Ratnapura">Ratnapura</option> 
                        <option value="Trincomalee">Trincomalee</option> 
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Ampara">Ampara</option> 
                        <option value="Badulla">Badulla</option>
                        <option value="Monaragala">Monaragala</option> 
                        <option value="Hambantota">Hambantota</option> 
                        <option value="Matara">Matara</option> 
                        <option value="Galle">Galle</option> 
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Mobile No.</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="mobile" class="form-control" value="<?php echo ($row['mobile']);?>" pattern="0[0-9]{9}" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Age</strong>
                </label>
                <div class="col-sm-7">
                    <input type="text" name="age" class="form-control" required  value="<?php echo ($row['age']);?>" maxlength="3">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Gender</strong>
                </label>
                <div class="col-sm-7">
                    <select name="gender" class="form-control" required>
                        <option value="<?php echo ($row['gender']);?>"><?php echo ($row['gender']);?></option>
                        <option value="male">Male</option>  
                        <option value="female">Female</option>      
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Blood Type</strong>
                </label>
                <div class="col-sm-7">
                    <select name="blood_type" class="form-control" required>
                        <option value="<?php echo ($row['blood_type']);?>"><?php echo ($row['blood_type']);?></option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>  
                        <option value="O-">O-</option> 
                        <option value="AB">AB+</option>
                        <option value="AB">AB-</option>     
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><strong>Upload Your Image</strong></label>
                    <div class="col-sm-7">
                        <!--<img name="img" src="img/<?php echo $row['img']; ?>">-->
                        <input type="file" name="img">
                    </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3"></div>
                    <div class="col-sm-7">
                        <button type="submit" name="submit" class="btn btn-success saveBtn">
                            Update
                        </button>
                    </div>
            </div>
        </form>
        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- body end -->

    <!-- footer start -->
    <?php
       //include('../include/footer.php');
    ?>
    <!-- footer end  -->

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

    <script src="js/main.js"></script>
    
</body>

</html>

<?php
    mysqli_close($con);
?>