<?php include("config/pageconfig.php"); session_start(); error_reporting(0); ?>

<?php include("assets/inc/header.inc.php");?>
        <div id="body-main">
            <form id="terp-form"
                         method = "POST"
                         action= ""
                         onsubmit = "" >
                        <h2>Create an Account</h2>
                        <p>
                            <span class="span">Email:* &nbsp; </span>
                            <input type="text"
                                   id = "email"
                                   name= "email"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = "Choose a email"
                                   value=""
                                   required />
                        </p>
                        <p>
                        <span class="span">Password:* &nbsp; </span>
                            <input type="password"
                                   class = "password"
                                   name= "password"
                                   size = "25"
                                   maxlength = "150"
                                   placeholder = "password"
                                   value=""
                                   required />
                        </p>
                        <p>
                        <span class="span">Retype Password:* &nbsp; </span> 
                            <input type="password"
                                   class = "password"
                                   name= "retypepassword"
                                   size = "25"
                                   maxlength = "50"
                                   placeholder = "Retype Your Password"
                                   value=""
                                   required />
                        </p>
                        <div class="g-recaptcha" data-sitekey="6LfGGJEUAAAAAChOm6ZDVpoo3ZbjdUsfwfYT6Omj"></div>
                       <?php 
                            //wrapped in php to hide from inspect
                            //<p>
                            //<select name="accounttype" id="accounttype">
                                //<option value="" selected disabled>I am a...</option>
                                //<option value="terp">Interpreter</option>
                                //<option value="coach">Coach</option>
                            //</select>
                        //</p> 
                        ?>
                        <input type="submit"
                               value="Create Account"
                               name = "btnCreate"
                               class="btn-all-buttons"
                               id="btn-create-account"/>
            </form>      
<?php include("assets/inc/footer.inc.php"); ?>
<?php include("assets/inc/create_account.php"); ?>
