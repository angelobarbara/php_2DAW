<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong>Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong>Registro fallido! Introduzca bien los datos</strong>
<?php endif; ?>
<?php Utils::delete_session('register');?>

<form action="<?=base_url;?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="" required>
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" id="">
    <label for="email">Email</label>
    <input type="email" name="email" id="">
    <label for="password">Password</label>
    <input type="password" name="password" id="">
    <input type="submit" value="Registrar">
</form>