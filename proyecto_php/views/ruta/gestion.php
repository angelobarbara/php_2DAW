<h1>Gestion de rutas</h1>

<a href="<?=base_url?>ruta/crear" class="button button-small">Crear ruta</a>

<?php if(isset($_SESSION['ruta']) && $_SESSION['ruta'] == 'complete'): ?>
    <strong class="alert_green">Ruta creada correctamente</strong>
<?php elseif(isset($_SESSION['ruta']) && $_SESSION['ruta'] != 'complete'): ?>
    <strong class="alert_red">La ruta no se ha añadido</strong>
<?php endif; ?>
<?php Utils::delete_session('ruta') ?>

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
        <th>guia</th>
        <th>imagen</th>
    </tr>
    <?php while($ruta = $rutas->fetch_object()): ?>
        <tr>
            <th><?=$ruta->id; ?></th>
            <th><?=$ruta->nombre; ?></th>
            <?php $guias = Utils::showCategory($ruta->guia_id) ?>
            <th><?=$guias->nombre ?></th>
            <th class="gestion">
                <?php if($ruta->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$ruta->imagen?>" alt="" srcset="" class="imagen-gestion" />
                <?php else: ?>
                    <img src="<?=base_url?>assets/img/default.jpg" alt="" srcset="" class="imagen-gestion" />
                <?php endif; ?>
            </th>
            <td>
                <a href="<?=base_url?>ruta/editar&id=<?=$ruta->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url ?>ruta/eliminar&id=<?=$ruta->id?>" class="button button-gestion button-red">Eliminar</a>
                <!--Es necesario poner el & para pasarle el id por get porqué en la ruta ya le estamos pasando parametros
                 de controller y action que estamos limpiando -->
            </td>
        </tr>
    <?php endwhile; ?>
</table>