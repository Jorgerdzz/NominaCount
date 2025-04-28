<?php


header('Content-Type: application/json');

$id_empleado = $_GET['id_empleado'] ?? null;
$anio = $_GET['anio'] ?? date('Y');

if ($id_empleado) {
    $costesPorMes = Empleado::getCostesAgrupadosPorMes($id_empleado, $anio);
    echo json_encode([
        'success' => true,
        'data' => $costesPorMes
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'ID de empleado no proporcionado'
    ]);
}