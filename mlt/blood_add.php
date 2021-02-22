<!doctype html>
<html class="no-js" lang="en">
  <?php
    $Message = "";
   include('../include/header.php');
    include('../connection/connection.php');

    if(isset($_POST["submit"])){
        
        $blood_date = $_POST["blood_date"];
        $blood_type = $_POST["blood_type"];
        $blood_location = $_POST["blood_details"];

        
        $addBlood = "INSERT INTO `blood` (`blood_Id`, `blood_date`, `blood_type`, `blood_details`, `blood_status`) VALUES (NULL, '$blood_date', '$blood_type', '$blood_location', 'available'); ";


        // $runAdd = mysqli_query($con,$addBlood);
        
    
            if($con->query($addBlood) === TRUE){
                
                // $Message="Added";
                echo "<script>alert('added')</script>"; 

            }
            else{
                
                // $Message="Error";
                    echo "<script>alert('Error')</script>"; 
                    // echo "Error: " . $sql . "<br>" . $con->error;
                    
            }
       
    }
    

?>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <style>
        
            .table {
                height: 200px;
                }
        </style>
    
    </head>

<body>
    
    <!-- header-start -->
        <?php
   include('../mlt/blood_manage.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Add Blood</h2> 
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                          
                            <a href="../mlt/blood_view.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> View Blood</button></a>
                            <br><hr><br>
                            
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong> Date <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name="blood_date" id="blood_date" placeholder="yyyy-mm-dd" required>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Blood Group <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <!-- <input type="text" class="form-control" name="blood_type" id="blood_type" placeholder="A+" required> -->
                                        <select name="blood_type" id="blood_type" class="form-control">
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"><strong>Location <sup><i class="fas fa-asterisk fa-xs"  style="color:red;"></i></sup></strong></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="blood_details" id="blood_details" placeholder="Anuradhapura Bank" required>
                                        
                                    </div>
                                    <!--<div class="col-sm-7">
                                        <select id="blood_details" name="blood_details" class="form-control">
                                            <option value="National Blood Bank-Colombo">National Blood Bank-Colombo</option>

                                            <option value="Central Blood Bank-Narahenpita">Central Blood Bank-Narahenpita</option>

                                            <option value="Regional Blood Center - Maharagama">Regional Blood Center - Maharagama</option>

                                            <option value="Kandy Hospital Blood Bank -">Kandy Hospital Blood Bank</option>

                                             <option value="Peradeniya Hospital Blood Bank -">Peradeniya Hospital Blood Bank</option>

                                        </select>
                                    </div>-->
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-7">
                                        <input type ="submit" name="submit" value ="Add Blood" class="btn btn-success registerBtn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
    
<!-- footer start -->
<?php
   include('../include/footer.php');
?>
<!-- footer end  -->
 
    
    <!-- form itself end -->

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
    <!-- <script src="js/mail-script.js"></script> -->

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
  <script>
             $("#srch1").on("keyup",function(){
                var value=$(this).val();
                $("table tr").each(function(records){
                    if(records!==0){
                        var id=$(this).find("td:first").text();
                        var id2=$(this).find("td:first+").text();
                        
                        if((id.indexOf(value)!==0) && ((id.toLowerCase().indexOf(value.toLowerCase()))<0)&&(id2.indexOf(value)!==0) && ((id2.toLowerCase().indexOf(value.toLowerCase()))<0)){
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
</html>