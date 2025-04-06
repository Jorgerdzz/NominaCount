<?php

    Database::getInstance($_SESSION['db_nombre']);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre_departamento = $_POST['nombre_departamento'];
        $jefe_departamento = $_POST['jefe_departamento'];
        Departamento::crearDepartamento($nombre_departamento, $jefe_departamento);
    }
    
    $page = 'empresa';

    require_once 'views/empresa.view.php';