<?php

Database::getInstance($_SESSION['db_nombre']);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $termino = $_GET['termino'] ?? '';

    $empleados = Empleado::getEmpleados();
    $resultados = [];

    foreach ($empleados as $empleado) {
        $nombreCompleto = strtolower($empleado['nombre'] . ' ' . $empleado['apellidos']);
        if (strpos($nombreCompleto, strtolower($termino)) !== false) {
            $resultados[] = [
                'id_empleado' => $empleado['id_empleado'],
                'nombre' => $empleado['nombre'],
                'apellidos' => $empleado['apellidos']
            ];
        }
    }

    echo json_encode($resultados);
}