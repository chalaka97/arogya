<!doctype html>
<html class="no-js" lang="en">
  <?php
    session_start();
    $recivers = "";
    $title = "";
    $msg = "";
    $date = "";
   include('../include/header.php');
   include('../connection/connection.php');
    
    if(isset($_POST["submit"])){
        
        $title = $_POST["title"];
        $msg = $_POST["message"];
        $recivers = implode(',',$_POST["receivers"]);
        $date = date("Y-m-d");
      
            $queryNotification = "INSERT INTO  notification(title,msg,role,date)
                VALUES('$title','$msg','$recivers',' $date')";

            $runNoti=mysqli_query($con,$queryNotification);

                if($runNoti){
                 
                   // $Message="Added";
                    echo "<script>alert('added')</script>"; 

                }
                else{
                   
                    // $Message="Error";
                      echo "<script>alert('Error')</script>"; 
                }
        }
       
 
?>
  

<body>
    
    <!-- header-start -->
        <?php
   include('../admin/adminDash.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Send Notification</h2> 
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                          
                            <a href="../admin/viewNotification.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> View Notification</button></a>
                            <br><hr><br>
                            
                           <form method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Title <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="title" id="fullName" placeholder="titile" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Message<sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    
                                    <div class="col-sm-7">
                                        <textarea class="form-control" name="message" id="message" cols="70" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Name" required></textarea>
                                    </div>
                                
                                </div>
                                
                               
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Receivers <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <div>
                                          <input type="checkbox" id="admin" value="admin" name="receivers[]"
                                                 checked>
                                          <label for="admin">Admin</label>
                                        </div>
                                        <div>
                                          <input type="checkbox" id="doctor" value="doctor" name="receivers[]"
                                                 checked>
                                          <label for="doctor">Doctor</label>
                                        </div>
                                        <div>
                                          <input type="checkbox" id="patient" value="patient" name="receivers[]"
                                                 checked>
                                          <label for="patient">Patient</label>
                                        </div>
                                        <div>
                                          <input type="checkbox" id="pharmacist" value="pharmacist" name="receivers[]"
                                                 checked>
                                          <label for="pharmacist">Pharmacist</label>
                                        </div>
                                        <div>
                                          <input type="checkbox" id="mlt" value="mlt" name="receivers[]"
                                                 checked>
                                          <label for="mlt">MLT</label>
                                        </div>
                                        <div>
                                          <input type="checkbox" id="reception" value="reception" name="receivers[]"
                                                 checked>
                                          <label for="reception">Reception</label>
                                        </div>
                                    </div>
                                </div>
                                 
                                
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        <input type ="reset" name="reset" value ="Reset" class="btn btn-danger registerBtn">
                                        <input type ="submit" name="submit" value ="Send Notification" class="btn btn-success registerBtn">
                                    </div>
                                </div>
                            </form>
                            
                             
<!-- footer start -->
<?php
   include('../include/footer.php');
?>
<!-- footer end  -->
 
    
    <!-- form itself end -->

    <!-- JS here -->
    <!-- JS here -->
    <script src="../js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/ajax-form.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/scrollIt.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/nice-select.min.js"></script>
    <script src="../js/jquery.slicknav.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="../js/contact.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.form.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/mail-script.js"></script>

    <script src="../js/main.js"></script>
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
    </script>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</html>