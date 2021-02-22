<!doctype html>
<html class="no-js" lang="en">
  <?php
    session_start();
    $Message = "";
    include('../include/header.php');
    include('../connection/connection.php');
    
        if(isset($_POST["deleteDoctor"])){
        $id = $_POST["userId"];
        $email = $_POST["userEmail"];
            
//            echo "<script>alert('$id')</script>";
        $updateQuD = "UPDATE doctor SET is_delete =1 WHERE doctor_reg_id = '$id'";
        $runQA=mysqli_query($con,$updateQuD);
        $deactiveDoc = "UPDATE user SET isDelete =1 WHERE email = '$email'";
        $runQDoc=mysqli_query($con,$deactiveDoc);
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
              <h2 class="no-margin-bottom">View Doctors List</h2> 
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                          
                            <a href="../admin/adminUdoctor.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> Add Doctor</button></a>
                            <br><hr><br>
                            <div class="row">
                                <div class="col-md-11 pl-md-5">
                                    <div>
                                        <div class="form-group">
                                        <h4 for="exampleInputSearch">Search</h4>
                                        <input type="text" class="form-control" placeholder="Search" name="search" id="srch1">
                                      </div>

                                    </div>
                                </div>
                            </div>
                            <!--table here-->
                            
                             <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 pr-md-1">
                            <form method="post">
                        <table class="table table-hover table-striped " id="dev-table" style="height:200px">
                            <thead>
                                <tr>
                                    <th>Register ID</th>
                                    <th>E-mail</th>
                                    <th>Name</th>
                                    <th>Specialization</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Fee</th>
                                    <th>Picture</th>
                                   
                                </tr>
                            </thead>
                            <div id="srchList"></div>
                            
                            <tbody class="tb">
                                <?php
                                $selectQuD = "SELECT * FROM doctor where is_delete=0 ORDER BY name ASC";

                                  $runQD=mysqli_query($con,$selectQuD);

                                    if($runQD){
                                            while($data=mysqli_fetch_assoc($runQD)){
                                                $id=$data["doctor_reg_id"];
                                                $email=$data["doctor_email"];
                                                $name=$data["name"];
                                                $spec=$data["specialization"];
                                                $mob=$data["mobile"];
                                                $add=$data["address"];
                                                $fee=$data["amount"];
                                                $img=$data["img"];
                                                echo"<input type=\"hidden\" value =\"$id\" name=\"userId\">";
                                                 echo"<input type=\"hidden\" value =\"$email\" name=\"userEmail\">";
                                                echo'<tr>';
                                                    echo"<td>$id</td>";
                                                    echo"<td>$email</td>";
                                                    echo"<td>$name</td>";
                                                    echo"<td>$spec</td>";
                                                    echo"<td>$mob</td>";
                                                    echo"<td>$add</td>";
                                                    echo"<td>$fee</td>";
                                                    
                                                    echo"<td><img src=$img width=\"50\" height=\"50\"></td>";
                                                echo"<td><input type=\"submit\" value=\"Delete\" name=\"deleteDoctor\" class=\"btn btn-danger saveBtn\"></td>";
                                                 echo'</tr>';
                                            }
                                    }

                                ?>
						  </tbody>
					   </table>
                                </form>
                        </div>
				</div>
			</div>
                            
                      
                        </div>
                    </div>
            </div>
        
        
          
<!--end code-->
    
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