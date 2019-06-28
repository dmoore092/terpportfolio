<?php $relpath= ""; $title="Find Coaches"; $page="mfathletes";
    session_start();
    include_once ("classes/Terp.PDO.Class.php");
    include("assets/inc/header.inc.php");

    $terpDB = new TerpDB();

    $data = $terpDB->getTerpsByRole('coach');
    //$data = $terpDB->getTerpsByGender('female');
    //var_dump($data);
    echo $terpDB->getTerpsAsTable($data);

    include("assets/inc/footer.inc.php");
?>