<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>

<?php include("classes/Terps.PDO.Class.php"); ?>
<?php include('assets/inc/recover_redirect.php'); ?>

<?php include('assets/inc/header.inc.php'); ?>
        <div id="body-main">
            <form id="terp-form"
                  method = "POST"
                  action= "index.php"
                  onsubmit = "alert('You Password Has Been Reset. Please Check Your Email.');" >
                <h2>Reset My Password</h2>
                <p>
                    <input type="text"
                            id = "email"
                            name= "email"
                            size = "25"
                            maxlength = "150"
                            placeholder = "Enter Your email"
                            value=""
                            onclick="" />
                </p>
                 <button type="submit" name="reset" class="btn-all-buttons" id="btn-reset">Reset</button>
            </form>
<?php include('assets/inc/footer.inc.php'); ?>