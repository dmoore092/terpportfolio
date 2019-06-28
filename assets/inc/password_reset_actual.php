<?php 
    //reset the users password. From changepassword.php
    //goes in login.php
    if(isset($_POST['update-password'])){
        //makes recaptcha work
        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
            //captcha failed
            if(!$captcha){
                echo "<p style='color:red;'>Password Change Failed! Please use the ReCaptcha</p>";
                exit;
            }
            $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfGGJEUAAAAAFAw4zjaPVM2rlP1HqtQBw05rCek&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            if($response['success'] == false){
                echo "<p style='color:red;'>ReCaptcha Failed.</p>";
            }
            //captcha passed
            else{
                //check the user typed the same password both times
                if($_POST["password"] == $_POST['retypepassword']){
                    if($_POST['password'] != ""){
                        $newpassword = $_POST['password'];
                        $result = $terpDB->checkTempPassExpire($_GET['email']);
                        //everything is ready for password change
                        if($result == 1){
                            //echo "ready to change password, call updatePassword()";
                            $terp = new TerpDB();
                            //password is hashed in updatePassword, not here
                            $terp->updatePassword($_GET['email'], $newpassword);
                        }
                    }
                    else{
                        echo "<p style='color:red;margin-top:25px'>Password cannot be empty, try again</p>";
                    }
                }
                else{
                    echo "<p style='color:red;margin-top:25px'>Passwords do not match, try again</p>";
                }
            }
        }  
    }
?> 