<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $TITLE ?> | Athletic Prospects</title>
        <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/footer.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/<?php echo $PAGE ?>.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--icon library -->
        <meta http-equiv="content-type" content="text/php; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dale Moore">
        <meta name="description" content="Your interpreter portfolio without all the hassle!"/>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
<header>
    <?php // require_once('assets/inc/search.inc.php'); ?>
            <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
            <div><a href="javascript:void(0);" class="navicon" onclick="openNav()">Menu</a></div>
                <script>
                    function openNav(){
                        var nav = document.querySelector('.nav');
                        if(nav.style.display === "block"){
                            nav.style.display = 'none';
                        }
                        else{
                            nav.style.display = 'block';
                        }
                    }
                </script>
            <div id="top-bar"></div><!-- top bar color -->
            <div id="search">
                <div id="search-container">
                    <form action='#' method='POST' id="search-form"> 
                        <input id="textbox" type="text" size="50" placeholder= "First or Last Name" name="search">
                        <input id="button" class="searchbtn" type="submit" name= "search-btn" value="Search">
                    </form>
                </div>
            </div>
                <div class="nav">
                    <ul>
                        <li id="current"><a href="index.php">Home</a></li>
                        <li><a href="<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){echo "profile.php?id=".$_SESSION['id'];}else{echo "login.php";}?>">My Profile</a></li>
                        <li><a href="searchprofiles.php">Search Profiles</a></li>
                        <li><a href="register.php">Register</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <?php
                            if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){
                                echo "<li id='login'><a class='link' href='logout.php'>Logout</a></li>";
                            }
                            else{
                                echo "<li id='login'><a class='link' href='login.php'>Login</a></li>";
                            }
                        ?>
                    </ul><!-- end of #top-bar -->
                </div>
            <div id="logo"><img src="/assets/img/siteLogo.png" alt="logo" id="logo-img"></div>
        </header>
