<?php
include '../verCodigo.php';

if(isset($_POST['ver_codigo'])){
    seeCode(__FILE__);
}else{
 $mes = "Febrero";
 $anio = 2018;

 switch($mes){
     case "Noviembre":
     case "Abril":
     case "Junio":
     case "Septiembre":
        echo "<p>El mes de ".$mes." tiene 30 días</p>";
        break;
    case "Enero":
    case "Marzo":
    case "Mayo":
    case "Julio":
    case "Agosto":
    case "Octubre":
    case "Diciembre":
        echo "<p>El mes de ".$mes." tiene 31 días</p>";
        break;
    default:
        if($anio%4==0 && $anio%100 != 0 || $anio%400 == 0){
            echo "<p>El mes de ".$mes.", del a&ntilde;o ".$anio.", tiene 29 días</p>";
        }
        else{
            echo "<p>El mes de ".$mes.", del a&ntilde;o ".$anio.", tiene 28 días</p>";
        }
 }

 button();
}
 
?>

<a href="../../index.html">Regresar</a>