<?php
include('../connection/connection.php');
if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($con,"select name,doctor_reg_id from doctor where specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo ($row['doctor_reg_id']); ?>"><?php echo ($row['name']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($con,"select amount from doctor where doctor_reg_id='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo ($row['amount']); ?>"><?php echo ($row['amount']); ?></option>
  <?php
}
}

?>

<?php
    mysqli_close($con);
?>