<!-- barra lateral -->
<aside id="sidebar">

    <div id="buscadpr" class="bloque">
        <h3>Buscar</h3>

        <form action="buscar.php" method="POST">
        <input type="text" name="busqueda" />
        <input type="submit" value="Buscar" />
        </form>
    </div>

    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Benvenuto <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>
            <!-- Bottoni -->
            <a href="crear-entradas.php" class="boton boton-verde">Crea post</a>
            <a href="crear-categoria.php" class="boton">Crea categoria</a>
            <a href="mis-datos.php" class="boton boton-naranja">I miei dati</a>
            <a href="cerrar.php" class="boton boton-rojo">Chiudi sessione</a>
        </div>
    <?php endif; ?>

    <?php if(!isset($_SESSION['usuario'])): ?>
        <div id="login" class="bloque">
            <h3>Identificate</h3>

            <?php if(isset($_SESSION['error_login'])): ?>
                <div class="alerta alerta-error">
                    <?= $_SESSION['error_login'] ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <label form="email">Email</label>
                <input type="email" name="email" />
                <label form="password">Password</label>
                <input type="password" name="password" />
                <input type="submit" value="Entra" />
            </form>
        </div>

        <div id="register" class="bloque">

            <!-- Mostra errori -->
            <?php if(isset($_SESSION['completado'])) : ?>
                <div class="alerta alerta-exito">
                    <?php echo $_SESSION['completado']; ?>
                </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-error">
                    <?php $_SESSION['errores']['general']?>
                </div>
            <?php endif; ?>

            <h3>Registrate</h3>
            <form action="registro.php" method="POST">
                <label form="nombre">Nombre</label>
                <input type="text" name="nombre" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <label form="apellidos">Apellidos</label>
                <input type="text" name="apellidos" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                <label form="email">Email</label>
                <input type="email" name="email" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                <label form="password">Password</label>
                <input type="password" name="password" />
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>
                <input type="submit" name="submit" value="Registrar" />
            </form>
            <?php borrarErrores(); ?>
        </div>
    <?php endif; ?>
</aside>