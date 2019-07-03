<?php


    if(isset($_GET['action']) && $_GET['action']==='create' || isset($_GET['action']) && $_GET['action']==='modify'){
        include('pages/modifyUsuario.php');
    }else if(isset($_GET['action']) && $_GET['action']==='admin'){
        include('pages/adminUsuarios.php');
    }else if(isset($_GET['action']) && $_GET['action']==='inicioSesion'){
        include('pages/home.php');
    }else if(!isset($_GET['action'])){
        include('pages/home.php');
    }else{
        include('pages/error404.php');
    }




?>