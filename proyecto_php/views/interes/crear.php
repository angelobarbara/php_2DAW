<?php if(isset($edit) && isset($interes) && is_object($interes)): ?>
    <h1>Editar punto de interes: <?=$interes->nombre?></h1>
    <?php
    $url_action = base_url.'interes/save&id='.$interes->id;
    ?>
<?php else: ?>
    <h1>Crear punto de interes</h1>
    <?php
    $url_action = base_url.'interes/save';
    ?>
<?php endif ?>

<div class="form_container">
    <form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($interes) && is_object($interes) ? $interes->nombre : ''?>">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"><?=isset($interes) && is_object($interes) ? $interes->descripcion : ''?></textarea>

        <label for="ruta">Ruta</label>
        <?php $rutas = Utils::showRutas() ?>
        <select name="ruta">
            <?php while ($cat = $rutas->fetch_object()): ?>
                <option value="<?= $cat->id; ?>" <?=isset($interes) && is_object($interes) && $cat->id == $interes->ruta_id? 'selected' : ''?>>
                    <?= $cat->nombre; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <label for="imagen">Imagen</label>
        <?php if(isset($interes) && is_object($interes) && !empty($interes->imagen)): ?>
            <img src="<?=base_url.'uploads/images/'.$interes->imagen?>" class="thumb">
        <?php endif; ?>
        <input type="file" name="imagen">

        <input type="submit" value="Guardar">
    </form>
</div>