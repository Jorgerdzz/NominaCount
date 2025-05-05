<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $dni = $data['dni'] ?? '';
    $numSeguridadSocial = $data['num_seguridad_social'] ?? '';
    $email = $data['email'] ?? '';

    Database::getInstance($_SESSION['db_nombre']);
    $empleados = Empleado::getEmpleados();

    $existe = false;
    foreach ($empleados as $empleado) {
        if (
            $empleado['dni'] === $dni || $empleado['num_seguridad_social'] === $numSeguridadSocial ||
            $empleado['email'] === $email
        ) {
            $existe = true;
            break;
        }
    }

    header('Content-Type: application/json');
    echo json_encode(['existe' => $existe]);
    exit;
}
