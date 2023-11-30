<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>

<?php
    $entrada_actual = conseguirEntrada($db, $_GET['id']);
    if(!isset($entrada_actual['id'])) {
        header('Location: index.php');
    } 
?>

<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- caja principal -->
<div id="principal">
    <h1><?=$entrada_actual['titulo']?></h1>
    <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
        <h2><?=$entrada_actual['categoria']?></h2>
    </a>
    <h4><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario']?></h4>
    <p>
        <?=$entrada_actual['descripcion']?>
    </p>

    <?php if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) :?>
        <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-verde">Modifica post</a>
        <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton">Elimina post</a>
    <?php endif; ?>
</div>

<?php require_once 'includes/pie.php'; ?>