<?php

    require_once 'includes/redireccion.php';
    require_once 'includes/cabecera.php';
    require_once 'includes/lateral.php';

?>

<!-- caja principal -->
<div id="principal">
    <h1>Mis datos</h1>

    <!-- Mostra errori -->
    <?php if(isset($_SESSION['completado'])) : ?>
        <div class="alerta alerta-exito">
            <?php echo $_SESSION['completado']; ?>
        </div>
    <?php elseif(isset($_SESSION['errores']['general'])): ?>
        <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general']?>
        </div>
    <?php endif; ?>

    <form action="actualizar-usuario.php" method="POST">
        <label form="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre']; ?>" />
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

        <label form="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos']; ?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

        <label form="email">Email</label>
        <input type="email" name="email" value="<?=$_SESSION['usuario']['email']; ?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

        <input type="submit" name="submit" value="Aggiorna" />
    </form>
    <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/pie.php'; ?>