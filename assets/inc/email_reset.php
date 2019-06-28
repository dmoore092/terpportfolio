<?php 
    //collect info from email link
    //Goes in changepassword.php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    };
    if(isset($_GET['reset'])){
        $resetpassword = $_GET['reset'];
    };
    if(isset($_GET['email'])){
        $email = $_GET['email'];
    };
?>
