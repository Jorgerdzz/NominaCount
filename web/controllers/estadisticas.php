<?php

if (isset($_GET['departamento'])) {
    $nombre_departamento = $_GET['departamento']; 
} 

$page = 'estadisticas';
require_once 'views/estadisticas.view.php'; 