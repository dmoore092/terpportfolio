<?php
    //someone reports a profile
    //goes into profile.php
    if(isset($_POST['report'])){
        //PHPMailer
    $mail = new PHPMailer(true); 
        
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP(); 
            header('Content-Type: text/csv; charset=utf-8');                                     // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'interpreter-portfolio@gmail.com';     // SMTP username
            $mail->Password = 'Webm@ster1';                       // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
            $mail->SMTPDebug = false;
            //Recipients
            $mail->setFrom('webmaster@interpreter-portfolio.com', 'Interpreter Portfolio');
            $mail->addAddress('dmoore092@gmail.com', 'Dale');     // Add a recipient
            $mail->addAddress('kjprestano@gmail.com', 'Keith'); // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Inappropriate Profile report';
            $mail->Body    = "A user has reported a profile for inappropriate images, video, or content. <a href='https://www.athleticprospects.com/profile.php?id=".$id."'>Click Here.</a>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        
    };
?>