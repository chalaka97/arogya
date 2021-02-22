<!doctype html>
<html class="no-js" lang="en">
  <?php
    session_start();
    $Message = "";
    include('../include/header.php');
    include('../connection/connection.php');
    $img = "no image";
    
    require '../email/mail/PHPMailerAutoload.php';
    $credential = include('../email/mail/credential.php');
    


?>
   <head>
       <style>
           .card{
                margin: 10px;
                background-color: lightblue;
                width: 380px;
                height: 360px;
                overflow: auto;
           }
           #feedbackbtn{
               position: absolute;
               
           }
           .hrstyle{
               border: 1px solid blue;
           }
            
       </style>
    </head> 
<body>
    
    <!-- header-start -->
    <?php
   include('../admin/adminDash.php');
?>
    <div class="content-inner">
          <!-- Page Header-->
        <header class="page-header">
        <div class="container-fluid">
            <h2 class="no-margin-bottom">User Feedback</h2> 
        </div>
        </header>
    <div class="container">
        <br><br><br>
        <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card-deck">
                        
                    <?php
                        $c=0;
                        $viewFeedback = "SELECT * FROM contact WHERE is_replied=0 ORDER BY contact_id DESC";
                        $runQFeedback=mysqli_query($con,$viewFeedback);
                    
                        if($runQFeedback){
                            while($data=mysqli_fetch_assoc($runQFeedback)){
                                $c++;
                                $img=$data["img"];
                      ?>
                        <div class="col-lg-5 col-md-3">
                            <div class="card border-primary mb-6" style="max-width: 25rem;">
<!--                                <img class="card-img-top" src="..." alt="Card image cap">-->
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <h5 class="card-title"><?php echo $data["type"];?></h5>
                                    <hr class="hrstyle">
                                    <p class="card-text text-dark"><?php echo $data["name"];?></p>
                                    <p class="card-text text-dark"><?php echo $data["message"];?></p>
                                    <p class="card-text text-dark">Email : <b class="text-dark"><?php echo $data["email"];?></b></p>
                                    <p class="card-text text-dark">Mobile : <b class="text-dark"><?php echo $data["phone"];?></b></p>
                                    <p class="card-text text-dark">Image : <b class="text-dark"><?php echo $img;?></b></p>
                                    <a href="#" class="btn btn-primary" onclick="send_msg('<?php echo $data["email"];?>','<?php echo $data["type"];?>','<?php echo $data["contact_id"];?>')" id="feedbackbtn" style="width:90%" data-toggle="modal" data-target="#exampleModalCenter">Reply</a>
                                </div>
                            </div>
                        </div>
                        <br>
                    <?php
                            }
                        }
                                                
                    ?>
                        
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        <?php
            if(isset($_POST['submitbtn'])){
            $email=$_POST['feedbackuseremail'];
            $msg=$_POST['feedbackFormMsg'];
            $type=$_POST['problemName'];
            $id=$_POST['idname'];
                
                $mail = new PHPMailer;
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $credential['user']  ;           // SMTP username
                $mail->Password = $credential['pass']  ;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom($email);
                $mail->addAddress($email);             // Name is optional

                //$mail->addReplyTo('hello');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');        // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                $mail->isHTML(true);                                  // Set email format to HTML
                
                $mail->Subject = "About your ".$type;
                $mail->Body    = "$msg"."<br>"."Best Regards Arogya Team! ";
//                $mail->AltBody = 'If you see this mail. please reload the page.';

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                   // echo "<script>alert('Your password send your Email')</script>";
                    
                    $removeFeedback = "UPDATE `contact` SET is_replied =1 WHERE contact_id = '$id'";
                    $runQAdmin=mysqli_query($con,$removeFeedback);
                } 
        
    }
        
        ?>
<!--        modal-->
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               <form method="post">
                  <div class="form-group">
                    <label for="InputEmail1">Email address</label>
                    <input type="email" class="form-control" id="feedbackuseremail" name="feedbackuseremail" aria-describedby="email" name="feedbackFormEmail" readonly>
                    <input type="hidden" name="problemName" id="problem">
                      <input type="hidden" name="idname" id="id">
                  </div>
                   <div class="form-group">
                    <label for="InputMsg">Message</label>
                       <textarea cols="30" rows="4" class="form-control" id="feedbackMsg" aria-describedby="msg" name="feedbackFormMsg" required> </textarea>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="submitbtn" class="btn btn-primary">Send Message</button>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
<!--        modal end-->
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
      
      function send_msg(email,type,id){
          document.getElementById("feedbackuseremail").value=email;
          document.getElementById("problem").value=type;
          document.getElementById("id").value=id;
      }
        </script>
</body>

</html>