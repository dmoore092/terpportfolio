<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php unset($_SESSION); session_destroy();?>
<?php include('assets/inc/header.inc.php'); ?>
<div id="body-main">
        <div id="logout-wrapper">
                <p>You have been successfully logged out!</p>
        </div>
<?php include('assets/inc/footer.inc.php'); ?>