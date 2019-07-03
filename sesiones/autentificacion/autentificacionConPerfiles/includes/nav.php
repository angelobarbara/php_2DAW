<?php

    echo '
        <nav class="menu">
            <div class="content_icon_open_nav">
                <div class="icon_open_nav"onclick="selectButtonMenu();">
                    <div class="line_button_open_nav" id="line_1"></div>
                    <div class="line_button_open_nav" id="line_2"></div>
                    <div class="line_button_open_nav" id="line_3"></div>
                </div>
            </div>
            <ul>
                <li><a href="index.php">Inicio</a></li>';
                if(isset($_SESSION['usuarioRegistrado']['perfil'])){
                     if($_SESSION['usuarioRegistrado']['perfil'] == "Administrador" || $_SESSION['usuarioRegistrado']['perfil'] == "Usuario")
                        echo '<li><a href="'.$_SERVER['PHP_SELF'].'?action=admin">Usuarios</a></li>';
                    echo'<li><a href="index.php?action=inicioSesion">Cambiar usuario</a></li>';

                    echo'<li><a href="pages/cerrar_session.php" '.(($_SESSION['usuarioRegistrado']['perfil'] == "Administrador")?'onclick="return confirm(\'Si cierras sesión, se borrarán todos los usuarios creados.\');"':"").'>Cerrar sesión</a></li>';
                }else{
                    echo'<li><a href="index.php?action=inicioSesion">Iniciar sesión</a></li>';
                }

                
            echo '</ul>
        </nav>
    ';

?>