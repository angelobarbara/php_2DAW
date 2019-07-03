<!DOCTYPE html>
 <html lang="es">
    <head>
        <meta charset="utf-8" />
        <title> Ejercicio Arrays 4</title>
    </head>
    <body>
        <h1>Array con Calificaciones</h1>
    <?php
    include '../verCodigo.php';
    
    if(isset($_POST['ver_codigo'])){

      seeCode(__FILE__);

    }else{
        // Array multidimensional
        $alumnos = array(
            array(
                "nombre" => "a",
                "eval1" => $aleatorio = rand (5, 10),
                "eval2" => $aleatorio = rand (5, 10),
                "eval3" => $aleatorio = rand (5, 10)
            )
        );
        echo '<table style="border:2px solid black; border-collapse:collapse;"><tr>
        <td style="border:1px solid black;">Alumno</td><td style="border:1px solid black;">
        1 Eval</td><td style="border:1px solid black;"> 2 Eval</td><td style="border:1px solid black;">
        3 Eval</td>
        <td style="border:1px solid black;"> Eval Final</td></tr>';
        foreach ($alumnos as $alumno){ 
          echo '<tr style="border: 1px solid red;">
          <td style="border: 1px solid black;">'.$alumno["nombre"].'</td>
          <td style="border: 1px solid black;">'.$alumno["eval1"].'</td>
          <td style="border: 1px solid black;">'.$alumno["eval2"].'</td>
          <td style="border: 1px solid black;">'.$alumno["eval3"].'</td>
          <td style="border: 1px solid red;" >'.(round(($alumno["eval1"]+$alumno["eval2"]+$alumno["eval3"])/3)).
          '</td></tr>';
        }
        echo '</table>';


    button();
    }
    ?>


    </body>
    <a href="../../index.html">Regresar</a>
</html>
