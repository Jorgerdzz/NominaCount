<?php

define('contrasena', 'P@ssw0rd'); //contraseña por defecto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'delegar_usuario') {
        $nombre_usuario = $_POST['delegar_nombre_usuario'];
        $email_usuario = $_POST['delegar_email'];

        Database::getInstance('sistema_empresas');

        Usuario::crearUsuario($_SESSION['empresaActiva']['id_empresa'], $nombre_usuario, 'Empresario', FALSE, $email_usuario, contrasena);

        Database::getInstance($_SESSION['db_nombre']);

        header('Location: /empresa');
    }
}
