<!doctype html>
<html class="no-js" lang="en">
  <?php
//    session_start();
    $Message = "";
   include('./header.php');
   include('../connection/connection.php');
    

?>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <style>
        
            .table {
                height: 200px;
                }
        </style>

        <link rel="stylesheet" href="../css/blood.css">
    
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
              <h2 class="no-margin-bottom">View Blood</h2> 
            </div>
          </header>
                        <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <br>
                          
                            <a href="../mlt/blood_add.php" ><button type="button" class="btn btn-outline-primary"><i class="fas fa-list"></i> Add Blood</button></a>
                            <br><hr><br>
                            <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="panel post">
                                    <a href="#" class="fa-links">

                                    <?php
                                            foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "A+" AND blood_status = "available"') as $row){
                                                echo'<h4>Packets : </h4><span>'. $row['COUNT(*)'].'</span>';
                                                echo'<h4>Blood group : </h4>A+';
                                            }
                                                ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel post">
                                    <a href="#" class="fa-links">
                                    <?php
                                            foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "A-" AND blood_status = "available"') as $row){
                                                echo'<h4>Packets : </h4><span>'. $row['COUNT(*)'].'</span>';
                                                echo'<h4>Blood group : </h4>A-';
                                            }
                                                ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel post">
                                    <a href="#" class="fa-links">
                                    <?php
                                            foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "B+" AND blood_status = "available"') as $row){
                                                echo'<h4>Packets : </h4><span>'. $row['COUNT(*)'].'</span>';
                                                echo'<h4>Blood group : </h4>B+';
                                            }
                                                ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel post">
                                    <a href="#" class="fa-links">
                                    <?php
                                            foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "B-" AND blood_status = "available"') as $row){
                                                echo'<h4>Packets : </h4><span>'. $row['COUNT(*)'].'</span>';
                                                echo'<h4>Blood group : </h4>B-';
                                            }
                                                ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="panel post">
                                    <a href="#" class="fa-links">
                                    <?php
                                            foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "AB+" AND blood_status = "available"') as $row){
                                                echo'<h4>Packets : </h4><span>'. $row['COUNT(*)'].'</span>';
                                                echo'<h4>Blood group : </h4>AB+';
                                            }
                                                ?>
                                    </a>
                                </div>
                            </div><div class="col-sm-6 col-md-3">
                                <div class="panel post">
                                    <a href="#" class="fa-links">
                                    <?php
                                            foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "AB-" AND blood_status = "available"') as $row){
                                                echo'<h4>Packets : </h4><span>'. $row['COUNT(*)'].'</span>';
                                                echo'<h4>Blood group : </h4>AB-';
                                            }
                                                ?>
                                    </a>
                                </div>
                            </div><div class="col-sm-6 col-md-3">
                                <div class="panel post">
                                    <a href="#" class="fa-links">
                                    <?php
                                            foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "O+" AND blood_status = "available"') as $row){
                                                echo'<h4>Packets : </h4><span>'. $row['COUNT(*)'].'</span>';
                                                echo'<h4>Blood group : </h4>O+';
                                            }
                                                ?>
                                    </a>
                                </div>
                            </div><div class="col-sm-6 col-md-3">
                                <div class="panel post">
                                    <a href="#" class="fa-links">
                                    <?php
                                            foreach($con->query('SELECT COUNT(*) FROM blood WHERE blood_type = "O-" AND blood_status = "available"') as $row){
                                                echo'<h4>Packets : </h4><span>'. $row['COUNT(*)'].'</span>';
                                                echo'<h4>Blood group : </h4>O-';
                                            }
                                                ?>
                                    </a>
                                </div>
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