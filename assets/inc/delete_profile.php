<?php 
    if(isset($_POST['delete'])){
        $id=$_POST["terpid"];
        $terpDB->delete($id);
    };
?>