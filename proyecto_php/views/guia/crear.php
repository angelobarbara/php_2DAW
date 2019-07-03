<?php if(isset($edit) && isset($categoria) && is_object($categoria)): ?>
    <h1>Editar producto: <?=$categoria->nombre?></h1>
    <?php
        $url_action = base_url.'guia/save&id='.$categoria->id;
    ?>
<?php else: ?>
    <h1>Crear guia</h1>
    <?php
        $url_action = base_url.'guia/save';
    ?>
<?php endif ?>

<div class="form_container">
    <form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=isset($categoria) && is_object($categoria) ? $categoria->nombre : ''?>">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"><?=isset($categoria) && is_object($categoria) ? $categoria->descripcion : ''?></textarea>

        <label for="imagen">Imagen</label>
        <?php if(isset($categoria) && is_object($categoria) && !empty($categoria->imagen)): ?>
            <img src="<?=base_url.'uploads/images/'.$categoria->imagen?>" class="thumb">
        <?php endif; ?>
        <input type="file" name="imagen">

        <input type="submit" value="Guardar">
    </form>
</div>