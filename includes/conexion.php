<?php

    //connessione DB

    $servidor = 'localhost';
    $usuario = 'administrador';
    $password = 'administrador';
    $basededatos = "blog_master";
    $db = mysqli_connect($servidor, $usuario, $password, $basededatos);

    mysqli_query($db, "SET NAMES 'utf8'");

    //Inizia la sessione

    if(!isset($_SESSION)) {
        session_start();
    }
?>