<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Blog di videogiochi</title>
</head>
<body>

<!-- header -->
<header id="cabecera">
    <!-- logo -->
    <div id="logo">
        <a href="index.php">
            Blog di videogiochi
        </a>
    </div>
    <!-- menu -->
    <nav id="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <?php 
            $categorias = conseguirCategorias($db);
            if(!empty($categorias)):
            while ($categoria = mysqli_fetch_assoc($categorias)) :
        ?>
            <li>
                <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
            </li>
        <?php
            endwhile;
            endif;
        ?>
        <li><a href="index.php">Chi sono</a></li>
        <li><a href="index.php">Contatti</a></li>
    </ul>

    </nav>
</header>

<div id="contenedor">