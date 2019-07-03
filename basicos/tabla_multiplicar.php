<?php
include '../verCodigo.php';

if(isset($_POST['ver_codigo'])){
    seeCode(__FILE__);
}else{

	for ($i = 1; $i <= 10; $i++) {
        echo "<table style='float: left; border: 1px solid'>";
    
        
        for ($j = 0; $j <= 10; $j++) {
            echo "<tr><td>" . $i . " x " . $j . " = " . ($i * $j) . "</td></tr>";
        }
        
        echo "</table>";
    }
    echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";

    button();
}

?>

<a href="../../index.html">Regresar</a>