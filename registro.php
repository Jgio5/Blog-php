<?php

    if(isset($_POST)) {

        require_once "includes/conexion.php";

        if(!isset($_SESSION)) {
            session_start();
        }

        // if(isset($_POST['nombre'])) {
        //     $nombre = $_POST['nombre'];
        // } else {
        //     $nombre = false;
        // }

        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
        // var_dump($_POST);

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

        //Validazione campo cognome
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
            $apellidos_validado = true;
        } else {
            $apellidos_validado = false;
            $errores['apellidos'] = "Il cognome non è valido";
        }

        //Validazione campo email
        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_validado = true;
        } else {
            $email_validado = false;
            $errores['email'] = "L'email non è valido";
        }

        //Validazione campo password
        if(!empty($password)) {
            $password_validado = true;
        } else {
            $password_validado = false;
            $errores['password'] = "La password è vuota";
        }

        // var_dump($errores);

        $guardar_usuario = false;

        if(count($errores) == 0) {
            //Inserisci utenti nella base di dati
            $guardar_usuario = true;

            //Cifrare la password
            $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

            // var_dump($password);
            // var_dump($password_segura);
            // var_dump(password_verify($password, $password_segura));
            // die();

            $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
            $guardar = mysqli_query($db, $sql);

            if($guardar) {
                $_SESSION['completado'] = "Registrazione avvenuta correttamente";
            } else {
                $_SESSION['errores']['general'] = "Problema nella registrazione";
            }

        } else {
            $_SESSION['errores'] = $errores;
        }
    }

    header('Location: index.php');

?>