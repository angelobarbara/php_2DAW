<?php if(isset($rutas)): ?>
    <h1><?=$rutas->nombre?></h1>
    <p><?=$rutas->recorrido?></p>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif ?>