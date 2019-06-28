<?php 
//goes into myinfo.php
    $terpDB = new TerpDB();       
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    if (isset($_GET['logout'])) {
        $terpDB->logout();
    }
        /*
        * This line prints the entire html page. getMyInfo() is found in Terp.PDO.Class.php
        * Rewrite this some day
        */
        echo $terpDB->getMyEditableInfo($_SESSION['id']);
    } else {
        echo "<div id='body-main'>";
        echo "<div id='cont' class='go-login'>";
        echo "<h2 id='nologin'>You must be logged in</h2>";
        echo "<a href='login.php' class='redirect-link'>Login</a>";
        echo "</div>";
    }
?>