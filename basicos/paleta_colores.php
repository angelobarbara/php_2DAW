<!DOCTYPE html>
 <html lang="es">
	<head>
		<title> Paleta de colores </title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h3>Mostrando paleta de colores </h3>
	<?php
	
	include '../verCodigo.php';
	if(isset($_POST['ver_codigo'])){

    seeCode(__FILE__);

	}else{
		echo '<table>';
		         for ($r = 0; $r < 256; $r += 16) {
                    for ($g = 0; $g < 256; $g += 16) {
                        for ($b = 0; $b < 256; $b += 16) {
                            echo "<td style='background-color: rgb($r, " . "$g, $b);'>";
                            echo '('. $r . ',' . $g.',' .$b .')';
                            echo "</td>";

                            if ($b > ((255 - 16))) {
                                echo("</tr><tr>");

                            }
                        }
                    }
                        echo("</tr><tr></tr>");

                }
      echo '</table>';
		button();
	}

	?>
	</body>
	<a href="../../index.html">Regresar</a>
</html>
