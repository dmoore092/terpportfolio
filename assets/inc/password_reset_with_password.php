<?php 
//goes into passwordreset.php
// used to reset password when person already knows their password, no email needed
    $terp = new TerpDB();
    if(isset($_POST["updatepassword"])){
        $email = $_SESSION["email"];
        
        if($_POST['newpassword'] == $_POST['newpasswordagain']){
            if($_POST['newpassword'] != ""){
                $currentpassword = $_POST["currentpassword"];
            
                if($terp->checkPassword($email, $currentpassword)){
                    //echo "success!";
                    $newpassword = $_POST['newpassword'];
                    $terp->updatePassword($email, $newpassword);
                }
            }
            else{
                echo "<p style='color:red;margin-top:25px'>Password cannot be empty, try again</p>";
            }
        }
        else{
            echo "<p style='color:red;margin-top:25px'>Passwords do not match, try again</p>";
        };
        //$success = $terp->updatepassword($oldpassword, $newpassword);
    }
?>