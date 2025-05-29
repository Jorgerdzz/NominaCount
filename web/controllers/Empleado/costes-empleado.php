<?php

header('Content-Type: application/json');

if (isset($_GET['stats'])) {
    $id_departamento = $_GET['stats'];
    
    Database::getInstance($_SESSION['db_nombre']);

    $departamento = Departamento::getDepartamentoPorId($id_departamento);
    
    if (!$departamento) {
        http_response_code(404);
        echo json_encode(['error' => 'Departamento no encontrado']);
        exit;
    }

    $empleados = Empleado::getEmpleadosPorDepartamento($departamento['id_departamento']);
    $datosGrafico = [];
    $costeTotalDepartamento = 0;

    foreach ($empleados as $empleado) {
        $costeTotal = Empleado::getCosteTotalAcumulado($empleado['id_empleado']);
        $costeTotalDepartamento += $costeTotal;
        
        $datosGrafico[] = [
            'nombre' => $empleado['nombre'] . ' ' . $empleado['apellidos'],
            'coste_total' => (float)$costeTotal
        ];
    }

    Departamento::actualizarCosteDepartamento($departamento['id_departamento'], $costeTotalDepartamento);

    echo json_encode([
        'empleados' => $datosGrafico,
        'departamento' => [
            'nombre' => $departamento['nombre_departamento'],
            'coste_total' => $costeTotalDepartamento
        ]
    ]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Parámetro "stats" no proporcionado']);
}