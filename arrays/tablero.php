<!DOCTYPE html>
 <html lang="es">
    <head>
        <title> Ejercicio Arrays 3</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Tablero Barcos</h1>
    <?php
    include '../verCodigo.php';
   
    if(isset($_POST['ver_codigo'])){

      seeCode(__FILE__);

    }else{

      echo '<table style="border: 1px solid black;">';
      $row = array(
        array(" ","A","B","C","D","F"),// Cabecera
        array("border","agua","agua","barco","agua","agua"),//Cada Fila del tablero
        array("border","agua","agua","barco","agua","agua"),
        array("border","barco","agua","agua","agua","agua"),
        array("border","barco","agua","agua","agua","agua"),
        array("border","barco","agua","agua","agua","agua"),
        array("border","agua","agua","agua","agua","agua")
      );
      $i = 1; //Numero de Fila
      foreach ($row as $col){
        echo '<tr style="height:40px;width:40px; text-align:center;">';
        foreach ($col as $value){
          if ($value == "border"){
          echo '<td style="border:1px solid black;">'.$i.'</td>';
          $i = $i+1;
          }else{
            if ($value == "agua"){
            echo '<td style="border:1px solid black;
            background-color:lightblue;">'.$value.'</td>';
          }elseif ($value == "barco"){
              echo '<td style="border:1px solid black; background-color:gray;">'.$value.'</td>';
            }else{
              echo '<td style="border:1px solid black;">'.$value.'</td>';
            }
          }
        }
        echo '</tr>';
      }
      echo '</table>';
    button();
    }
    ?>
    </body>
    <a href="../../index.html">Regresar</a>
</html>
