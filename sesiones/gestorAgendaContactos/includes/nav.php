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
                <li><a href="index.php">Inicio</a></li>
                <li><a href="'.$_SERVER['PHP_SELF'].'?action=create">Nuevo contacto</a></li>
                <li><a href="pages/cerrar_session.php">Cerrar sesión</a></li>
                
            </ul>
        </nav>
    ';

?>