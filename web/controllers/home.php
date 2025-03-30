<?php

    require 'models/Database.php';
    require 'Core/funciones.php';

    define('db_maestra', 'sistema_empresas_');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        var_dump($_POST);
        $cif = $_POST['cif'];
        var_dump($_POST['telefono']);
        $denominacion_social = $_POST['denominacion_social'];
        $nombre_comercial = $_POST['nombre_comercial'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $persona = $_POST['persona'];
        $email = $_POST['email'];
        $contra = $_POST['contra'];

        if(validarCredenciales($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono,
        $persona, $email, $contra)){
            $db_nombre = db_nombre(db_maestra, $nombre_comercial);
            Database::crearEmpresa($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono,
            $email, $db_nombre);
            header('Location: /');
        }

        $empresas = Database::empresas();

        
    }

    require 'views/home.view.php';