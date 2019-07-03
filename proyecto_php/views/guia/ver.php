<?php if(isset($_SESSION['download']) && $_SESSION['download'] == 'complete'): ?>
    <strong class="alert_green">Archivo descargato con exito</strong>
<?php elseif(isset($_SESSION['download']) && $_SESSION['download'] != 'complete'): ?>
    <strong class="alert_red">No se pudo descargar el archivo</strong>
<?php endif; ?>
<?php Utils::delete_session('download') ?>

<?php if(isset($categoria)): ?>
    <h1>Rutas de <?=$categoria->nombre?></h1>
    <?php if($productos->num_rows == 0): ?>
        <p>No hay productos para mostrar</p>
    <?php else: ?>
        <?php while($product = $productos->fetch_object()): ?>
            <div class="product">
                <a href="<?=base_url?>interes/ver&id=<?=$product->id?>">
                    <?php if($product->imagen != null): ?>
                        <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="" srcset="" />
                    <?php else: ?>
                        <img src="<?=base_url?>assets/img/default.jpg" alt="" srcset="" />
                    <?php endif; ?>
                    <h2><?=$product->nombre?></h2>
                </a>
                <!--<p><?=$product->descripcion?></p>-->
                <a href="<?=base_url?>ruta/verDescripcion&id=<?=$product->id?>" class="button">Ver descripcion</a>
                <a href="<?=base_url?>ruta/verRecorrido&id=<?=$product->id?>" class="button recorrido">Ver recorrido</a>
                <a href="<?=base_url?>ruta/descargarRecorrido&id=<?=$product->id?>&guia=<?=$categoria->id?>" class="button recorrido">Descargar recorrido</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif ?>