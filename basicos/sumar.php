<?php
include '../verCodigo.php';

if(isset($_POST['ver_codigo'])){
    seeCode(__FILE__);
}else{
    $numero = 0;
    $contador = 0;

	for($i = 0; $i < 10; $i++){
		if($i%2 == 0 && $contador <= 3){
            $numero += $i;
            $contador++;
        }
    }
    
    echo "La suma de los tre primeros n&#250;meros pares es ".$numero;

    button();
}
?>
<a href="../../index.html">Regresar</a>