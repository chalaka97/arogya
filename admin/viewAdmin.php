<!doctype html>
<html class="no-js" lang="en">
  <?php
    session_start();
    $Message = "";
    include('../include/header.php');
    include('../connection/connection.php');
    

//    if(isset($_POST["deleteadmin"])){
//        $id = $_POST["userId"];
//        $email = $_POST["userEmail"];
//        $updateQuA = "UPDATE admin SET is_delete =1 WHERE admin_id = $id";
//        $runQA=mysqli_query($con,$updateQuA);
////        echo "<script>alert($id) </script>";
//        //echo $id;
//        //user table deactive
//        $deactiveAdmin = "UPDATE user SET isDelete =1 WHERE email = '$email'";
//        $runQAdmin=mysqli_query($con,$deactiveAdmin);
//    }

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
              <h2 class="no-margin-bottom">View Admins List</h2> 
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                          
                            <a href="../admin/adminUadmin.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> Add Admin</button></a>
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
                        <table class="table table-hover table-striped " id="dev-table" style="height:200px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>E-mail</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Picture</th>
                                   
                                </tr>
                            </thead>
                            <div id="srchList"></div>
                            
                            <tbody class="tb">
                                <form method="post">
                                <?php
                                $selectQuA = "SELECT * FROM admin  WHERE is_delete=0 ORDER BY admin_id DESC";

                                  $runQA=mysqli_query($con,$selectQuA);

                                    if($runQA){
                                            while($data=mysqli_fetch_assoc($runQA)){
                                                $id=$data["admin_id"];
                                                $email=$data["admin_email"];
                                                $name=$data["name"];
                                                $mob=$data["mobile"];
                                                $img=$data["img"];
                                                
                                                echo"<input type=\"hidden\" value =\"$id\" name=\"userId\">";
                                                 echo"<input type=\"hidden\" value =\"$email\" name=\"userEmail\">";
                                                echo'<tr>';
                                                    echo"<td>$id</td>";
                                                    echo"<td>$email</td>";
                                                    echo"<td>$name</td>";
                                                    echo"<td>$mob</td>";
                                                    echo"<td><img src=$img width=\"50\" height=\"50\"></td>";
                                                    
                                                 echo'</tr>';
                                            }
                                    }
                              

                                ?>
                                </form>
						  </tbody>
					   </table>
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

</html>