<?php

if (isset($_GET['stats'])) {
    $nombre_departamento = $_GET['stats'];
} 

$page = 'estadisticas';
require_once 'views/estadisticas.view.php'; 