<?php
    require 'mail/PHPMailerAutoload.php';
    $credential = include('mail/credential.php');   //credentials import

    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $msg=$_POST['msg'];
        
        
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

                $mail->addReplyTo('hello');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                $mail->addAttachment('a.txt');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                $mail->isHTML(true);                                  // Set email format to HTML
                
                $mail->Subject = "Email Topic";
                $mail->Body    = "$msg";
                $mail->AltBody = 'If you see this mail. please reload the page.';

                if(!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo "<script>alert('Your password send your Email')</script>";
                } 
    }
?>

<html>
    <body>
        <form method="post">
            <label>Masseg </label>
            <input type="text" name="msg">
            <br>
            
            <label>send Mail Address</label>
            <input type="email" name="email">
            <br>
            
            <input type="submit" name="submit" value="send">
            
            
        </form>
        
        
    </body>
</html>



