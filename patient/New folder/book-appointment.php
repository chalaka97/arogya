<?php
    session_start();
    
    include('../connection/connection.php');

    $msg="";
    if(isset($_POST['submit']))
    {
        $type=$_POST['apptype'];
        $specilization=$_POST['specilization'];
        $doctorid=$_POST['doctor'];
        $patientid=$_SESSION['patient_id'];
        $fees=$_POST['fees'];
        $appdate=$_POST['appdate'];
        $time=$_POST['apptime'];
        $isApproved=1;
        $isDone=0;
        $query=mysqli_query($con,"insert into appointment(appointment_type,date, time,specialization,doctor_id,patient_id,isApproved,isDone,amount) values('$type','$appdate','$time','$specilization','$doctorid','$patientid','$isApproved','$isDone','$fees')");
        if($query){
            $msg = "Your appointment successfully booked !!"; 
        } else{
            $msg = "Unable to book your appointment!!"; 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User | Book Appointment</title>
        <?php
            include('../include/header.php');
        ?>
		<script>
			function getdoctor(val) {
				$.ajax({
					type: "POST",
					url: "get_doctor.php",
					data:'specilizationid='+val,
					success: function(data){
						$("#doctor").html(data);
					}
				});
			}
		</script>	
		<script>
			function getfee(val) {
				$.ajax({
					type: "POST",
					url: "get_doctor.php",
					data:'doctor='+val,
					success: function(data){
						$("#fees").html(data);
					}
				});
			}
		</script>	

	</head>
	<body>
        <!-- header-start -->
         <?php
            include('patientDash.php');
        ?>
        <!-- header-end -->	

        <!-- body-start -->
        <div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Book an Appointment</h2>
                </div>
            </header>

            <div class="col-md-12 form">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">  

<?php echo "<font color='green'>".$msg."</font>"."<br>"."<br>"?>

<form role="form" name="book-appointment" method="post" >
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">
            <strong>Doctor Specialization</strong>
        </label>
        <div class="col-sm-7">
            <select name="specilization" class="form-control" onChange="getdoctor(this.value);" required="required">
                <option value="" name="specilization">Select Specialization</option>
                    <?php 
                        $ret=mysqli_query($con,"select * from specilization");
                        while($row=mysqli_fetch_array($ret))
                        {
                    ?>
                <option value="<?php echo ($row['specilization']);?>" name="specilization">
                    <?php 
                        echo ($row['specilization']);
                    ?>
                </option>
                    <?php 
                        }
                    ?>
            </select>
        </div>
    </div>  

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">
            <strong>Doctors</strong>
        </label>
        <div class="col-sm-7">
            <select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
                <option value="">Select Doctor</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">
            <strong>Doctor Fees</strong>
        </label>
        <div class="col-sm-7">
            <select name="fees" class="form-control" id="fees"  readonly>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label">
            <strong>Payment Type</strong>
        </label>
        <div class="col-sm-7">
            <select name="apptype" class="form-control">
                <option value="">Select</option>
                    <?php
                        $arr = array("Online","Cash");
                        foreach($arr as $val)
                        {
                            echo "<option value='$val'>$val</option>";
                        }
                    ?>
            </select>
        </div>
    </div>
                                                        
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">
            <strong>Date</strong>
        </label>
        <div class="col-sm-7">
            <input type="date" class="form-control datepicker" name="appdate" required="required" data-date-format="yyyy-mm-dd" min=<?php echo date("Y-m-d"); ?>>
        </div>
    </div>
                                                        
    <div class="form-group row">
        <label class="col-sm-3 col-form-label"><strong>Time</strong>
        </label>
         <div class="col-sm-7">
            <select name="apptime" class="form-control">
                <option value="">Select</option>
                <option>9.00-10.00 A.M</option>
                <option>10.00-11.00 A.M</option>
                <option>11.00-12.00 A.M</option>
                <option>1.00-2.00 P.M</option>
                <option>2.00-3.00 P.M</option>
                <option>3.00-4.00 P.M</option>
            </select>
        </div>
    </div>                                                      
 
    <div class="form-group row">
        <div class="col-sm-7"> 
            <button type="submit" name="submit" class="btn btn-success saveBtn">Submit
            </button>
            <a href="payment.php">
                <input type="button" name="pay" class="btn btn-success saveBtn" value="Add to Pay">
            </a>
        </div>
    </div>


</form>
					       </div>
				        </div>
			        </div>
		        </div>
            </div>
        </div>


        <!-- body-end -->

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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

	</body>
</html>

<?php
    mysqli_close($con);
?>
