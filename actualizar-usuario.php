<?php

    if(isset($_POST)) {

        require_once "includes/conexion.php";

        //Attualizzazione
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

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

        // var_dump($errores);

        $guardar_usuario = false;

        if(count($errores) == 0) {
            //Aggiornare utenti nella base di dati
            $usuario = $_SESSION['usuario'];
            $guardar_usuario = true;

            //Controllare se l'email esiste
            $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
            $isset_email = mysqli_query($db, $sql);
            $isset_user = mysqli_fetch_assoc($isset_email);

            if($isset_user['id'] == $usuario['id'] || empty($isset_user)) {
                $sql = "UPDATE usuarios SET " .
                        "nombre = '$nombre', " . 
                        "apellidos = '$apellidos', " .
                        "email = '$email' " .
                        "WHERE id = " . $usuario['id'];

                $guardar = mysqli_query($db, $sql);


                if($guardar) {
                    $_SESSION['usuario']['nombre'] = $nombre;
                    $_SESSION['usuario']['apellidos'] = $apellidos;
                    $_SESSION['usuario']['email'] = $email;

                    $_SESSION['completado'] = "I tuoi dati si sono attualizzati correttamente";
                } else {
                    $_SESSION['errores']['general'] = "Problema nell'aggiornare i dati";
                }
            } else {
                $_SESSION['errores']['general'] = "L'utente esiste già";
            }

        } else {
            $_SESSION['errores'] = $errores;
        }
    }

    header('Location: mis-datos.php');

?>