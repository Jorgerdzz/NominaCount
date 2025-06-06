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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    Usuario::modificarUsuario(
        $id_empresa,
        $id_usuario,
        $_POST['editar-nombre-usuario'],
        $_POST['editar-email-usuario'],
        $_POST['editar-cif'],
        $_POST['editar-denominacion-social'],
        $_POST['editar-nombre-comercial'],
        $_POST['editar-direccion'],
        $_POST['editar-telefono']
    );

    $_SESSION['empresaActiva']['cif'] = $_POST['editar-cif'];
    $_SESSION['empresaActiva']['denominacion_social'] = $_POST['editar-denominacion-social'];
    $_SESSION['empresaActiva']['nombre_comercial'] = $_POST['editar-nombre-comercial'];
    $_SESSION['empresaActiva']['direccion'] = $_POST['editar-direccion'];
    $_SESSION['empresaActiva']['telefono'] =  $_POST['editar-telefono'];

    $_SESSION['usuarioActivo']['nombre_usuario'] = $_POST['editar-nombre-usuario'];
    $_SESSION['usuarioActivo']['email'] = $_POST['editar-email-usuario'];

    header("Location: /mi-cuenta");
}



$page = 'mi-cuenta';
require 'views/Session/mi-cuenta.view.php';
