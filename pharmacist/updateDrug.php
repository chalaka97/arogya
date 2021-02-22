<?php
session_start();
include("../connection/connection.php");
$did = 0;
$msg = "";
if(isset($_GET['id'])){
    $did = $_GET['id'];
}
//$did=intval($_GET['id']);// get drug id

if(isset($_POST['submit']))
{
$d_id = $_POST['drug_id'];
$name=$_POST['drugName'];
$dose=$_POST['dose'];
$quantity=$_POST['qty'];
$price=$_POST['price'];
$query="UPDATE drug SET drugsName='$name', dose='$dose',quantity='$quantity',price='$price' WHERE drugs_id=$d_id";
$result=mysqli_query($con,$query);
    if($result)
    {
        $msg="Drug Details updated Successfully";

    }
    else{
        $msg="Unable to update Drug Details";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pharmacist | Edit Drugs</title>
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
                    <h2 class="no-margin-bottom">Edit Drugs</h2>
                </div>
            </header>
            <div class="col-md-12 form">
                <div class="row no-gutters">
                    <div class="col-md-12">
                            <?php echo "<font color='green'>".$msg."</font>"."<br>"."<br>"; ?>
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">   
                            <?php 
                                $sql=mysqli_query($con,"select * from drug where drugs_id='$did'");
                                while($data=mysqli_fetch_array($sql))
                            {
                            ?>

                    <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                        <div class="form-group">
                                <input type = "hidden" name ="drug_id" value =<?php echo $did?>>
                            <label><strong>Drug Name</strong></label>
                            <input type="text" readonly name="drugName" class="form-control" value="<?php echo ($data['drugsName']);?>" >
                            
                        </div>

                        <div class="form-group">
                            <label><strong>Dose</strong></label>
                            <input type="text" name="dose" class="form-control" value="<?php echo ($data['dose']);?>" >
                        </div>
                    
                        <div class="form-group">
                            <label ><strong>Quantity</strong></label>
                            <input type="number" name="qty" class="form-control" min ="1" required="required"  value="<?php echo ($data['quantity']);?>" >
                        </div>
    
                        <div class="form-group">
                            <label><strong>Price</strong></label>
                            <input type="number" min="1" name="price" class="form-control" required="required"  value="<?php echo ($data['price']);?>">
                        </div>

                        
                            <?php } ?>
                                                        
                            <button type="submit" name="submit" class="btn btn-success saveBtn">Update
                            </button>
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
        <?php
            //include('include/footer.php');
        ?>
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
