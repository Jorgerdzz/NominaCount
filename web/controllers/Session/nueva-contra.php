<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $_POST['comprobarEmail'];
    $nuevaContra = $data['contra'] ?? '';

    $usuario = Usuario::getUsuarioPorEmail($email);

    Usuario::cambiarContrasena($usuario['id_usuario'], $nuevaContra);

    $existe = false;

    echo json_encode(['existe' => $existe]);
    exit;
}