<?php

    require_once 'includes/redireccion.php';
    require_once 'includes/cabecera.php';
    require_once 'includes/lateral.php';

?>

    <!-- caja principal -->
    <div id="principal">
        <h1>Crea categorias</h1>
        <p>Includi nuove categorie al blog perché gli usuari possano creare i loro post.</p>
        <br/>
        <form action="guardar-categoria.php" method="post">
            <label for="nombre">Nombre Categoria</label>
            <input type="text" name="nombre"/>
            <input type="submit" value="Salva">
        </form>
    </div>

    <?php require_once 'includes/pie.php'; ?>