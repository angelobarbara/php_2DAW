<?php

$usuarioGeneral = "admin";
$contraseniaGeneral = "admin";
$msg = "";
$isError = false;
$style = "";

$usuarioCookie="";
$contraseniaCookie = "";

if(isset($_POST['submit'])){


  if($_POST['usuario']== $usuarioGeneral && $_POST['contrasena'] == $contraseniaGeneral){
      $msg = "Credenciales correctas";
      $style = "color: #5bcc6e;";
  }else{
      $isError = true;
      $msg = "Credenciales incorrectas";
      $style = "color: #ff3726;";
  }

}

if(isset($_COOKIE['usuario']) && isset($_COOKIE['password'])){
   if(isset($_POST['radios']) && $_POST['radios']=='nosave'){
       setcookie("usuario",$_POST['usuario'],time()-1);
       setcookie("password",$_POST['contrasena'],time()-1);
   }else{
       $usuarioCookie = $_COOKIE['usuario'];
       $contraseniaCookie = $_COOKIE['password'];
   }


}else{
    if(isset($_POST['radios']) && $_POST['radios'] == 'save' && !$isError){
        setcookie("usuario",$_POST['usuario']);
        setcookie("password",$_POST['contrasena']);

    }

}

 echo
     '<!DOCTYPE html>
      <html lang="es">
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Formulario-Cookies</title>
           
          </head>
          <body>
              <div class="content">
                  <p>Usuario: ' .$usuarioGeneral.' / Contraseña: '.$contraseniaGeneral.'</p>
                  
                  <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" name="usuario" type="text" value="'.$usuarioCookie.'"required> 
                        
                        <label for="contrasena">Contraseña</label>
                        <input id="contrasena" name="contrasena" type="password" value="'.$contraseniaCookie.'" required>
                        
                        <div><input class="radio" type="radio" name="radios" value="save" checked> Guardar credenciales</div>
                        <div><input class="radio" type="radio" name="radios" value="nosave"> Borrar cookies</div>
                        <p style="'.$style.'">'.$msg.'</p>
                        <input id="send" type="submit" name="submit" value="Enviar">
                  </form>
              </div>
          </body>
      </html>
    ';




?>


<a href="verCodigo.php?src=loginCookie.php"> 
        <h3>Ver código</h3> 
      </a>

