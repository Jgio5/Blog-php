<?php

    if(isset($_POST)) {

        require_once "includes/conexion.php";

        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
        $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
        $usuario = $_SESSION['usuario']['id'];

        //Array di errori
        $errores = array();
        
        //Validar los datos antes de guardarlos en la base de datos

        //Validazione campo nome
        if(empty($titulo)) {
            $errores['titulo'] = "Il titolo non è valido";
        }

        if(empty($descripcion)) {
            $errores['descripcion'] = "La descrizione non è valida";
        }

        if(empty($categoria) && !is_numeric($categoria)) {
            $errores['categoria'] = "La categoria non è valida";
        }

        // var_dump($errores);
        // die();

        if(count($errores) == 0) {
            $sql = "INSERT INTO entradas VALUES(NULL, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
            $guardar = mysqli_query($db, $sql);

            header('Location: index.php');

        } else {
            $_SESSION['errores_entrada'] = $errores;
            header('Location: crear-entradas.php');
        }
    }
?>