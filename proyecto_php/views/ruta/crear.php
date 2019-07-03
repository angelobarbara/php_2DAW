<?php if(isset($edit) && isset($ruta) && is_object($ruta)): ?>
    <h1>Editar ruta: <?=$ruta->nombre?></h1>
    <?php
        $url_action = base_url.'ruta/save&id='.$ruta->id;
    ?>
<?php else: ?>
    <h1>Crear rutas</h1>
    <?php
        $url_action = base_url.'ruta/save';
    ?>
<?php endif ?>

<div class="form_container">
    <form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($ruta) && is_object($ruta) ? $ruta->nombre : ''?>">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"><?=isset($ruta) && is_object($ruta) ? $ruta->descripcion : ''?></textarea>

        <label for="categoria">Guia</label>
        <?php $rutas = Utils::showCategorias() ?>
        <select name="guia">
            <?php while ($cat = $rutas->fetch_object()): ?>
                <option value="<?= $cat->id; ?>" <?=isset($ruta) && is_object($ruta) && $cat->id == $ruta->guia_id? 'selected' : ''?>>
                    <?= $cat->nombre; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="recorrido">Recorrido</label>
        <textarea name="recorrido"><?=isset($ruta) && is_object($ruta) ? $ruta->recorrido : ''?></textarea>

        <label for="imagen">Imagen</label>
        <?php if(isset($ruta) && is_object($ruta) && !empty($ruta->imagen)): ?>
            <img src="<?=base_url.'uploads/images/'.$ruta->imagen?>" class="thumb">
        <?php endif; ?>
        <input type="file" name="imagen">

        <input type="submit" value="Guardar">
    </form>
</div>