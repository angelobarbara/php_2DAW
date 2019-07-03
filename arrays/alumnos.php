<!DOCTYPE html>
 <html lang="es">
    <head>
        <title> Ejercicio Arrays 1</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Array de Alumnos</h1>
        <div style="text-align:center;">

    <?php
    include '../verCodigo.php';
   
    if(isset($_POST['ver_codigo'])){

      seeCode(__FILE__);

    }else{

        $alumnos = array(
            array(
                "nombre" => "a",
                "direccion" => "b",
                "foto" => "c"
            )

        );
    $aleatorio = rand (0, 17);

    echo 'el alumno es '.$alumnos [$aleatorio]["nombre"];
    echo '<br /><a href="'.$alumnos [$aleatorio]["direccion"].'">Ver Página</a>';
    echo '<br /><img src="'.$alumnos[$aleatorio]["foto"].'" width=250px;  height=250px;/>';

    button();
    }
    ?>
  </div>

    </body>
    <a href="../index.php">Regresar</a>
</html>
