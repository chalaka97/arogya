<?php
session_start();
include("../connection/connection.php");

$msg = "";
if(isset($_POST['submit']))
{
$name=$_POST['drugName'];
$dose=$_POST['dose'];
$quantity=$_POST['qty'];
$price=$_POST['price'];
$exdate=$_POST['e_date'];

$query=mysqli_query($con,"insert into drug(drugsName,dose,quantity,price,drug_expire_date) values('$name','$dose','$quantity','$price','$exdate')");
    if($query)
    {
        $msg="Drug Details Added Successfully";
    }
    else{
        $msg="Unable to Added Drug Details ";
        
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User | Add Drugs</title>
        <?php
            include('../include/header.php');
        ?>
    </head>
    <body>
        <!-- header-start -->
         <?php
            include('../pharmacist/PharmacistDash.php');
        ?>
        <!-- header-end --> 

        <!-- body-start -->
        <div class="container p-0">
            <header class="page-header">
                <div class="container-fluid">
                    <h2 class="no-margin-bottom">Add Drugs</h2>
                </div>
            </header>
            <div class="col-md-12 form">
                <div class="row no-gutters">
                    <div class="col-md-12">
                    <?php echo "<font color='green'>".$msg."</font>"."<br>"."<br>"; ?>
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">   

<form role="form" name="book" method="post" >  
    <div class="form-group">
        <label ><strong>Drug Name</strong></label >
         <input type="text" name="drugName" class="form-control"  placeholder="Enter Drug name" required="true"> 
    </div>
    <div class="form-group">
        <label><strong>Dose</strong></label>
        <input type="text" name="dose" class="form-control"  placeholder="Enter Dose in miligrams" required="true">
    </div>
                                                  
    <div class="form-group">
        <label><strong>Quantity<strong></label>
        <input type="text" name="qty" class="form-control"  placeholder="Enter quantity" required="true">
    </div>
    <div class="form-group">
        <label><strong>Price<strong></label>
        <input type="text" name="price" class="form-control"  placeholder="Enter price"  required="true">
    </div>  
    <div class="form-group">
        <label><strong>Expired Date</strong></label>
        <input type="date" name="e_date" class="form-control"  placeholder="Enter expire date" required="true">
    </div>
        <button type="submit" name="submit" class="btn btn-success saveBtn">Add</button>

</form>
                    </div>
                </div>
            </div>
                </div>
                <?php
            include('../include/footer.php');
        ?>
            </div>
        </div>

        <!-- body-end -->

        <!-- footer start -->

        
        <!-- footer end  -->

        <!-- JS here -->
    <script src="../pharmacist/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../pharmacist/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../pharmacist/assets/js/popper.min.js"></script>
    <script src="../pharmacist/assets/js/bootstrap.min.js"></script>
    <script src="../pharmacist/assets/js/owl.carousel.min.js"></script>
    <script src="../pharmacist/assets/js/isotope.pkgd.min.js"></script>
    <script src="../pharmacist/assets/js/ajax-form.js"></script>
    <script src="../pharmacist/assets/js/waypoints.min.js"></script>
    <script src="../pharmacist/assets/js/jquery.counterup.min.js"></script>
    <script src="../pharmacist/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="../pharmacist/assets/js/scrollIt.js"></script>
    <script src="../pharmacist/assets/js/jquery.scrollUp.min.js"></script>
    <script src="../pharmacist/assets/js/wow.min.js"></script>
    <script src="../pharmacist/assets/js/nice-select.min.js"></script>
    <script src="../pharmacist/assets/js/jquery.slicknav.min.js"></script>
    <script src="../pharmacist/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../pharmacist/assets/js/plugins.js"></script>
    <script src="../pharmacist/assets/js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="../pharmacist/assets/js/contact.js"></script>
    <script src="../pharmacist/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="../pharmacist/assets/js/jquery.form.js"></script>
    <script src="../pharmacist/assets/js/jquery.validate.min.js"></script>
    <script src="../pharmacist/assets/js/mail-script.js"></script>

    <script src="../pharmacist/assets/js/main.js"></script>
    

    </body>
</html>
<?php mysqli_close($con)?>
