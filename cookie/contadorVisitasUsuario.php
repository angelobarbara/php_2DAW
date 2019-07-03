<?php

$contador = 0;


if(isset($_COOKIE['contador'])){
    $contador = $_COOKIE['contador'];
    setcookie("contador",$_COOKIE['contador']+1,time()+3600);

}else{
    setcookie("contador",$contador,time()+3600);

}



echo
     '<!DOCTYPE html>
      <html lang="es">
          <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Contador-Cookies</title>
          </head>
          <body>
              <div class="content">
                 <p class="contador">Tus visitas a esta web: '.$contador.'</p>
              </div>
          </body>
      </html>
    ';

?>

<a href="verCodigo.php?src=contadorVisitasUsuario.php"> 
        <h3>Ver código</h3> 
      </a>

