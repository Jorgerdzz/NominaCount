<?php

header('Content-Type: application/json');

if (isset($_GET['stats'])) {
    $nombre_departamento = $_GET['stats'];
    
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
        $costeTotal = Empleado::getCosteTotalAcumulado($empleado['id_empleado']);
        
        $datosGrafico[] = [
            'nombre' => $empleado['nombre'] . ' ' . $empleado['apellidos'],
            'coste_total' => (float)$costeTotal
        ];
    }

    echo json_encode($datosGrafico);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Parámetro "stats" no proporcionado']);
}