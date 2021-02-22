<!doctype html>
<html class="no-js" lang="en">
  <?php
    session_start();
    $Message = "";
    include('../include/header.php');
    include('../connection/connection.php');
    
    if(isset($_POST["deleteNoti"])){
        $id = $_POST["notificationId"];
        $deleteQu = "DELETE FROM notification WHERE notification_id= $id";
        $runQA=mysqli_query($con,$deleteQu);
        
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
              <h2 class="no-margin-bottom">View Notification List</h2> 
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                          
                            <a href="../admin/sendNotification.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> Send Notification</button></a>
                            <br><hr><br>
                          
                            
                             <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 pr-md-1">
                        <table class="table table-hover" id="dev-table" style="height:200px">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Recivers</th>
                                    <th>Date</th>
                                   
                                </tr>
                            </thead>
                            <div id="srchList"></div>
                            
                            <tbody class="tb">
                                <form method="post">
                                <?php
                                $selectQuA = "SELECT * FROM notification ORDER BY notification_id DESC";

                                  $runQA=mysqli_query($con,$selectQuA);

                                    if($runQA){
                                            while($data=mysqli_fetch_assoc($runQA)){
                                                $id=$data["notification_id"];
                                                $title=$data["title"];
                                                $msg=$data["msg"];
                                                $rec=$data["role"];
                                                $date=$data["date"];
                                                echo"<input type=\"hidden\" value =\"$id\" name=\"notificationId\">";
                                                echo'<tr>';
                                                    echo"<td>$id</td>";
                                                    echo"<td>$title</td>";
                                                    echo"<td>$msg</td>";
                                                    echo"<td>$rec</td>";
                                                    echo"<td>$date</td>";
                                                   
                                                echo"<td><input type=\"submit\" value=\"Delete\" name=\"deleteNoti\" class=\"btn btn-danger saveBtn\"></td>";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</html>