<?php
    
    session_start();
    if (!isset($_SESSION['patient_email'])) {
        header("location:../logout.php");
    }
    
    include('../connection/connection.php');
    include('../include/header.php');

    if(isset($_POST['pwd'])){
        $current_pwd=mysqli_real_escape_string($connect,$_POST['current_pwd']);
        $new_pwd1=mysqli_real_escape_string($connect,$_POST['new_pwd1']);
        $new_pwd2=mysqli_real_escape_string($connect,$_POST['new_pwd2']);
        
        $query="SELECT password FROM `user` WHERE email='{$_SESSION['email']}' AND password='{$current_pwd}' LIMIT 1";
        
        $result=mysqli_query($conn,$query);
        
        if($result){
            if(mysqli_num_rows($result)==1){
                if($new_pwd1==$new_pwd2){
                    $query2="UPDATE `user` SET password='{$new_pwd1}' WHERE id='{$_SESSION['email']}'";
                    
                    $result2=mysqli_query($conn,$query2);
                    if($result){
                        echo "<script>alert('Password change succuss..')</script>";
                    }else{
                         echo "<script>alert('Password change Fail..')</script>";
                    }
                }else{
                     echo "<script>alert('New Password Not Match..')</script>";
                }
            }else{
                 echo "<script>alert('Current password incorrect..')</script>";
            }
        }
    }

?>

<!doctype html>
<html>
    <head>
        <title>Arogya | Patient</title>
        <!-- header-start -->
          
        <!-- header-end -->
    </head>
    <body>   
         <?php
            include('patientDash.php');
        ?> 
        <!-- body start -->
        <div class="content-inner">
            <!-- Page Header-->
            <header class="page-header">
                <div class="container-fluid">
                  <h2 class="no-margin-bottom">Dashboard</h2>
                </div>
            </header>
            <!-- Dashboard Counts Section-->
            <section class="dashboard-counts no-padding-bottom">
                <div class="container-fluid">
                    <form method="post">
      <table class="box_tb cont" >
          <tr>
              <td>
                  Current Password : 
              </td>
              <td>
                  <input type="password" class="form-control pwdbtn1" name="current_pwd" style="width:85%;">
                  <button class="btn btn1" type="button"></button>
              </td>
          </tr>
          <tr>
              <td>
                  New Password : 
              </td>
              <td>
                  <input type="password" class="form-control pwdbtn2" name="new_pwd1" style="width:85%;">
                   <button class="btn btn2"  type="button"></button>
              </td>
          </tr>
          <tr>
              <td>
                  Confirm New Password : 
              </td>
              <td>
                  <input type="password" class="form-control pwdbtn3" name="new_pwd2" style="width:85%;">
                   <button class="btn btn3" type="button"></button>
              </td>
          </tr>
          <tr>
              <td>
              </td>
              <td>
                  <a href="patient.php">
                  <input type="button" name="back" class="btn btn-success saveBtn" value="Back"></a>
                  <input type="reset" value="Cancel" class="btn btn-success saveBtn">
                  <input type="submit" name="pwd_change" value="Save" class="btn btn-success saveBtn">
              </td>
          </tr>
        </table>
                </div>
              </section>
              <!-- Dashboard Header Section    -->
        </div>               
        <!-- body end -->

        <!-- footer start -->
        <?php
           //include('include/footer.php');
        ?>
        <!-- footer end  -->
        
        
    </body>
</html>

<?php
    mysqli_close($con);
?>