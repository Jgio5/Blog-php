<?php

    require_once 'includes/redireccion.php';
    require_once 'includes/cabecera.php';
    require_once 'includes/lateral.php';

?>

    <!-- caja principal -->
    <div id="principal">
        <h1>Crea entradas</h1>
        <p>Includi nuove entradas al blog perché gli usuari possano leggere e godere del nostro contenuto.</p>
        <br/>
        <form action="guardar-entrada.php" method="post">
            <label for="titulo">Nombre entrada</label>
            <input type="text" name="titulo"/>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
            <label for="descripcion">Descripcion:</label>
            <textarea type="text" name="descripcion"></textarea>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
            <label for="categoria">Categoria</label>
            <select name="categoria">
                <?php 
                    $categorias = conseguirCategorias($db);
                    if(!empty($categorias)) :
                    while($categoria = mysqli_fetch_assoc($categorias)) :
                ?>
                    <option value="<?= $categoria['id']?>">
                        <?= $categoria['nombre']?>
                    </option>
                <?php 
                    endwhile;
                    endif;
                ?>
            </select>
            <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>
            <input type="submit" value="Salva">
        </form>
        <?php borrarErrores(); ?>
    </div>

    <?php require_once 'includes/pie.php'; ?>