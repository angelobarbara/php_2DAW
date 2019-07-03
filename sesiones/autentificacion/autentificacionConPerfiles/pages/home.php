<?php
    $usuarioIncorrecto = "";
    $contrasenaIncorrecto = "";

    $msgUsuario = "";
    $style = "";

    $perfilRegistrado = "";


    if(isset($_GET['action']) && $_GET['action'] == "inicioSesion"){

        if (isset($_POST['enviarLogin'])){
            $credencialesLogin = false;
            if(isset($_SESSION['usuarios'])){//checkCredencialesLogin
                foreach ($_SESSION['usuarios'] as $credencial){
                    if ($credencial['nombre'] == $_POST['usuario'] && $credencial['contrasena'] == $_POST['contrasena']){
                        $perfilRegistrado = $credencial['perfil'];
                        $credencialesLogin = true;
                    }
                }
            }

            if($credencialesLogin){
                $_SESSION['usuarioRegistrado'] = array('usuario' => $_POST['usuario'],'contrasenia' => $_POST['contrasena'],'perfil'=>$perfilRegistrado);
            }else{
                $msgUsuario = "Credenciales incorrectas";
                $style="background-color:#ffd1d1; display: block;";
                $usuarioIncorrecto = $_POST['usuario'];
                $contrasenaIncorrecto = $_POST['contrasena'];
            }
        }

            echo '
                 <form class="formLogin" action="' .$_SERVER["PHP_SELF"].'?action=inicioSesion" method="POST">';
                    if(isset($_SESSION['usuarioRegistrado'])){
                        echo '<p class="title_login">Cambia de usuario</p>';
                    }else{
                        echo '<p class="title_login">Inicia sesión</p>';
                    }
                    echo '<p style="margin-bottom: 10px">Usuario: admin / Contraseña: admin</p>';
                    echo '
                    <label class="labellogin" for="usuario">Usuario</label>
                    <input class="inputLogin" id="usuario" type="text" name="usuario" value="'.$usuarioIncorrecto.'" required/>
                    
                    <label class="labellogin" for="contrasenia">Contraseña</label>
                    <input class="inputLogin" id="contrasenia" type="password" name="contrasena" value="'.$contrasenaIncorrecto.'" required/>
                    
                    <p class="msgUsuario" style="'.$style.'">'.$msgUsuario.'</p>
                    <input type="submit" name="enviarLogin" value="Enviar">
                </form>';




    }else{
        echo '<p class="titleMsg">Hola bienvenido</p>';
    }
?>


