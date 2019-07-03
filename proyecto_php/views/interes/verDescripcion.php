<?php if(isset($interes)): ?>
    <h1><?=$interes->nombre?></h1>
    <p><?=$interes->descripcion?></p>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif ?>