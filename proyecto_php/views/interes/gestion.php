<h1>Gestion de puntos de interes</h1>

<a href="<?=base_url?>interes/crear" class="button button-small">Crear punto de interes</a>

<?php if(isset($_SESSION['interes']) && $_SESSION['interes'] == 'complete'): ?>
    <strong class="alert_green">Ruta creada correctamente</strong>
<?php elseif(isset($_SESSION['interes']) && $_SESSION['interes'] != 'complete'): ?>
    <strong class="alert_red">La ruta no se ha añadido</strong>
<?php endif; ?>
<?php Utils::delete_session('interes') ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">Ruta eliminada correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">La ruta no se ha podido eliminar</strong>
<?php endif; ?>

<?php Utils::delete_session('delete') ?>

<table>
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>ruta</th>
        <th>imagen</th>
    </tr>
    <?php while($punto = $puntos->fetch_object()): ?>
        <tr>
            <th><?=$punto->id; ?></th>
            <th><?=$punto->nombre; ?></th>
            <?php $rutas = Utils::showRuta($punto->ruta_id) ?>
            <th><?=$rutas->nombre ?></th>
            <th class="gestion">
                <?php if($punto->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$punto->imagen?>" alt="" srcset="" class="imagen-gestion" />
                <?php else: ?>
                    <img src="<?=base_url?>assets/img/default.jpg" alt="" srcset="" class="imagen-gestion" />
                <?php endif; ?>
            </th>
            <td>
                <a href="<?=base_url?>interes/editar&id=<?=$punto->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url ?>interes/eliminar&id=<?=$punto->id?>" class="button button-gestion button-red">Eliminar</a>
                <!--Es necesario poner el & para pasarle el id por get porqué en la ruta ya le estamos pasando parametros
                 de controller y action que estamos limpiando -->
            </td>
        </tr>
    <?php endwhile; ?>
</table>