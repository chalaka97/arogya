<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
    
    include('../connection/connection.php');
    session_start();
    if(!isset($_SESSION['doctor_reg_id'])){
        header("location:../logout.php");
    }
    include('vaccine_sms.php');
    include('vaccine_header.php');

    function nameOf($idof,$con) {

    $out="";
    $select_c = "SELECT * FROM patient WHERE patient_id ='$idof'";
    $result_c=mysqli_query($con,$select_c);
    if($result_c){
      $count_d = mysqli_fetch_assoc($result_c);
      $out = $count_d['name'];
    }else{
        echo "Query Failed <br>";
    }
    return $out;
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
   include('vaccine_dash.php');
?>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">View Vaccination List</h2> 
            </div>
          </header>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <a href="vaccine_register.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> Add Baby for Treatments</button></a>

                            <a href="vaccine_view_pending_list.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i>&nbsp;Pedding List</button></a>
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
                                    <div class="col-12 pr-md-1">
                        <table class="table table-hover" id="dev-table">
                            <thead>
                                <tr>
                                    <th>Vaccine ID</th>
                                    <th>Name of the Baby</th>
                                    <th>Parent ID</th>
                                    <th>Parent Name</th>
                                    <th>Date of Birth</th>
                                    <th>Information</th>
                                </tr>
                            </thead>
                            <div id="srchList">
                                
                            </div>
                            
                            <tbody class="tb">
                                <?php
                                $select_q = "SELECT * FROM vaxination";

                                  $result=mysqli_query($con,$select_q);

                                    if($result){
                                        while($table=mysqli_fetch_assoc($result)){

                                            $vaccineId = $table['vaccine_id'];
                                            $baby_name = $table['baby_name'];
                                            $patientId = $table['patient_id'];
                                            $parent_name = nameOf($patientId,$con);
                                            $dob = $table['b_date'];
                                            
                                            echo'<tr>';
                                                echo"<td>$vaccineId</td>";
                                                echo"<td>$baby_name</td>";
                                                echo"<td>$patientId</td>";
                                                echo"<td>$parent_name</td>";
                                                echo"<td>$dob</td>";
                                                echo "<td><form method=\"post\" action=\"baby_details.php\"><a href=\"vaccine_baby_details.php?vaccine_id=$vaccineId\"><input type=\"button\" id=\"info\" value=\"Information\" name=\"info\" class=\"btn btn-success saveBtn\"></a></form></td>";
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
   include('vaccine_footer.php');
?>
<!-- footer end  -->
 
    
    <!-- form itself end -->

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

    </script>
    <script>
        $("#srch1").on("keyup",function(){
            var value=$(this).val();
            $("table tr").each(function(records){
                if(records!==0){
                    var id=$(this).find("td:first").text();
                    var id2=$(this).find("td:first+").text();
                    var id3=$(this).find("td:first+2").text();
                    if((id.indexOf(value)!==0)&&(id2.indexOf(value)!==0)&&(id3.indexOf(value)!==0)){
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
<?php
    mysqli_close($con); 
?>
</html>