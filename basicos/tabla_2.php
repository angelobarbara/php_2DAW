
<!DOCTYPE html>
<!-- Tablar de multiplicar 1 al 10-->
 <html lang="es">
	<head>
		<title> Ejercicio 8 </title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h3>Mostrando Tabla de multiplicar del 2 </h3>
	<?php
	
	include '../verCodigo.php';
	if(isset($_POST['ver_codigo'])){

    seeCode(__FILE__);

	}else{
		echo '<table style="border: 1px solid black;">';
		for($i=1; $i<=10; $i++){
			echo '<tr><td>2 x '.$i.' = '.(2 * $i).'</td></tr>';

		}
		echo '</table>';
	button();
	}

	?>
	</body>
	<a href="../../index.html">Regresar</a>
</html>
