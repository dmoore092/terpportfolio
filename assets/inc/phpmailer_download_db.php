<?php
    //admin wants to download the Database
    //goes into profile.php
    if(isset($_POST['download-db'])){
                
        try{
            $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'sports');
            echo "Connected successfully"; 
        }
        catch(exception $e){
            echo "Connection failed: " . $e->getMessage();
        }
        //return $conn;
        
        $email = new PHPMailer(true); 
        $email->SMTPDebug = 2;                                 // Enable verbose debug output
        $email->isSMTP();                                      // Set mailer to use SMTP
        $email->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $email->SMTPAuth = true;                               // Enable SMTP authentication
        $email->Username = 'interpreter-portfolio@gmail.com';                 // SMTP username
        $email->Password = 'Webm@ster1';                           // SMTP password
        $email->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $email->Port = 465;                                    // TCP port to connect to

        //Recipients
        $email->setFrom('webmaster@interpreter-portfolio', 'Interpreter Portfolio');
        $email->addAddress('kprestano@athleticprospects.com', 'Keith');     // Add a recipient
        
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=apdb.csv');  
        $output = fopen("apdb.csv", "w");  
        fputcsv($output, array('id', 'name', 'gender', 'email', 'cellphone', 'homephone', 'address', 'city', 'state', 'zip',
                                'highschool', 'weight', 'height', 'Class Of', 'sport', 'Primary Position', 'Secondary Position',
                            'Travel Team', 'gpa', 'sat', 'act', 'Major', 'Ref1 Name', 'Ref1 Email', 'Ref1 Phone', 'Ref2 Name', 'Ref2 Email', 'Ref2 Phone', 
                            'Ref3 Name', 'Ref3 Email', 'Ref3 Phone', 'Personal Statement', 'Commitment', 'Service', 'Role', 'College', 'twitter',
                            'Facebook','Instagram', 'Website', 'Desired Characteristics', 'Velocty', 'Gpa Req'));  
        
        $query = "SELECT id, name, gender, email, cellphone, homephone, address, city, state, zip, highschool, weight, height, gradYear, ";
        $query .= "sport, primaryPosition, secondaryPosition, travelTeam, gpa, sat, act, major, ref1Name, ref1Email, ref1Phone, ";
        $query .= "ref2Name, ref2Email, ref2Phone, ref3Name, ref3Email, ref3Phone, persStatement, commitment, service, account_type, college, ";
        $query .= "twitter, facebook, instagram, website, characteristics, velocity, gpareq FROM terps;";  
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)){  
            fputcsv($output, $row);  
        }  
        
        fclose($output);
        MYSQLI_CLOSE($conn);
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $email->addAttachment('apdb.csv');    // Optional name

        //Content
        $email->isHTML(true);                                  // Set email format to HTML
        $email->Subject = 'Database Export';
        $email->Body    = "Here is the current DB. Some fields like passwords, and links to images are omitted";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        try{
            $email->send();
            echo 'Message has been sent';
        } 
        catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $email->ErrorInfo;
        }
    } 
?>