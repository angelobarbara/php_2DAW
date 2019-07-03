 <?php
include './verCodigo.php';
if(isset($_POST['ver_codigo'])){

  verCodigo(__FILE__);

}else{

$var1 = 1;
$var2 = 5;
if ($var1<$var2){
	echo $var2;
}
else{
  echo 'variable 1: '. $var1.', variable 2: '.$var2 ;
	echo 'el valor mayor es: '.$var1;
}
botonVer();
}
?>
