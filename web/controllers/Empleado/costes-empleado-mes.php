<?php

header('Content-Type: application/json');

$nombre_departamento = $_GET['stats'];
$anio = $_GET['anio'];

Database::getInstance($_SESSION['db_nombre']);

$departamento = Departamento::getDepartamentoPorNombre($nombre_departamento);

if (!$departamento) {
    http_response_code(404);
    echo json_encode(['error' => 'Departamento no encontrado']);
    exit;
}

$empleados = Empleado::getEmpleadosPorDepartamento($departamento['id_departamento']);
$datosGrafico = [];

foreach ($empleados as $empleado) {
    $costesMensuales = Empleado::getCostesAgrupadosPorMes($empleado['id_empleado'], $anio);
    
    $datosGrafico[] = [
        'id_empleado' => $empleado['id_empleado'],
        'nombre' => $empleado['nombre'] . ' ' . $empleado['apellidos'],
        'costes_mensuales' => $costesMensuales
    ];
}

echo json_encode([
    'departamento' => $departamento,
    'anio' => $anio,
    'empleados' => $datosGrafico
]);