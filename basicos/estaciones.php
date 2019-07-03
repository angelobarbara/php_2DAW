<?php
include '../verCodigo.php';

if(isset($_POST['ver_codigo'])){

	seeCode(__FILE__);

}else{

    $mesActual  = date('n'); // Formato: "3"
 	// Clasificamos los meses en un array
    $primavera  = array(3,4,5);
    $verano     = array(6,7,8);
    $otono      = array(9,10,11);
    $invierno   = array(12,1,2);

    if ( in_array( $mesActual, $primavera ) ) {

        $ruta ='../img/primavera.jpg';

    } elseif ( in_array( $mesActual, $verano ) ) {

        $ruta ='../img/verano.jpg';

    } elseif ( in_array( $mesActual, $otono ) ) {

        $ruta ='../img/otonio.jpg';

    } else {

        $ruta ='../img/invierno.jpg';

    }
	echo "<img src=".$ruta." align=center border='0' width='300' height='200'>";

	button();
}
?>
<a href="../../index.html">Regresar</a>
