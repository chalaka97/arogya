<?php
session_start();
 include('../connection/connection.php');
 include('../include/header.php');
 include('../reception/Dashboard.php');

$msg="";
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
	$email=$_POST['email'];
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
	$img=$_POST['img'];

	if(isset($_FILES['img']['name']) && ($_FILES['img']['name']!="")) {
            $temp = $_FILES['img']['tmp_name'];
            $img = $_FILES['img']['name'];
            move_uploaded_file($temp, "../img/profilePic/$img");
        }


	$sql=mysqli_query($con,"Update reception set reception_id='$id',reception_email='$email',name='$name',mobile='$mobile',address='$address', img='$img' where reception_email='" . $_SESSION['reception_email'] ."'");
	
	if($sql)
			
		{
			$msg="update Successfully";
		}
	else{
		$msg="update Unsuccessfully";
	}

			
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Profile</title>
	</head>

	<body>
				
		<div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Edit Profile</h2>
                </div>
            </header>
        <div class="col-md-12">
        <div class="row no-gutters">
            <div class="col-md-12">


  				<div class="image">
                    <div class="img" align="center">
                        <div class="ima" align="center">
                                <img  src="<?php echo $_SESSION['reception_image'];?>">
                            </div>
                    </div>
                </div>
                

                    
               <div class="row margin-top-30">
                    <div class="col-lg-8 col-md-12"> 
						
                        	
		<!--<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
        <?php echo htmlentities($_SESSION['msg']="");?></p>-->

        <?php echo "<font color='green'>".$msg."</font>"."<br>"."<br>"?>

        <h4><?php echo $_SESSION['reception_name'];?>'s Profile</h4>

        	<form role="form" name="id" method="post" onsubmit="return valid();">
				<div class="form-group">
					<label for="id">
						Reseption id
					</label>
						<input type="text" name=id class="form-control" readonly="readonly" value="<?php echo $_SESSION['reception_id'] ;?>" >
				</div>


				<div class="form-group">
					<label for="email">
						Email Address
					</label>
						<input type="email" name=email id=email class="form-control" required="required" value="<?php echo $_SESSION['reception_email'] ;?>">
							
				</div>


				<div class="form-group">
					<label for="name">
						Name
					</label>
						<input type="text" name="name" class="form-control" required="required"  value="<?php echo $_SESSION['reception_name'];?>" >
				</div>
	

				<div class="form-group">
					<label for="mobile">
						Mobile
					</label>
						<input type="number" name=mobile id="mobile" class="form-control" required="required" maxlenth="10" value="<?php echo $_SESSION['reception_mobile'];?>">
				</div>



				<div class="form-group ">
                <label for="Upload Your Image">
                	Uplord Your Image
            	</label>
                    <div class="col-sm-7">
                        <!--<img name="img" src="img/<?php echo $row['img']; ?>">-->
                        <input type="file" name="img">
                    </div>
            </div>


														
														
			<button style="background-color:green";type="submit" name="submit" class="btn btn-o btn-primary">
				Update
			</button>

			<button style="background-color:red";type="submit" name="submit" class="btn btn-o btn-primary">
				Deactivate
			</button>
		</form>
				</div>
			</div>
			<?php
				include('../include/footer.php');
			?>	
		</div>


									
	<div class="col-lg-12 col-md-12">
		<div class="panel panel-white">
		</div>
	</div>
		</div>
	</div>
							

												

	
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../reception/assets/vendor/jquery/jquery.min.js"></script>
		<script src="../reception/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../reception/assets/vendor/modernizr/modernizr.js"></script>
		<script src="../reception/assets/vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../reception/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../reception/assets/vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="../reception/assets/vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../reception/assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../reception/assets/vendor/autosize/autosize.min.js"></script>
		<script src="../reception/assets/vendor/selectFx/classie.js"></script>
		<script src="../reception/assets/vendor/selectFx/selectFx.js"></script>
		<script src="../reception/assets/vendor/select2/select2.min.js"></script>
		<script src="../reception/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../reception/assets/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../reception/assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../reception/assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>



<?php  mysqli_close($con)?>



    