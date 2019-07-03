<!DOCTYPE html>
 <html lang="es">
    <head>
        <meta charset="utf-8" />
        <title> Ejercicio Arrays 6</title>
    </head>
    <body>
        <h1>Array con Países</h1>
      <?php
    include '../verCodigo.php';
   
    if(isset($_POST['ver_codigo'])){

      seeCode(__FILE__);

    }else{
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
        printContinent($America,"América");
        printContinent($Africa,"África");
        printContinent($Asia,"Asia");
        printContinent($Europa,"Europa");
        printContinent($Oceania,"Oceanía");
        echo '</table>';


    button();
    }
    //Rellena en la tabla los parámetros de los países de cada continente
    function printContinent($country,$name){
      echo '<tr><td style="text-align:center"><b>'.$name.'</b></td></tr>';
      foreach ($country as $pais){
        echo '<tr style="border: 1px solid red;">
        <td style="border: 1px solid black;">'.$pais["pais"].'</td>
        <td style="border: 1px solid black;">'.$pais["capital"].'</td>
        <td style="border: 1px solid black;"><img width="120px"; height="80px"; src="'.$pais["bandera"].'"/></td>
        </tr>';
      }
    }
    ?>


    </body>
    <a href="../../index.html">Regresar</a>
</html>
