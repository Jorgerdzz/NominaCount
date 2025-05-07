<?php

if (isset($_GET['stats'])) {
    $nombre_departamento = $_GET['stats'];

    Database::getInstance($_SESSION['db_nombre']);

    $meses = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    ];

    $estadisticas = Departamento::getEstadisticasDepartamento($nombre_departamento);
    
} 

$page = 'estadisticas';
require_once 'views/estadisticas.view.php'; 