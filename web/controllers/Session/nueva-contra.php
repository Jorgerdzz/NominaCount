<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $id_usuario = $data['id_usuario'];
    $nuevaContra = $data['contra'] ?? '';

    Usuario::cambiarContrasena($id_usuario, $nuevaContra);

    echo json_encode(['exito' => TRUE]);
    exit;
}