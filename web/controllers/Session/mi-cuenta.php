<?php
    
    $empresa = Empresa::getEmpresaPorEmail($_SESSION['usuarioActivo']['email']);

    $cif = $empresa['cif'];
    $denominacion_social = $empresa['denominacion_social'];
    $nombre_comercial = $empresa['nombre_comercial'];
    $direccion = $empresa['direccion'];
    $telefono = $empresa['telefono'];


    $nombre = $_SESSION['usuarioActivo']['nombre_usuario'];
    $email = $_SESSION['usuarioActivo']['email'];
    $contrasena = $_SESSION['usuarioActivo']['contrasena'];


    $page = 'mi-cuenta';
    require 'views/Session/mi-cuenta.view.php';

