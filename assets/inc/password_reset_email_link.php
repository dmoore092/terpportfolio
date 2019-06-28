<!-- sends a password reset link to the persons email -->
<?php 
    //goes into index.php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    if(isset($_POST['reset'])){
        echo "reset is set";
        $email = $terpDB->sanitize($_POST['email']);
        $email = strtolower($email);
        $fieldname = "email";
        $terpDB->insertResetToken($email);
        $result = $terpDB->getFieldByEmail($fieldname, $email);

        $recipientAddr = $result["email"];
        $recipientName = $result["name"];
        $recipientId   = $result["id"];
        $recipientCode = $result["reset"];

        $email = new PHPMailer(true); 
        $email->SMTPDebug = 2;                                 // Enable verbose debug output
        $email->isSMTP();                                      // Set mailer to use SMTP
        header('Content-Type: text/csv; charset=utf-8');
        $email->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $email->SMTPAuth = true;                               // Enable SMTP authentication
        $email->Username = 'interpreter-portfolio@gmail.com';                 // SMTP username
        $email->Password = 'Webm@ster1';                           // SMTP password
        $email->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $email->Port = 465;                                    // TCP port to connect to
        $email->SMTPDebug = false; 
        //Recipients
        $email->setFrom('webmaster@interpreter-portfolio.com', 'Athletic Prospects');
        $email->addAddress($recipientAddr, $recipientName);     // Add a recipient
        
        

        //Content
        $email->isHTML(true);                                  // Set email format to HTML
        $email->Subject = 'Reset Your Password';
        $email->Body    = "Someone has requested to reset your password. If this wasn't you, someone is trying to access your account.
                            <br>
                            <a href=\"http://www.interpreter-portfolio.com/changepassword.php?id=".$recipientId."&email=".$email."&reset=".$recipientCode."\">Click Here</a> to reset your password.";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        try{
            $email->send();
            //echo 'Message has been sent';
        } 
        catch (Exception $e) {
            //echo 'Message could not be sent. Mailer Error: ', $email->ErrorInfo;
        }
    }
?>