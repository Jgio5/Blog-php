<?php require_once 'includes/cabecera.php'; ?>
    
        <?php require_once 'includes/lateral.php'; ?>

        <!-- caja principal -->
        <div id="principal">
            <h1>Ultimas entradas</h1>

            <?php
                $entradas = conseguirUltimasEntradas($db);
                if(!empty($entradas)):
                    while($entrada = mysqli_fetch_assoc($entradas)) :
            ?>
            <article class="entradas">
                <?php //var_dump($entrada); ?>
                <h2><?=$entrada['titulo'];?></h2>
                <span class="fecha" ><?=$entrada['categoria'] . ' | ' . $entrada['fecha']; ?></span>
                <p>
                    <?=substr($entrada['descripcion'], 0, 180). "...";?>
                </p>
            </article>
            <?php
                endwhile;
                endif;
            ?>

            <div id="ver-todas">
                <a href="">Ver todas las entradas</a>
            </div>
        </div>

    <?php require_once 'includes/pie.php'; ?>

</body>
</html>