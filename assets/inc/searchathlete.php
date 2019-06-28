<?php
//goes in findathletes.php
if(isset($_POST['search-athlete'])){
    //echo "search triggered";
    if(isset($_POST['search-athlete'])){
        $name       = $terpDB->sanitize($_POST['name']);
        $sport      = $_POST['sport'];
        $state      = $_POST['state'];
        $class      = $_POST['class'];
        $position   = $terpDB->sanitize($_POST['position']);
        $school     = $terpDB->sanitize($_POST['school']);
        $gpa        = $_POST['gpa'];

        $arr = array();
        if($name != "") $arr[] = "name LIKE '%{$name}%'";
        if($sport != "") $arr[] = "sport = '{$sport}'";
        if($state != "") $arr[] = "state = '{$state}'";
        if($class != "") $arr[] = "gradyear = '{$class}'";
        if($position != "") $arr[] = "primaryposition LIKE '%{$position}%'";
        if($school != "") $arr[] = "highschool LIKE '%{$school}%'";
        if($gpa != "") $arr[] = "gpa >= '{$gpa}'";

        if($name == "" && $sport == "" && $state == "" && $class == "" && $position == "" && $school == "" && $gpa == "" ){
            $query = "SELECT id, name, highschool, gradYear, sport, primaryPosition FROM terps WHERE account_type = 'terp';";
        }
        else{
            $query = "SELECT id, name, highschool, gradYear, sport, primaryPosition FROM terps WHERE ";
            $query .= implode(" AND ", $arr);
            $query .= " AND account_type = 'terp';";
        }
        //$data = $terpDB->searchterps($srch);
        $data = $terpDB->getTerpsByFindAthleteSearch($query);
        //header("Location: results.php?".http_build_query($data));
        echo $terpDB->getTerpsAsTable($data);
        echo $terpDB->getTerps($data);
   }
 };
?>