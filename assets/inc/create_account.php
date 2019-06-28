<?php
    if(isset($_POST["btnCreate"])){
        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
            if(!$captcha){
                echo "<p style='color:red';>Please check the ReCaptcha!</p>";
                exit;
            }
            $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfGGJEUAAAAAFAw4zjaPVM2rlP1HqtQBw05rCek&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            if($response['success'] == false){
                echo "<p style='color:red';>ReCaptcha Failed.</p>";
            }
            else{
                //block cross-site scripting, html entities(apersand etc), trim white space
                $email  = htmlentities(strip_tags(trim($_POST["email"])));
                $password  = htmlentities(strip_tags(trim($_POST["retypepassword"])));
                //$account_type = $_POST['account_type'];

                if($_POST["password"] == $password){
                    $hashed_password = password_hash($_POST["retypepassword"], PASSWORD_DEFAULT);
                    
                    $terp = new TerpDB();
                    $account_type = 'terp';
                    $registered = $terp->register($email, $hashed_password, $account_type);
                    if($registered){
                        //var_dump($_SESSION);
                        echo "<script>window.location.href = 'myinfo.php';</script>";
                    }
                    else{
                        echo "<p style='color:red';>That email is taken, please use another</p>";
                    }
                    
                }
                else{
                    echo "Passwords do not match";
                }
            }
        }
    }
?>