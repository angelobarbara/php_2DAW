<h1>Gestion de guias</h1>

<a href="<?=base_url?>guia/crear" class="button button-small">Crear guia</a>

<?php if(isset($_SESSION['guia']) && $_SESSION['guia'] == 'complete'): ?>
    <strong class="alert_green">Guia creada correctamente</strong>
<?php elseif(isset($_SESSION['guia']) && $_SESSION['guia'] != 'complete'): ?>
    <strong class="alert_red">La guia no se ha añadido</strong>
<?php endif; ?>
<?php Utils::delete_session('guia') ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">Guia eliminada correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">La guia no se ha podido eliminar</strong>
<?php endif; ?>

<?php Utils::delete_session('delete') ?>

<table>
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>imagen</th>
    </tr>
    <?php while($cat = $categorias->fetch_object()): ?>
        <tr>
            <th><?=$cat->id; ?></th>
            <th><?=$cat->nombre; ?></th>
            <th class="gestion">
                <?php if($cat->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$cat->imagen?>" alt="" srcset="" class="imagen-gestion" />
                <?php else: ?>
                    <img src="<?=base_url?>assets/img/default.jpg" alt="" srcset="" class="imagen-gestion" />
                <?php endif; ?>
            </th>
            <td>
                <a href="<?=base_url?>guia/editar&id=<?=$cat->id?>" class="button button-gestion">Editar</a>
                <a href="<?=base_url ?>guia/eliminar&id=<?=$cat->id?>" class="button button-gestion button-red">Eliminar</a>
                <!--Es necesario poner el & para pasarle el id por get porqué en la ruta ya le estamos pasando parametros
                 de controller y action que estamos limpiando -->
            </td>
        </tr>
    <?php endwhile; ?>
</table>