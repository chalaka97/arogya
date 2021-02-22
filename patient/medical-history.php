<?php
session_start();
include("../connection/connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient | View Medical History</title>
    <?php
        include('../include/header.php');
    ?>
</head>
<body>
<!-- header-start -->
     <?php
        include('patientDash.php');
    ?>
<!-- header-end --> 

   <!-- body start -->
    <div class="container p-0">
        <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">View Medical History</h2>
            </div>
        </header>
        <div class="col-md-12 form">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="row margin-top-30">
                        <div class="col-lg-8 col-md-12">   
                <?php
                    $vid= 1;
                    $ret=mysqli_query($con,"select * from patient where patient_id='$vid'");
                    $cnt=1;
                    while ($row=mysqli_fetch_array($ret)) {
                ?>
                <table border="1" class="table table-bordered">
                    <tr align="center">
                        <td colspan="4" style="font-size:20px;">
                            Patient Details
                        </td>
                    </tr>
                    <tr>
                        <th scope>Patient Name</th>
                            <td><?php  echo $row['name'];?></td>
                        <th scope>Patient Email</th>
                            <td><?php  echo $row['patient_email'];?></td>
                    </tr>
                    <tr>
                        <th scope>Patient Mobile Number</th>
                            <td><?php  echo $row['mobile'];?></td>
                        <th>Patient Address</th>
                            <td><?php  echo $row['address'];?></td>
                    </tr>
                    <tr>
                        <th>Patient Gender</th>
                            <td><?php  echo $row['gender'];?></td>
                        <th>Patient Age</th>
                            <td><?php  echo $row['age'];?></td>
                    </tr>
 
                <?php 
                    }
                ?>
                </table>

                    <form role="form" name="book" method="post" >  
                        <div class="form-group">
                            <label ><strong>Search by Date</strong></label >
                                <input type="date" name="searchdata" id="searchdata" class="form-control"   required="true"><br/>
                                <button type="submit" name="search" id="submit" class="btn btn-success saveBtn">Search</button>
                        </div>
                    </form>
              
        <?php
            if(isset($_POST['search']))
            { 

                $sdata=$_POST['searchdata'];
            ?>
            <table class="table table-hover" id="sample-table-1">
            <thead>
            <tr>
                <th>No.</th>
                <th>Description</th>
                <th>Date</th>
                <th>Report PDF</th>
            </tr>
            </thead>
            <tbody>
       
        <?php

            $sql=mysqli_query($con,"select * from patientsmedicalhistory where date like '%$sdata%'");
            $num=mysqli_num_rows($sql);
            if($num>0){
                $cnt=1;
                while($row=mysqli_fetch_array($sql))
                {
        ?>
        <tr>
            <td><?php echo $cnt;?></td>
            <td><?php  echo $row['description'];?></td>
            <td><?php  echo $row['date'];?></td>
            <td><?php  echo $row['reportPDF'];?></td> 
        </tr>
        <?php 
            $cnt=$cnt+1;
            } } 
        else {

        ?>
        <tr>
            <td colspan="8"> No medical details found against this search</td>
        </tr>
  
   
<?php } }?>
</tbody>
</table>
</div>
</div>
</div>
</div>
<!-- footer start -->
        <?php
            include('../include/footer.php');
        ?>
        <!-- footer end  -->
</div>
</div>



       
<!-- body-end -->



    </body>
</html>
<?php mysqli_close($con)?>
