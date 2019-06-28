<?php
    //checks if user is logged in, redirects to profile if so
    //goes into recover.php
    $_SESSION['logged_in'] = 'false';
    if(isset($_POST["login"])){
        $email = htmlentities(strip_tags(trim($_POST["email"])));//$_POST["email"];
        $password = htmlentities(strip_tags(trim($_POST["password"])));//$_POST["password"];

        $terp = new TerpDB();
        $isLoggedIn = $terp->login($email, $password);
    }
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        header("Location: http://".$_SERVER["HTTP_HOST"] . "/profile.php?id={$_SESSION['id']}");
    }
?>