<?php
    require("index.php");
   
?>

<?php
   /* if(isset($_POST['submit'])){
        $email=mysqli_real_escape_string($connect, $_POST['user_name']);
        
        $query="SELECT * FROM `admin` WHERE email='$email'";
        
        $result=mysqli_query($connect,$query);
        if($result){
            
            require 'PHPMailerAutoload.php';
            
            $mail = new PHPMailer;
            
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAUTH = 'true';
            $mail->Username = "lahirusampath8899@gmail.com";
            $mail->Password = "Sampath@980";
            $mail->SMTPSecure = "tls";
            $mail->Port=587;
            $mail->From = "lahirusampath8899@gmail.com";
            $mail->FromName = "Sampath";
            $mail->addAddress = "lahirusampath3366@gmail.com";
            $mail->isHTML(true);
            $mail->Subject    = "PHPMailer Test Subject via Sendmail, basic";
            $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
            $mail->Body    = "Hello";
            
            if($mail->send()){
                echo "message send";
            }else{
                echo "message has been not send";
            }

            
            $count=mysqli_num_rows($result);
            if($count==1){
                $r=mysqli_fetch_assoc($result);
                $password=$r['password'];
                $to=$r['email'];
                $subject="you recover password";
                $message="your password is ".$password;
                $header="From : sampath980250@gmail.com";
                
                if(mail($to,$subject,$message,$header)){
                    echo "your password send to your email address";
                }else{
                    echo "not send password";
                }
            }else{
                echo "error_2";
            }
        }else{
            echo "error_1";
        }
    }*/
?>

<?php


    if(isset($_POST['submit'])){
        
        $email=mysqli_real_escape_string($connect, $_POST['user_name']);
        $query="SELECT * FROM `admin` WHERE email='$email'";
        $result=mysqli_query($connect,$query);
        require 'PHPMailerAutoload.php';

        if($result){
            if(mysqli_num_rows($result)==1){
                $credential = include('credential.php');   //credentials import

                $mail = new PHPMailer;

                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $credential['user']  ;           // SMTP username
                $mail->Password = $credential['pass']  ;                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                $mail->setFrom($email);
                $mail->addAddress($email);             // Name is optional

                $mail->addReplyTo('hello');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = "Password";
                $mail->Body    = "hi";
                $mail->AltBody = 'If you see this mail. please reload the page.';

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo true;
                }
          }else{
                echo "invalide email";
            }
        }
    }

?>

<html>
    <head>
    </head>
    <body>
        <form method="post">
            Email : <input type="text" name="user_name">
            <input type="submit" name="submit"  value="send">
        </form>
    </body>
</html>