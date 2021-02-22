<!doctype html>
<html class="no-js" lang="en">
  <?php
    $Message = "";
   include('../include/header.php');
   include('../connection/connection.php');
    

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
              <h2 class="no-margin-bottom">View All Blood</h2> 
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                          
                            <a href="blood_add.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> Add Blood</button></a>
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
                        <table class="table table-hover" id="dev-table" style="height:200px">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    
                                    <th>Blood Group</th>
                                    <th>Location</th>
                                    <th>Deposite Date</th>
                                   
                                </tr>
                            </thead>
                            <div id="srchList"></div>
                            
                            <tbody class="tb">
                                <?php
                                $selectQuA = "SELECT * FROM blood WHERE blood_status='available' ORDER BY blood_date ASC";

                                  $runQA=mysqli_query($con,$selectQuA);

                                    if($runQA){
                                            while($data=mysqli_fetch_assoc($runQA)){
                                                $id=$data["blood_Id"];
                                                $date=$data["blood_date"];
                                                $type=$data["blood_type"];
                                                $details=$data["blood_details"];
                                            
                                                
                                                echo'<tr>';
                                                    // echo"<td>$id</td>";
                                                    
                                                    echo"<td>$type</td>";
                                                    echo"<td>$details</td>";
                                                    echo"<td>$date</td>";
                                                    echo"<td><a href=\"blood_used.php?id=$data[blood_Id]\" class=\"btn btn-success saveBtn\">Use</a> </td>";
                                                    // echo"<td><input type=\"submit\" value=\"Destroy\" name=\"deleteadmin\" class=\"btn btn-danger saveBtn\"></td>";
                                                    echo"<td><a href=\"blood_destroy.php?id=$data[blood_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn btn-danger saveBtn\">Destroy</a></td>";
                                                 echo'</tr>';
                                            }
                                    }

                                ?>
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