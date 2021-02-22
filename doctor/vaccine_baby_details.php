<?php
  include('../connection/connection.php');
  session_start();
  if(!isset($_SESSION['doctor_email'])){
        header("location:../logout.php");
    }
  include('vaccine_header.php');
  include('vaccine_sms.php');
 
// From patient
$parent_name="";
$contact="";

// From vaccine
$patien_id = "";
$baby_name="";
$dob="";
$status = "";

if (isset($_GET)) {
  $q1 = "SELECT * FROM `vaxination` WHERE vaccine_id = '{$_GET["vaccine_id"]}'";
  $res1 = mysqli_query($con,$q1);
  while ($data1 = mysqli_fetch_assoc($res1)) {
    $baby_name = $data1['baby_name'];
    $dob = $data1['b_date'];
    $gender = $data1['gender'];

    if (strcmp($gender,"M") == 0) {
      $gender = "Male";
    }elseif (strcmp($gender,"F") == 0){
      $gender = "Female";
    }else{
      $gender = "Other";
    }


    $status = $data1['state'];
    $patien_id = $data1['patient_id'];
    $doctor_id = $data1['doctor_id'];
    $vaccine_id = $data1['vaccine_id'];

    $vaccine_1 = $data1['vaccine_1'];
    $vaccine_2 = $data1['vaccine_2'];
    $vaccine_3 = $data1['vaccine_3'];
    $vaccine_4 = $data1['vaccine_4'];
    $vaccine_5 = $data1['vaccine_5'];
    $vaccine_6 = $data1['vaccine_6'];
    $vaccine_7 = $data1['vaccine_7'];

    if ($status == 0) {
      $v1 = "This Treatement is Not Compleated!";
      $v2 = "This Treatement is Not Compleated!";
      $v3 = "This Treatement is Not Compleated!";
      $v4 = "This Treatement is Not Compleated!";
      $v5 = "This Treatement is Not Compleated!";
      $v6 = "This Treatement is Not Compleated!";
      $v7 = "This Treatement is Not Compleated!";
      $v8 = "0 Treatements have Compleated!";
      $v9 = "7 Treatements To GO!";
    }elseif ($status == 1) {
      $v1 = "This Treatement is Compleated!";
      $v2 = "This Treatement is Not Compleated!";
      $v3 = "This Treatement is Not Compleated!";
      $v4 = "This Treatement is Not Compleated!";
      $v5 = "This Treatement is Not Compleated!";
      $v6 = "This Treatement is Not Compleated!";
      $v7 = "This Treatement is Not Compleated!";
      $v8 = "1 Treatement have Compleated!";
      $v9 = "6 Treatements To GO!";
    }
    elseif ($status == 2) {
      $v1 = "This Treatement is Compleated!";
      $v2 = "This Treatement is Compleated!";
      $v3 = "This Treatement is Not Compleated!";
      $v4 = "This Treatement is Not Compleated!";
      $v5 = "This Treatement is Not Compleated!";
      $v6 = "This Treatement is Not Compleated!";
      $v7 = "This Treatement is Not Compleated!";
      $v8 = "2 Treatements have Compleated!";
      $v9 = "5 Treatements To GO!";
    }
    elseif ($status == 3) {
      $v1 = "This Treatement is Compleated!";
      $v2 = "This Treatement is Compleated!";
      $v3 = "This Treatement is Compleated!";
      $v4 = "This Treatement is Not Compleated!";
      $v5 = "This Treatement is Not Compleated!";
      $v6 = "This Treatement is Not Compleated!";
      $v7 = "This Treatement is Not Compleated!";
      $v8 = "3 Treatements have Compleated!";
      $v9 = "4 Treatements To GO!";
    }
    elseif ($status == 4) {
      $v1 = "This Treatement is Compleated!";
      $v2 = "This Treatement is Compleated!";
      $v3 = "This Treatement is Compleated!";
      $v4 = "This Treatement is Compleated!";
      $v5 = "This Treatement is Not Compleated!";
      $v6 = "This Treatement is Not Compleated!";
      $v7 = "This Treatement is Not Compleated!";
      $v8 = "4 Treatements have Compleated!";
      $v9 = "3 Treatements To GO!";
    }
    elseif ($status == 5) {
      $v1 = "This Treatement is Compleated!";
      $v2 = "This Treatement is Compleated!";
      $v3 = "This Treatement is Compleated!";
      $v4 = "This Treatement is Compleated!";
      $v5 = "This Treatement is Compleated!";
      $v6 = "This Treatement is Not Compleated!";
      $v7 = "This Treatement is Not Compleated!";
      $v8 = "5 Treatements have Compleated!";
      $v9 = "2 Treatements To GO!";
    }
    elseif ($status == 6) {
      $v1 = "This Treatement is Compleated!";
      $v2 = "This Treatement is Compleated!";
      $v3 = "This Treatement is Compleated!";
      $v4 = "This Treatement is Compleated!";
      $v5 = "This Treatement is Compleated!";
      $v6 = "This Treatement is Compleated!";
      $v7 = "This Treatement is Not Compleated!";
      $v8 = "6 Treatements have Compleated!";
      $v9 = "1 Treatement To GO!";
    }
    elseif ($status == 7) {
      $v1 = "This Treatement is Compleated!";
      $v2 = "This Treatement is Compleated!";
      $v3 = "This Treatement is Compleated!";
      $v4 = "This Treatement is Compleated!";
      $v5 = "This Treatement is Compleated!";
      $v6 = "This Treatement is Compleated!";
      $v7 = "This Treatement is Compleated!";
      $v8 = "7 Treatements have Compleated!";
      $v9 = "You have Compleated the Vaccination!";
    }
  }

  $q2 = "SELECT * FROM `patient` WHERE patient_id = '{$patien_id}'";
  $res2 = mysqli_query($con,$q2);
  while ($data2 = mysqli_fetch_assoc($res2)) {
    $parent_name= $data2['name'];
    $contact= $data2['mobile'];
  }

  $q2 = "SELECT * FROM `doctor` WHERE doctor_reg_id = '{$doctor_id}'";
  $res2 = mysqli_query($con,$q2);
  while ($data2 = mysqli_fetch_assoc($res2)) {
    $doctor_name = $data2['name'];
  }
}

function colorof($cl) {
  $c = "This Treatement is Compleated!";
  $out = "";
  if ($cl == $c) {
    $out = "bg-green";
  }else{
    $out = "bg-red";
  }
  return $out;
}

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<body>
    <!-- header-start -->
<?php
   include('vaccine_dash.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Baby Information</h2>
            </div>
          </header>

          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">

              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-5">
                  <div class="bar-chart has-shadow " style="font-size: 18px; background-image: url('../img/doctor/img02.jpg');">
                    <div class="title text-dark">Name of the baby :- </div>
                    <div class="title text-dark">Name of the Parent :- </div>
                    <div class="title text-dark">Date of birth of the baby :-</div>
                    <div class="title text-dark">Gender of the baby :- </div>
                    <div class="title text-dark">Contact No :- </div>
                    <div class="title text-dark">Vaccine ID :- </div>
                    <div class="title text-dark">Doctor who treat :- </div>
                  </div>
                </div>
                <div class="col-5">
                  <div class="bar-chart has-shadow " style="font-size: 18px; background-image: url('../img/doctor/img02.jpg');">
                    <div class="title text-dark"><?php echo $baby_name; ?></div>
                    <div class="title text-dark"><?php echo $parent_name; ?></div>
                    <div class="title text-dark"><?php echo $dob; ?></div>
                    <div class="title text-dark"><?php echo $gender; ?> </div>
                    <div class="title text-dark"><?php echo $contact; ?></div>
                    <div class="title text-dark"><?php echo $vaccine_id; ?></div>
                    <div class="title text-dark"><?php echo $doctor_name; ?></div>
                  </div>
                </div>
                <div class="col-1">
                </div>
              </div>

              <div class="row">

                <div class="col-1">
                </div>
                <div class="col-5">
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img03.jpg');">
                    <div class="icon <?php echo(colorof($v1)); ?>"></div>
                    <div class="text"><strong>Vaccine 01</strong><br>Treatment date : <?php echo "$vaccine_1" ?><br><?php echo "$v1"; ?></div>
                  </div>
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img03.jpg');">
                    <div class="icon <?php echo(colorof($v3)); ?>"></div>
                    <div class="text"><strong>Vaccine 03</strong><br>Treatment date : <?php echo "$vaccine_3" ?><br><?php echo "$v3"; ?></div>
                  </div>
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img03.jpg');">
                    <div class="icon <?php echo(colorof($v5)); ?>"></div>
                    <div class="text"><strong>Vaccine 05</strong><br>Treatment date : <?php echo "$vaccine_5" ?><br><?php echo "$v5"; ?></div>
                  </div>
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img03.jpg');">
                    <div class="icon <?php echo(colorof($v7)); ?>"></div>
                    <div class="text"><strong>Vaccine 07</strong><br>Treatment date : <?php echo "$vaccine_7" ?><br><?php echo "$v7"; ?></div>
                  </div>
                </div>

                <div class="col-5">
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img03.jpg');">
                    <div class="icon <?php echo(colorof($v2)); ?>"></div>
                    <div class="text"><strong>Vaccine 02</strong><br>Treatment date : <?php echo "$vaccine_2" ?><br><?php echo "$v2"; ?></div>
                  </div>
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img03.jpg');">
                    <div class="icon <?php echo(colorof($v4)); ?>"></div>
                    <div class="text"><strong>Vaccine 04</strong><br>Treatment date : <?php echo "$vaccine_4" ?><br><?php echo "$v4"; ?></div>
                  </div>
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img03.jpg');">
                    <div class="icon <?php echo(colorof($v6)); ?>"></div>
                    <div class="text"><strong>Vaccine 06</strong><br>Treatment date : <?php echo "$vaccine_6" ?><br><?php echo "$v6"; ?></div>
                  </div>
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img03.jpg');">
                    <div class="icon bg-green"></div>
                    <div class="text"><strong>Compleation</strong><br><?php echo "$v8"; ?><br><?php echo "$v9"; ?></div>
                  </div>
                  <div class="statistic d-flex align-items-center has-shadow " style="background-image: url('../img/doctor/img02.jpg');">
                    <div class="icon bg-violet"></div>
                    <div class="text">
                      <strong>Delete</strong>
                      <br>You can delete this record form here<br>
                        <input type ="button" name="delete" value ="Delete" onclick="myDelete(<?php echo $vaccine_id ?>)" class="btn btn-danger btn-block registerBtn">
                        <p id="demo"></p>
                    </div>
                  </div>

                </div>
                <div class="col-1">
                </div>

              </div>
                
            </div>
          </section>
<?php
   include('vaccine_footer.php');
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    
    <script>

        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });

        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
          $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      	});

        function myDelete(id){

                var txt;
                var r = confirm("Are you sure you want to remove this record?!");
                if (r == true) {
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("demo").innerHTML = this.responseText;
                      }
                  };
                  xhttp.open("GET", "vaccine_delete_record.php?id="+id, true);
                  xhttp.send();
                  location.replace("vaccine_view_list.php");
                } else {

                }                
        }
    </script>
</body>

	<?php
		mysqli_close($con); 
	 ?>
</html>