<?php

Database::getInstance($_SESSION['db_nombre']);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['fecha_inicio']) || !isset($data['fecha_fin'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Faltan parámetros']);
        exit;
    }

    $empleado = Empleado::getEmpleadoPorEmail($_SESSION['usuarioActivo']['email']);
    if (!$empleado) {
        http_response_code(401);
        echo json_encode(['error' => 'Empleado no autenticado']);
        exit;
    }

    $id_empleado = $empleado['id_empleado'];
    $fecha_inicio = $data['fecha_inicio'];
    $fecha_fin = $data['fecha_fin'];

    // Aquí llamamos a tu función de inserción
    Vacaciones::solicitarDiasVacaciones($id_empleado, $fecha_inicio, $fecha_fin);

    echo json_encode(['mensaje' => 'Solicitud enviada. Esperando aprobación.']);
    exit;
}

http_response_code(405);
echo json_encode(['error' => 'Método no permitido']);