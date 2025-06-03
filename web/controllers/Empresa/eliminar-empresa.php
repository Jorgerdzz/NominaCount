<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $id_empresa = $data['id_empresa'] ?? '';
    $db_nombre = $data['db_nombre'] ?? '';

    try {
        Database::getInstance('sistema_empresas');

        Empresa::eliminarEmpresa($id_empresa);
        Usuario::eliminarUsuariosPorIdEmpresa($id_empresa);

        Database::eliminarDatabase($db_nombre);

        session_unset();
        session_destroy();

        echo json_encode(['success' => true]);

    } catch (Exception $e) {
        error_log("Error al eliminar empresa: " . $e->getMessage());
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit;
}
