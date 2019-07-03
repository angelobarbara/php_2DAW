<?php

include '../verCodigo.php';

if(isset($_POST['ver_codigo'])){
    seeCode(__FILE__);
}else{
    $dia = '21';
    $mes = '08';
    $anio = '1993';

    $dia_actual = date('d');
    $mes_actual = date('m');
    $anio_actual = date('Y');

    $anioUsuario = $anio_actual-$anio;

    if($mes_actual>$mes && $dia_actual>$dia){
        $anioUsuario++;
    }
    echo "Tu edad es ".$anioUsuario;

    button();
}

    
?>

<a href="../../index.html">Regresar</a>