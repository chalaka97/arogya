<?php
session_start();
include("../connection/connection.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pharmacist | View Drugs</title>
        <?php
            include('../include/header.php');
        ?>
    </head>
    <body>
        <!-- header-start -->
         <?php
            include('../admin/PharmacistDash.php');
        ?>
        <!-- header-end --> 

        <!-- body-start -->
        <div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">View Drugs</h2>
                </div>
            </header>
            <div class="col-md-12 form">
                <div class="row no-gutters">
                    <div class="col-md-12">
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">   

<table class="table table-hover" id="sample-table-1">
    <thead>
    <tr>
        <th class="center">No</th>
        <th>Drug Name</th>
        <th>Dose </th>
        <th>Quantity</th>
        <th>Price </th>
        <th>Expire Date</th>
        
    </tr>
    </thead>
<tbody>
<?php
//$uid=$_SESSION['id'];
$sql=mysqli_query($con,"select * from drug");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td><?php echo $row['drugsName'];?></td>
<td><?php echo $row['dose'];?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['drug_expire_date']?></td>
</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        <!-- body-end -->

        <!-- footer start -->
        <?php
            //include('include/footer.php');
        ?>
        <!-- footer end  -->

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
    

    </body>
</html>
<?php mysqli_close($con)?>
