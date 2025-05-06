<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$id_empleado = $data['id_empleado'] ?? null;
$email_empleado = $data['email'] ?? null;

try {

    Database::getInstance($_SESSION['db_nombre']);
    $resultado = Empleado::darBajaEmpleado($id_empleado);

    Database::getInstance('sistema_empresas'); 
    $usuario = Usuario::getUsuarioPorEmail($email_empleado);
    Usuario::eliminarUsuario($usuario['id_usuario']);

    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Empleado eliminado correctamente'
    ]);
    
} catch (Exception $e) {
    http_response_code($e->getCode() >= 400 ? $e->getCode() : 500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
