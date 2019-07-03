<?php
    function mostrarTodosUsuarios(){
        if(isset($_SESSION['usuarios'])){
            $count = 0;
            foreach ($_SESSION['usuarios'] as $usuario){

                echo '
                       <div class="usuario">
                            <div class="content_imgavatar">
                               
                                <img class="imgavatar" src="img/avatar.png" alt="">
                                
                            </div>
                            <p class="nombreusuario"> '.$usuario['nombre']." (".$usuario['perfil'].")".'</p>
                            <div class="content_imgModify">
                                ';
                            if($_SESSION['usuarioRegistrado']['perfil'] == "Administrador") {
                                echo '
                                    <a href="' . $_SERVER['PHP_SELF'] . '?action=modify&cid=' . $usuario["cod"] . '">
                                        <img class="imgModify" src="img/modify.png" alt="">
                                    </a>
                                    ';
                            }
                echo   '</div>
                        </div> 
                    ';
                $count++;
            }
        }
    }


    function mostrarnombreusuarios($nombre){
        $regex = '/.*'.strtolower($nombre).'.*/';
        if(isset($_SESSION['usuarios'])){
            foreach ($_SESSION['usuarios'] as $usuario){
                if(preg_match($regex,strtolower($usuario['nombre']))){
                    echo '
                       <div class="usuario">
                            <div class="content_imgavatar">
                               
                                <img class="imgavatar" src="img/avatar.png" alt="">
                                
                            </div>
                            <p class="nombreusuario"> '.$usuario['nombre']." (".$usuario['perfil'].")".'</p>
                            <div class="content_imgModify">
                                ';
                                if($_SESSION['usuarioRegistrado']['perfil'] == "Administrador") {
                                    echo '
                                    <a href="' . $_SERVER['PHP_SELF'] . '?action=modify&cid=' . $usuario["cod"] . '">
                                        <img class="imgModify" src="img/modify.png" alt="">
                                    </a>
                                    ';
                                }
                            echo '</div>
                        </div> 
                    ';
                }

            }
        }
    }



    if(isset($_POST['btnbuscar'])){
        $msgbusqueda = 'Buscaste: "'.$_POST['text_buscar'].'"';
    }

    if(isset($_SESSION['usuarioRegistrado']['perfil']) && $_SESSION['usuarioRegistrado']['perfil'] == "Administrador"||$_SESSION['usuarioRegistrado']['perfil'] == "Usuario"){

        echo '
            <form class="formBuscar" action="'.$_SERVER["PHP_SELF"].'?action=admin" method="POST">
                <input id="Buscar" type="text" name="text_buscar" value="" placeholder="Buscar">
                <input class="submit" type="submit" name="btnbuscar" value="Buscar">
            </form>
            
            
        ';

        echo '
            <div class="content_list_contact">
                <p class="title_content_list_usuario">
                    Usuarios
                </p>
                ';
                if($_SESSION['usuarioRegistrado']['perfil'] == "Administrador") {
                    echo '
                    <a class="buttonNewUsuario" href="' . $_SERVER["PHP_SELF"] . '?action=create">Nuevo usuario</a>';
                }
                echo '
                <p class="msgBusquedaResult">'.$msgbusqueda.'</p>
                <div class="usuarios">';

                    if(!isset($_POST['btnbuscar'])){
                        mostrarTodosUsuarios();
                    }else{
                        mostrarnombreusuarios($_POST['text_buscar']);
                    }

               echo' </div>
            </div>
        ';

    }else{
        echo '<p class="titleMsg">Acceso restringido. No estás logeado.</p>';
    }

?>



