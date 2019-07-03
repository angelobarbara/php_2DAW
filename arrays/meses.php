<!DOCTYPE html>
 <html lang="es">
    <head>
        <title> Ejercicio Arrays 2</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Meses del año</h1>


    <?php
    include '../verCodigo.php';
   
    if(isset($_POST['ver_codigo'])){

      seeCode(__FILE__);

    }else{
      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto",
      "Septiembre","Octubre","Noviembre","Diciembre");
      echo '<ol>';
      foreach ($meses as $mes){
        echo '<li>'.$mes.'</li>';
      }
        echo '</ol>';

    button();
    }
    ?>


    </body>

</html>
