<?php

    if(!isset($_GET['action'])){
        include('pages/home.php');
    }
    if(isset($_GET['action']) && $_GET['action']==='create' || isset($_GET['action']) && $_GET['action']==='modify'){
        include('pages/modifyContacts.php');
    }

?>