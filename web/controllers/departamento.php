<?php

    require_once 'models/Database.php';
    require_once 'models/Departamento.php';

    if (isset($_GET['departamento'])) {
        var_dump($_GET['departamento']);
        $nombre_departamento = $_GET['departamento'];
        var_dump($nombre_departamento);
        
        Database::getInstance($_SESSION['db_nombre']);
        $departamento = Departamento::getDepartamentoPorNombre($nombre_departamento);

        require 'views/departamento.view.php';

    }

$page = 'departamento';

    