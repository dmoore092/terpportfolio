<?php
//takes email and password, sanitizes input, calls login()
    $_SESSION['logged_in'] = 'false';
    if(isset($_POST["login"])){
        //echo "login called";
        $email = htmlentities(strip_tags(trim($_POST["email"])));//$_POST["email"];
        $password = htmlentities(strip_tags(trim($_POST["password"])));//$_POST["password"];

        $terp = new TerpDB();
        //user will equals (0 || false) || (1 || true)
        $isLoggedIn = $terp->login($email, $password);
    }
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        echo "<h1>Logged in</h1>";
        //var_dump($_SESSION['id']);
        //$id = $_SESSION['id'];
        header("Location: http://".$_SERVER["HTTP_HOST"] . "/profile.php?id={$_SESSION['id']}");
      }
?>