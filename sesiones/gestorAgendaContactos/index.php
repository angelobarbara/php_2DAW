<?php
    session_start();

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
    
</body>

<a href="verCodigo.php?src=index.php"> 
        <h3>Ver código</h3> 
      </a>
</html>
