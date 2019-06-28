<?php
    //goes into profile.php
    $terpDB = new TerpDB();
    $id=$_GET['id'];
    $showAdmin = false;

    //decide whether to show admin panel or not. This blocks the ability to add admin id(1 or 2) to the URL and bypass logging in
    if(($_SESSION['id'] == $_GET['id'] && $id == 1)){
        $showAdmin = true;
    }
    else{
        $showAdmin = false;
    }

    //shows profiles based on being logged in or not
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        //echo "logged in set";
        if ($_SESSION['id'] == $_GET['id']) {  
            //terp is logged in, show profile with edit button for myinfo.php
            echo $terpDB->getMyInfo($id, $showAdmin);
            echo "<script>document.getElementById('edit-img').style.display='inline-block'</script>";
        }
        else{
            //terp is logged in, but viewing other profiles
            echo $terpDB->getMyInfo($id, $showAdmin);
        } 
    }
    else {
        //person is not logged in, can see profiles
        echo $terpDB->getMyInfo($id, $showAdmin);
    }
?>