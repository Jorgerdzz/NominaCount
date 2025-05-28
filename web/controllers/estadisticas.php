<?php

if (isset($_GET['stats'])) {
    $nombre_departamento = $_GET['stats'];

    Database::getInstance($_SESSION['db_nombre']);

    $meses = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    ];

    // Obtenemos las estadísticas generales del departamento
    $estadisticas = Departamento::getEstadisticasDepartamento($nombre_departamento);
    
    // Obtenemos las estadísticas mensuales (puedes pasar un año específico si lo necesitas)
    $estadisticas_mensuales = Departamento::getEstadisticasDepartamentoPorMes($nombre_departamento, date('Y'));
    
    // Si quieres incluir el nombre del mes en los datos para facilitar la visualización
    if ($estadisticas_mensuales && isset($estadisticas_mensuales['datos_mensuales'])) {
        foreach ($estadisticas_mensuales['datos_mensuales'] as $mesNum => $datos) {
            $estadisticas_mensuales['datos_mensuales'][$mesNum]['nombre_mes'] = $meses[$mesNum];
            $estadisticas_mensuales['datos_mensuales'][$mesNum]['mes_numero'] = $mesNum;
        }
    }
} 

$page = 'estadisticas';
require_once 'views/estadisticas.view.php';