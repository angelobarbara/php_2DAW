<!DOCTYPE html>
 <html lang="es">
    <head>
        <title>Formulario continentes</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Formulario Continente</h1>
      <?php

    
    if(isset($_POST['enviar'])){

        function printContinente($country,$name){
      echo '<tr><td style="text-align:center"><b>'.$name.'</b></td></tr>';
      foreach ($country as $pais){
        echo '<tr style="border: 1px solid red;">
        <td style="border: 1px solid black;">'.$pais["pais"].'</td>
        <td style="border: 1px solid black;">'.$pais["capital"].'</td>
        <td style="border: 1px solid black;"><img width="120px"; height="80px"; src="'.$pais["bandera"].'"/></td>
        </tr>';
      }
    }
      // Array multidimensional con el nombre de cada país, su capital y bandera
      $America = array(
        array(
            "pais" => "Argentina",
            "capital" => "Buenos Aires",
            "bandera" => "../banderas/argentina.jpg",
        ),
        array(
            "pais" => "Bolivia",
            "capital" => "Sucre",
            "bandera" => "../banderas/bolivia.jpg",
        ),
        array(
            "pais" => "Brasil",
            "capital" => "Brasilia",
            "bandera" => "../banderas/brasil.jpg",
        ),
        array(
            "pais" => "Chile",
            "capital" => "Santiago",
            "bandera" => "../banderas/chile.jpg",
        ),

    );

    $Africa = array(
        array(
            "pais" => "Angola",
            "capital" => "Luanda",
            "bandera" => "../banderas/angola.jpg",
        ),
        array(
            "pais" => "Argelia",
            "capital" => "Argel",
            "bandera" => "../banderas/argelia.jpg",
        ),
        array(
            "pais" => "Benín",
            "capital" => "Porto-Novo",
            "bandera" => "../banderas/benin.jpg",
        ),
        array(
            "pais" => "Botsuana",
            "capital" => "Gaborone",
            "bandera" => "../banderas/botsuana.jpg",
        ),

    );
    $Asia = array(
        array(
            "pais" => "Afganistán",
            "capital" => "Kabul",
            "bandera" => "../banderas/afganistan.jpg",
        ),
        array(
            "pais" => "Arabia Saudita",
            "capital" => "Yiddá",
            "bandera" => "../banderas/arabia.jpg",
        ),
        array(
            "pais" => "Armenia",
            "capital" => "Yereván",
            "bandera" => "../banderas/armenia.jpg",
        ),
        array(
            "pais" => "Azerbaiyán",
            "capital" => "Bakú",
            "bandera" => "../banderas/azeraijan.jpg",
        ),

    );
    $Europa = array(
        array(
            "pais" => "Italia",
            "capital" => "Roma",
            "bandera" => "../banderas/italia.jpg",
        ),
        array(
            "pais" => "España",
            "capital" => "Madrid",
            "bandera" => "../banderas/espania.jpg",
        ),
        array(
            "pais" => "Francia",
            "capital" => "Paris",
            "bandera" => "../banderas/francia.jpg",
        ),
        array(
            "pais" => "Alemania",
            "capital" => "Berlin",
            "bandera" => "../banderas/alemania.jpg",
        ),

    );
    $Oceania = array(
        array(
            "pais" => "Australia",
            "capital" => "Canberra",
            "bandera" => "../banderas/australia.jpg",
        ),
        array(
            "pais" => "Nueva Zelanda",
            "capital" => "Wellington",
            "bandera" => "../banderas/nueva_zelanda.jpg",
        ),
        array(
            "pais" => "Papúa Nueva Guinea",
            "capital" => "Port Moresby",
            "bandera" => "../banderas/papua.jpg",
        ),
        array(
            "pais" => "Fiyi",
            "capital" => "Suva",
            "bandera" => "../banderas/fiyi.jpg",
        ),

    );
        echo '<table style="border:2px solid black; border-collapse:collapse;"><tr>
        <td style="border:1px solid black;">País</td><td style="border:1px solid black;">
        Capital</td><td style="border:1px solid black;"> Bandera</td>';
        if($_POST["continente"]==1){
            printContinente($Europa,"Europa");
            echo '</table>';
        }else if($_POST["continente"]==2){
            printContinente($Asia,"Asia");
            echo '</table>';
        }else if($_POST["continente"]==3){
            printContinente($America,"América");
            echo '</table>';
        }else if($_POST["continente"]==4){
            printContinente($Oceania,"Oceania");
            echo '</table>';
        }else{
            printContinente($Africa,"Africa");
            echo '</table>';
        }




    }

    echo'<form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
      <label>Continente</label><select name="continente">
        <option value="1">Europa</option><option value="2">Asia</option>
        <option value="3">América</option><option value="5">África</option>
        <option value="4">Oceanía</option></select>
      <input type="submit" name="enviar" value="Solicitar" />
    </form><br /><br />';

    
    ?>
    </body>
    <a href="verCodigo.php?src=formularioContinentes.php"> 
        <h3>Ver código</h3> 
      </a>
</html>
