<?php

Database::getInstance($_SESSION['db_nombre']);

header('Content-Type: application/json');

if (!isset($_SESSION['usuarioActivo'])) {
    echo json_encode([]);
    exit;
}

$empleado = Empleado::getEmpleadoPorEmail($_SESSION['usuarioActivo']['email']);
$id_empleado = $empleado['id_empleado'];
$vacaciones = Vacaciones::getVacacionesPorIdEmpleado($id_empleado);

$eventos = array_map(function ($v) {
    return [
        'id' => $v['id_vacacion'],
        'start' => $v['fecha_inicio'],
        'end' => date('Y-m-d', strtotime($v['fecha_fin'] . ' +1 day')),
        'display' => 'background',
        'estado' => $v['estado']
    ];
}, $vacaciones);

echo json_encode($eventos);
exit;
