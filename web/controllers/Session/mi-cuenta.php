<?php

    $db_nombre = 'sistema_empresas';
    Database::getInstance($db_nombre);

    $id_empresa = $_SESSION['empresaActiva']['id_empresa'];
    $cif = $_SESSION['empresaActiva']['cif'];
    $denominacion_social = $_SESSION['empresaActiva']['denominacion_social'];
    $nombre_comercial = $_SESSION['empresaActiva']['nombre_comercial'];
    $direccion = $_SESSION['empresaActiva']['direccion'];
    $telefono = $_SESSION['empresaActiva']['telefono'];

    $id_usuario = $_SESSION['usuarioActivo']['id_usuario'];
    $nombre = $_SESSION['usuarioActivo']['nombre_usuario'];
    $email = $_SESSION['usuarioActivo']['email'];
    $contrasena = $_SESSION['usuarioActivo']['contrasena'];

    if(isset($_POST['editar-cif']) &&
    isset($_POST['editar-denominacion-social']) &&
    isset($_POST['editar-nombre-comercial']) &&
    isset($_POST['editar-direccion']) &&
    isset($_POST['editar-telefono']) &&
    isset($_POST['editar-nombre-usuario']) &&
    isset($_POST['editar-email-usuario']))
    {
        Usuario::modificarUsuario($id_empresa, $id_usuario, $nombre, $email, $cif, $denominacion_social, 
        $nombre_comercial, $direccion, $telefono, $db_nombre);

        header("Location: /mi-cuenta");

    }


    $page = 'mi-cuenta';
    require 'views/Session/mi-cuenta.view.php';

