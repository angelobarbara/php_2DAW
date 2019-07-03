<?php if(isset($pro)): ?>
        <h1><?=$pro->nombre?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if($pro->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="" srcset="" />
            <?php else: ?>
                <img src="<?=base_url?>assets/img/default.jpg" alt="" srcset="" />
            <?php endif; ?>
        </div>
        <div class="data">
            <h2><?=$pro->nombre?></h2>
            <p class="description"><?=$pro->precio?></p>
            <p class="description"><?=$pro->descripcion?></p>
            <a href="<?=base_url?>ruta/verDescripcion&id=<?=$pro->id?>" class="button">Ver descripcion</a>
            <a href="<?=base_url?>ruta/verDescripcion&id=<?=$pro->id?>" class="button">Ver recorrido</a>
        </div>
    </div>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif ?>