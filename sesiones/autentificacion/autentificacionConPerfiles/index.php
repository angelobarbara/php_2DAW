<?php
    session_start();
    //Usuarios por defecto(No se pueden eliminar)
    $_SESSION['usuarios'][26] = Array("cod"=>26,"nombre"=>'admin',"contrasena"=>'admin',"perfil"=>'Administrador');
    $_SESSION['usuarios'][27] = Array("cod"=>27,"nombre"=>'user',"contrasena"=>'user',"perfil"=>'Usuario');
    include('./showCode/showCode.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    
        include('includes/head.php');
    ?>

</head>
<body>
<header>
    <?php
        include('includes/nav.php');
    ?>
<header/>
<main>
    <div class="content">
        <?php
           include('includes/pages.php');
        ?>
        
    </div>


</main>
    <?php
        mostrarCodigo('./showCode/getCode.php',__FILE__);
    ?>
</body>
</html>
