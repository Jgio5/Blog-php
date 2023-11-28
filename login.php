<?php

//Iniziare sessione e collegare base di dati
    require_once 'includes/conexion.php';

//Raccogliere i dati del formulario
if(isset($_POST)) {

    //Elimina vecchio errore
    if(isset($_SESSION['error_login'])) {
        unset($_SESSION['error_login']);
    }

    //Raccolgo i dati del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Consulta per controllare che email e password coincidano
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        var_dump($usuario);

        //Verificare la password
        $verify = password_verify($password, $usuario['password']);

        if($verify) {
            //Utilizzo sessione per salvare i dati dell'user loggato
            $_SESSION['usuario'] = $usuario;
        } else {
            // Se fallisce, inviare una sessione con fail
            $_SESSION['error_login'] = "Login incoretto";
        }
    } else {
        //messaggio di errore
        $_SESSION['error_login'] = "Login incoretto";
    }
}

// Redirect index.php
header('Location: index.php');

?>