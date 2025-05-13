<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'] ?? '';

    $usuarios = Usuario::getUsuarios();

    $existe = false;
    foreach ($usuarios as $usuario) {
        if ($usuario['email'] === $email) {
            $existe = true;
            break;
        }
    }

    echo json_encode(['existe' => $existe]);
    exit;
}