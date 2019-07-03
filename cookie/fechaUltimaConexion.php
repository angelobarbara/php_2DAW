<?php

$ultimaConexion = "";


$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$arrayDias = array( 'Domingo', 'Lunes', 'Martes',
    'Miercoles', 'Jueves', 'Viernes', 'Sabado');



ini_set('date.timezone','Europe/Madrid');
$hoy = $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y').', '.date("G:i A");
setcookie("ultimaConexion",$hoy,time()+3600);

if(isset($_COOKIE['ultimaConexion'])){
    $ultimaConexion = 'Última modificación: '.$_COOKIE['ultimaConexion'];
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
                 <p class="fecha">'.$ultimaConexion.'</p>
              </div>
          </body>
      </html>
    ';

?>

<a href="verCodigo.php?src=fechaUltimaConexion.php"> 
        <h3>Ver código</h3> 
      </a>

