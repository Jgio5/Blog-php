<?php

    if(isset($_POST)) {

        require_once "includes/conexion.php";

        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

        //Array di errori
        $errores = array();
        
        //Validar los datos antes de guardarlos en la base de datos

        //Validazione campo nome
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
            $nome_validado = true;
        } else {
            $nome_validado = false;
            $errores['nombre'] = "Il nome non è valido";
        }

        if(count($errores) == 0) {
            $sql = "INSERT INTO categorias VALUES(NULL, '$nombre');";
            $guardar = mysqli_query($db, $sql);
        }
    }

    header('Location: index.php');
?>