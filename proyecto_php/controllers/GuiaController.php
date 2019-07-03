<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 25/02/2019
 * Time: 17:19
 */
require_once 'models/guia.php';
require_once 'models/ruta.php';

class GuiaController{
    public function index(){
        //Utils::isAdmin();
        //$categoria = new Guia();
        //$categorias = $categoria->getAll();

        //require_once "views/guia/gestion.php";

        $categoria = new Guia();
        $categorias = $categoria->getRandom(6);

        require_once 'views/guia/destacados.php';
    }

    public function gestion(){
        Utils::isAdmin();
        $categoria = new Guia();
        $categorias = $categoria->getAll();
        require_once 'views/guia/gestion.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $categoria = new Guia();
            $categoria->setId($_GET['id']);
            $categoria = $categoria->getOne();

            $producto = new Ruta();
            $producto->setGuiaId($_GET['id']);
            $productos = $producto->getAllCategory();
        }

        require_once 'views/guia/ver.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/guia/crear.php';
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $edit = true;
            $categoria = new Guia();
            $categoria->setId($_GET['id']);
            $categoria = $categoria->getOne();
        }else{
            header("Location:".base_url."guia/gestion");
        }

        require_once 'views/guia/crear.php';
    }

    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $guia = new Guia();
            $guia->setId($_GET['id']);
            $delete = $guia->delete();

            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'guia/gestion');
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            //$imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($nombre && $descripcion) {
                $guia = new Guia();
                $guia->setNombre($nombre);
                $guia->setDescripcion($descripcion);

                If (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true); //para crear directorios recursivo hay que poner true
                            //no hace falta si es un solo directorio
                        }

                        $guia->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    }
                }

                if (isset($_GET['id'])) {
                    $guia->setId($_GET['id']);
                    $save = $guia->edit();
                } else {
                    $save = $guia->save();
                }

                //var_dump($save);
                //die();


                if ($save) {
                    $_SESSION['guia'] = 'complete';
                } else {
                    $_SESSION['guia'] = 'failed';
                }
            } else {
                $_SESSION['guia'] = 'failed';
            }
        } else {
            $_SESSION['guia'] = 'failed';
        }

        header('Location:' . base_url . 'guia/gestion');
    }
}