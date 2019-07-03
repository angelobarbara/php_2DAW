<?php

function codeExist($cod){//compruebar si existe un usurio con el código indicado
    foreach ($_SESSION['contactos'] as $contacto){
        if($contacto['cod']===$cod){
            return true;
        }
    }
    return false;
}

function generarCodContacts(){//generar códigos para usuarios
    do{
        $codigoGenerado = rand(0,500);
    }while(codeExist($codigoGenerado));
    return $codigoGenerado;
}


$nombre = "";
$telefono = "";
$mensajeUsuario = "";
$style = "";
$titleDialog = "";


if($_GET['action']=='modify'){
    $titleDialog = 'Modificar usuario';
}else if($_GET['action']=='create'){
    $titleDialog = 'Crear usuario';
}


if(isset($_GET['action']) && isset($_GET['cid'])) {//Obtener nombre y usuario a modificar
    $nombre = $_SESSION['contactos'][$_GET['cid']]['nombre'];
    $telefono = $_SESSION['contactos'][$_GET['cid']]['telefono'];

}
if(isset($_POST['btnModify'])){
    $_SESSION['contactos'][$_GET['cid']]['nombre'] = $_POST['nombre'];
    $_SESSION['contactos'][$_GET['cid']]['telefono'] = $_POST['telefono'];

    $nombre = $_SESSION['contactos'][$_GET['cid']]['nombre'];
    $telefono = $_SESSION['contactos'][$_GET['cid']]['telefono'];

    $mensajeUsuario = "Contacto modificado";
    $style = "background-color: #cfedff;";

}else if(isset($_POST['btnDelete'])){
    unset($_SESSION['contactos'][$_GET['cid']]);
    $mensajeUsuario = "Contacto eliminado";
    $style = "background-color: #ffd1d1;";

}else if(isset($_POST['btnCreate'])){
    if(!isset($_SESSION['contactos'])){
        $_SESSION['contactos'] = Array();
    }
    $codGenerado = generarCodContacts();
    $_SESSION['contactos'][$codGenerado] = Array("cod"=>$codGenerado,"nombre"=>$_POST['nombre'],"telefono"=>$_POST['telefono']);
    $mensajeUsuario = "Contacto creado";
    $style = "background-color: #cfffd1;";
}

    echo '
            <h3 class="title_dialog">'.$titleDialog.'</h3>
            <form class="formModify" action="" method="POST">
                <input id="nombre" type="text" name="nombre" value="'.$nombre.'" placeholder="Nombre" required>
                <input id="telefono" type="tel" name="telefono" value="'.$telefono.'" placeholder="Teléfono" required>
                <p style="'.$style.'" class="mensajeUsuario">'.$mensajeUsuario.'</p>
                ';

            if(isset($_GET['action']) && $_GET['action'] === 'modify'){
                echo'<input class="submit" type="submit" name="btnModify" value="Aplicar">';
                echo'<input class="submit" type="submit" name="btnDelete" value="Eliminar">';
            }else if(isset($_GET['action']) && $_GET['action'] === 'create'){
                echo'<input class="submit" type="submit" name="btnCreate" value="Crear">';
            }

    echo' </form>
            
            
    ';


?>




