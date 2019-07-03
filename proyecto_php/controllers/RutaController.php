<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 25/02/2019
 * Time: 17:19
 */

require_once 'models/ruta.php';
require_once 'models/guia.php';

class RutaController{
    public function index(){
        //echo "Controlador ruta acción index";
        //$producto = new Ruta();
        //$productos = $producto->getRandom(6);
        //require_once 'views/ruta/destacados.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $producto = new Ruta();
            $producto->setId($_GET['id']);
            $pro = $producto->getOne();
        }else{
            header("Location:".base_url."ruta/gestion");
        }

        require_once 'views/ruta/ver.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $ruta = new Ruta();
        $rutas = $ruta->getAll();
        require_once 'views/ruta/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/ruta/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $categoria = isset($_POST['guia']) ? $_POST['guia'] : false;
            $recorrido = isset($_POST['recorrido']) ? $_POST['recorrido'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $categoria && $recorrido){
                $producto = new Ruta();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setGuiaId($categoria);
                $producto->setRecorrido($recorrido);

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


                if($save){
                    $_SESSION['ruta'] = 'complete';
                }else{
                    $_SESSION['ruta'] = 'failed';
                }
            }else{
                $_SESSION['ruta'] = 'failed';
            }
        }else{
            $_SESSION['ruta'] = 'failed';
        }

        header('Location:'.base_url.'ruta/gestion');
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $edit = true;
            $producto = new Ruta();
            $producto->setId($_GET['id']);
            $ruta = $producto->getOne();
        }else{
            header("Location:".base_url."ruta/gestion");
        }

        require_once 'views/ruta/crear.php';
    }

    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $producto = new Ruta();
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

        header('Location:'.base_url.'ruta/gestion');
    }

    public function verDescripcion(){
        if(isset($_GET['id'])){
            $ruta = new Ruta();
            $ruta->setId($_GET['id']);
            $rutas = $ruta->getOne();
        }

        require_once 'views/ruta/verDescripcion.php';
    }

    public function verRecorrido(){
        if(isset($_GET['id'])){
            $ruta = new Ruta();
            $ruta->setId($_GET['id']);
            $rutas = $ruta->getOne();
        }

        require_once 'views/ruta/verRecorrido.php';
    }

    public function descargarRecorrido(){
        if(isset($_GET['id'])){
            $ruta = new Ruta();
            $guia = new Guia();
            $guia->setId($_GET['guia']);
            $ruta->setId($_GET['id']);
            $rutas = $ruta->download();
        }

        header('Location:'.base_url.'guia/ver&id='.$guia->getId());
    }
}