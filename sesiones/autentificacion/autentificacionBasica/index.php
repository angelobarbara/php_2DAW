<?php

    session_start();
    include('./showCode/showCode.php');

    $credenciales = array(
        array('usuario'=>'angelo','password'=>'1234')
    );
    $usuarioIncorrecto = "";
    $contrasenaIncorrecto = "";

    $msgUsuario = "";
    $style = "";

    $nombreUsuarioIniciado = "";

    $credencialesCorrectas = false;

    function checkCredenciales($usuario,$password,$credenciales){
        foreach ($credenciales as $credencial){
            if ($credencial['usuario'] === $usuario && $credencial['password'] === $password){
                return true;
            }
        }
        return false;

    }

    if(isset($_SESSION['credenciales'])){
        $credencialesCorrectas = true;
        $nombreUsuarioIniciado = "Hola ".$_SESSION['credenciales']['usuario'];
    }

    if (isset($_POST['submit'])){
        if(checkCredenciales($_POST['usuario'],$_POST['contrasena'],$credenciales)){
            $credencialesCorrectas = true;
            $_SESSION['credenciales'] = array('usuario' => $_POST['usuario'],'contrasenia' => $_POST['contrasena']);
            $nombreUsuarioIniciado = "Hola ".$_SESSION['credenciales']['usuario'];
        }else{
            $msgUsuario = "Credenciales incorrectas";
            $style="background-color:#ffd1d1; display: block;";
            $usuarioIncorrecto = $_POST['usuario'];
            $contrasenaIncorrecto = $_POST['contrasena'];
        }
    }


    echo '
        <!doctype html>
        <html lang="es">
        <head>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            
            <title>Inicio sesión</title>
            
        </head>
        <body>
        <header>
            <nav class="menu">
                
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    ';
                    if(isset($_SESSION['credenciales'])){
                        echo '
                             <li><a href="#">Modificar usuario</a></li>
                        ';
                    }
                    echo'
                    <li><a href="cerrar_session.php">Cerrar sesión</a></li>
                    
                </ul>
            </nav>
        </header>
        <main>
             ';
            if(!isset($_SESSION['credenciales'])){
                echo '
                 
                 <form action="' .$_SERVER["PHP_SELF"].'" method="POST">
                    <p class="title_login">Ups! no has iniciado sesión</p>
                    <label for="usuario">Usuario</label>
                    <input id="usuario" type="text" name="usuario" value="'.$usuarioIncorrecto.'" required/>
                    <label for="contrasenia">Contraseña</label>
                    <input id="contrasenia" type="password" name="contrasena" value="'.$contrasenaIncorrecto.'" required/>
                    <p class="msgUsuario" style="'.$style.'">'.$msgUsuario.'</p>
                    <input type="submit" name="submit" value="Enviar">
                </form>';
            }else{
                echo'<p class="title_login">'.$nombreUsuarioIniciado.'</p>';

            }


            echo '
        </main>
        ';

            mostrarCodigo('./showCode/getCode.php',__FILE__);

        echo'       
        </body>
        </html>

    
    ';

?>



