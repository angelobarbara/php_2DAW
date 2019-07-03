<aside id="lateral">
    <div id="login" class="block-aside">
        <?php if(!isset($_SESSION['identity'])): ?>

        <form action="<?=base_url?>usuario/login" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" />
            <label for="password">Password</label>
            <input type="password" name="password" />
            <input type="submit" value="Enviar" />
        </form>

        <?php else: ?>
        <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
        <?php endif ?>
        <ul>
            <?php if(isset($_SESSION['admin'])): ?>
                <li><a href="<?=base_url?>guia/gestion">Gestionar guias</a></li>
                <li><a href="<?=base_url?>ruta/gestion">Gestionar rutas</a></li>
                <li><a href="<?=base_url?>interes/gestion">Gestionar puntos de interes</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['identity'])): ?>
                <li><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
            <?php else: ?>
                <a href="<?=base_url?>usuario/registro">Registrate</a>
            <?php endif; ?>
        </ul>
    </div>
</aside>
<div id="central">