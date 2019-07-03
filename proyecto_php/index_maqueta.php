<?php
/**
 * Created by PhpStorm.
 * User: angelo
 * Date: 25/02/2019
 * Time: 16:53
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <title>Document</title>
</head>
<body>
<header id="header">
    <div id="logo">
        <img src="assets/img/camiseta.png" alt="" srcset="" />
        <a href="index_maqueta.php">
            <h1>Tienda de camisetas</h1>
        </a>
    </div>
</header>
<nav id="menu">
    <ul>
        <li>
            <a href="#">inicio</a>
        </li>
        <li>
            <a href="#">inicio</a>
        </li>
        <li>
            <a href="#">inicio</a>
        </li>
        <li>
            <a href="#">inicio</a>
        </li>
        <li>
            <a href="#">inicio</a>
        </li>
    </ul>
</nav>
<div id="content">
    <aside id="lateral">
        <div id="login" class="block-aside">
            <form action="#" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" />
                <label for="password">Password</label>
                <input type="password" name="password" />
                <input type="submit" value="Enviar" />
            </form>
            <ul>
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
            </ul>
        </div>
    </aside>
    <div id="central">

        <h1>Productos destacados</h1>
        <div class="product">
            <img src="assets/img/camiseta.png" alt="" srcset="" />
            <h2>Camiseta azul</h2>
            <p>30€</p>
            <a href="#" class="button">Comprar</a>
        </div>
        <div class="product">
            <img src="assets/img/camiseta.png" alt="" srcset="" />
            <h2>Camiseta azul</h2>
            <p>30€</p>
            <a href="#" class="button">Comprar</a>
        </div>
    </div>

</div>
<footer id="footer">
    <p>Desarrollado por Angelo Barbara &copy;<?=date('Y')?></p>
</footer>
</body>
</html>



