<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 25/02/2019
 * Time: 19:17
 */

class Utils{
    public static function delete_session($name){
        if(isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategorias(){
        require_once 'models/guia.php';
        $categoria = new Guia();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    public static function showRutas(){
        require_once 'models/ruta.php';
        $ruta = new Ruta();
        $rutas = $ruta->getAll();
        return $rutas;
    }

    public static function showCategory($id){
        require_once 'models/guia.php';
        $guia = new Guia();
        $guia->setId($id);
        $guias = $guia->getOne();
        return $guias;
    }

    public static function showRuta($id){
        require_once 'models/ruta.php';
        $ruta = new Ruta();
        $ruta->setId($id);
        $rutas = $ruta->getOne();
        return $rutas;
    }
}