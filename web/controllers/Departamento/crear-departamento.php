<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$nombre_departamento = $data['nombre_departamento'] ?? null;
$jefe_departamento = $data['jefe_departamento'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($nombre_departamento) && isset($jefe_departamento)) {
        Database::getInstance($_SESSION['db_nombre']);

        $existe = Departamento::existeDepartamento($nombre_departamento);

        if (!$existe) {
            Departamento::crearDepartamento($nombre_departamento, $jefe_departamento);
            http_response_code(200);
            echo json_encode([
                'creado' => true,
                'mensaje' => 'Departamento añadido correctamente'
            ]);
        } else {
            http_response_code(400); 
            echo json_encode([
                'creado' => false,
                'mensaje' => 'El departamento ya existe'
            ]);
        }
    } else {
        http_response_code(400); 
        echo json_encode([
            'creado' => false,
            'mensaje' => 'Datos incompletos'
        ]);
    }
}
