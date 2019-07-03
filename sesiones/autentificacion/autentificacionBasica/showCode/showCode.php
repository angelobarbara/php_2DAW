<?php
/**
 * Clase para administrar y gestionar el botón de ver Código.
 * User: Javier Ponferrada López
 * Date: 26/9/17
 */

/***
 * @param $route_file_getCode, ruta del fichero getCode desde el fichero que se ejecuta ésta función.
 * @param $file_Ejercicio, ruta del fichero en el que se invoca la función.
 */
function mostrarCodigo($route_file_getCode, $file_Ejercicio){
     echo '
         <a class="button_view_code" href="'.$route_file_getCode."?uri=".$file_Ejercicio.'">Ver código</a>  
     ';

}

?>