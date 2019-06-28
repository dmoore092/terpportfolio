<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>
<?php include('assets/inc/header.inc.php');?>
<div id="body-main">
    <h2>Change your password</h2>
            <form id="password-change"
                         method = "POST"
                         action= "myinfo.php"
                         onsubmit = "" >

                        <p>
                            <span class="span">Current Password: &nbsp; </span>
                            <input type="password"
                                    class = "pword-reset-inputs"
                                   id = "currentpassword"
                                   name= "currentpassword"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = ""
                                   value=""
                                   onclick="" />
                        </p>
                        <p>
                            <span class="span">New Password: &nbsp; </span>
                            <input type="password"
                                   class = "pword-reset-inputs"
                                   name= "newpassword"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = ""
                                   value=""
                                   onclick="" />
                        </p>
                        <p>
                        <span class="span">Retype New Password: &nbsp; </span>
                        <input type="password"
                                    class = "pword-reset-inputs"
                                   name= "newpasswordagain"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = ""
                                   value=""
                                   onclick="" />
                        </p>
                        <button type="submit" name="updatepassword" class="btn-all-buttons" id="btn-update">Update</button>
                <?php 

            ?> 
            </form>
<?php include('assets/inc/password_reset_with_password.php'); ?>
<?php include('assets/inc/footer.inc.php'); ?>