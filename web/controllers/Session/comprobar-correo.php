<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'] ?? '';

    $usuarios = Usuario::getUsuarios();

    $existe = false;
    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email) {
            $id_usuario = $usuario['id_usuario'];
            $existe = true;
            break;
        }
    }

    echo json_encode([
        'existe' => $existe,
        'id_usuario' => $id_usuario,
    ]);
    exit;
}
