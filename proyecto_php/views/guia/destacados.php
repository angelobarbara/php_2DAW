<h1>Guias aleatorias</h1>

<?php while($categoria = $categorias->fetch_object()): ?>
    <div class="product">
        <a href="<?=base_url?>guia/ver&id=<?=$categoria->id?>">
            <?php if($categoria->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$categoria->imagen?>" alt="" srcset="" />
            <?php else: ?>
                <img src="<?=base_url?>assets/img/default.jpg" alt="" srcset="" />
            <?php endif; ?>
            <h2><?=$categoria->nombre?></h2>
        </a>
    </div>
<?php endwhile; ?>