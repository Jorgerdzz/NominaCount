<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$idDepartamento = $data['id_departamento'] ?? null;

try {
    Database::getInstance($_SESSION['db_nombre']);
    $resultado = Departamento::eliminarDepartamento($idDepartamento);
    
    http_response_code(200);
    echo json_encode(['message' => 'Departamento eliminado']);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

