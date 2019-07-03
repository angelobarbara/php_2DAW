<!DOCTYPE html>
 <html lang="es">
    <head>
        <title>Ejercicio Suma Formulario</title> <meta charset="UTF-8" />
        <style>.error {color: #FF0000;} body{background-color: #fefbd8}fieldset{width:50%; margin:0 auto;}</style>
    </head>
    <body>
        <h1>Formulario Suma</h1>
    <?php

    
    if((!isset($_POST['enviar']) && !isset($_POST['resultado']))){
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
      <select name="count">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <input type="submit" name="enviar" value="enviar" />
      </form><br /><br />';
    }

    else if(!isset($_POST['resultado']) && isset($_POST['enviar'])){
      echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">';
      $cantidadNumeros = $_POST["count"];
      for($i=1;$i<=$cantidadNumeros;$i++){
        echo '<input type="text" name="num'.$i.'" /><br />';
      }

      echo '<input type="hidden" name="cantidad" value='.$cantidadNumeros.'/>';
      echo '<input type="submit" name="resultado" value="resultado" /><br />
      <input type="reset" value="limpiar" /></form><br />';
      }

      else if(isset($_POST["resultado"]) && !isset($_POST["enviar"])){
        $suma=0;
        for($i=1;$i<=$_POST["cantidad"];$i++){
          $suma +=$_POST['num'.$i];
        }
        echo '<strong>El resultado es: </strong>'.$suma;
      }


    ?>

    </body>
<a href="verCodigo.php?src=formularioSuma.php"> 
        <h3>Ver código</h3> 
      </a>
</html>
