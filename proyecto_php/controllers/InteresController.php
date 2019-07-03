<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 25/02/2019
 * Time: 17:19
 */
require_once 'models/interes.php';
require_once 'models/ruta.php';

class InteresController{
    public function index(){
        //Utils::isAdmin();
        //$categoria = new Guia();
        //$categorias = $categoria->getAll();

        //require_once "views/guia/gestion.php";
        //$categoria = new Guia();
        //$categorias = $categoria->getRandom(6);

        //require_once 'views/guia/destacados.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $ruta = new Ruta();
            $ruta->setId($_GET['id']);
            $ruta = $ruta->getOne();

            $interes = new Interes();
            $interes->setRutaId($_GET['id']);
            $interes = $interes->getAllCategory();
        }

        require_once 'views/interes/ver.php';
    }

    public function verDescripcion(){
        if(isset($_GET['id'])){
            $interes = new Interes();
            $interes->setId($_GET['id']);
            $interes = $interes->getOne();
        }

        require_once 'views/interes/verDescripcion.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/interes/crear.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $punto = new Interes();
        $puntos = $punto->getAll();
        require_once 'views/interes/gestion.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $categoria = isset($_POST['ruta']) ? $_POST['ruta'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $categoria){
                $producto = new Interes();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setRutaId($categoria);

                If(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype =  $file['type'];

                    if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true); //para crear directorios recursivo hay que poner true
                            //no hace falta si es un solo directorio
                        }

                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    }
                }

                if(isset($_GET['id'])){
                    $producto->setId($_GET['id']);
                    $save = $producto->edit();
                }else{
                    $save = $producto->save();
                }

                //var_dump($save);
                //die();


                if($save){
                    $_SESSION['interes'] = 'complete';
                }else{
                    $_SESSION['interes'] = 'failed';
                }
            }else{
                $_SESSION['interes'] = 'failed';
            }
        }else{
            $_SESSION['interes'] = 'failed';
        }

        header('Location:'.base_url.'interes/gestion');
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $edit = true;
            $interes = new Interes();
            $interes->setId($_GET['id']);
            $interes = $interes->getOne();
        }else{
            header("Location:".base_url."interes/gestion");
        }

        require_once 'views/interes/crear.php';
    }

    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $producto = new Interes();
            $producto->setId($_GET['id']);
            $delete = $producto->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'interes/gestion');
    }
}