<?php

function codeExist($cod){//compruebar si existe un usurio con el código indicado
    foreach ($_SESSION['usuarios'] as $contacto){
        if($contacto['cod']===$cod){
            return true;
        }
    }
    return false;
}

function generarCodUsuario(){//generar códigos para usuarios
    do{
        $codigoGenerado = rand(0,500);
    }while(codeExist($codigoGenerado));
    return $codigoGenerado;
}

function userExist($nombreUsuario){//comprobar si el usuario a crear ya existe.
    foreach ($_SESSION['usuarios'] as $usuario){
        if($usuario['nombre'] == $nombreUsuario){
            return true;
        }
    }
    return false;
}



$nombre = "";
$contrasena = "";
$mensajeUsuario = "";
$style = "";
$titleDialog = "";

if(isset($_SESSION['usuarioRegistrado']['perfil']) && $_SESSION['usuarioRegistrado']['perfil'] == "Administrador"){


    if($_GET['action']=='modify'){
        $titleDialog = 'Modificar usuario';
    }else if($_GET['action']=='create'){
        $titleDialog = 'Crear usuario';
    }


    if(isset($_GET['action']) && isset($_GET['cid'])) {//Obtener nombre y usuario a modificar
        $nombre = $_SESSION['usuarios'][$_GET['cid']]['nombre'];
        $contrasena = $_SESSION['usuarios'][$_GET['cid']]['contrasena'];

    }
    if(isset($_POST['btnModify'])){
        $_SESSION['usuarios'][$_GET['cid']]['nombre'] = $_POST['nombre'];
        $_SESSION['usuarios'][$_GET['cid']]['contrasena'] = $_POST['contrasena'];

        $nombre = $_SESSION['usuarios'][$_GET['cid']]['nombre'];
        $contrasena = $_SESSION['usuarios'][$_GET['cid']]['contrasena'];

        $mensajeUsuario = "Usuario modificado";
        $style = "background-color: #cfedff;";

    }else if(isset($_POST['btnDelete'])){
        unset($_SESSION['usuarios'][$_GET['cid']]);
        $mensajeUsuario = "Usuario eliminado";
        $style = "background-color: #ffd1d1;";

    }else if(isset($_POST['btnCreate'])){
        if(!isset($_SESSION['usuarios'])){
            $_SESSION['usuarios'] = Array();
        }
        if(!userExist($_POST['nombre'])){
            $codGenerado = generarCodUsuario();
            $_SESSION['usuarios'][$codGenerado] = Array("cod"=>$codGenerado,"nombre"=>$_POST['nombre'],"contrasena"=>$_POST['contrasena'],"perfil"=>$_POST['perfil']);
            $mensajeUsuario = "Usuario creado";
            $style = "background-color: #cfffd1;";
        }else{
            $mensajeUsuario = "El usuario ya existe";
            $style = "background-color: #ffd1d1;";
        }



    }

        echo '
                <h3 class="title_dialog">'.$titleDialog.'</h3>
                <form class="formModify" action="" method="POST">
                    <input id="nombre" type="text" name="nombre" value="'.$nombre.'" placeholder="Nombre" required>
                    <input id="contrasena" type="password" name="contrasena" value="'.$contrasena.'" placeholder="Contraseña" required>
                    <label for="rol">Perfil</label>
                    <select id="rol" name="perfil" required>
                      <option value="Administrador">Administrador</option>
                      <option value="Usuario">Usuario</option>
                    </select>
                    
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
}else{
    echo '<p class="titleMsg">Acceso restringido. Sólo permitido al administrador</p>';
}

?>




