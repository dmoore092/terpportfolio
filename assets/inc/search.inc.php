<?php
    require_once('classes/Terp.PDO.Class.php');
    $terpDB = new TerpDB();
    $data = null;
    if(isset($_POST['search-btn'])){
        //echo "search triggered";
       if(isset($_POST['search']) && $terpDB->isAlphaNumeric($_POST['search']) != 0){
            //echo "passed validation"; 
            $srch = $terpDB->sanitize($_POST['search']);
            $data = $terpDB->searchTerps($srch);
            header("Location: results.php?".http_build_query($data));
       }
     }

?>
