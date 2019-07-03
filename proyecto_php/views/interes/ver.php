<?php if(isset($ruta)): ?>
    <h1>Puntos de interes: <?=$ruta->nombre?></h1>
    <?php if($interes->num_rows == 0): ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>
        <?php while($puntos = $interes->fetch_object()): ?>
            <div class="product">
                    <?php if($puntos->imagen != null): ?>
                        <img src="<?=base_url?>uploads/images/<?=$puntos->imagen?>" alt="" srcset="" />
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/default.jpg" alt="" srcset="" />
                    <?php endif; ?>
                    <h2><?=$puntos->nombre?></h2>
                <!--<p><?=$puntos->descripcion?></p>-->
                <a href="<?=base_url?>interes/verDescripcion&id=<?=$puntos->id?>" class="button">Ver descripcion</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif ?>