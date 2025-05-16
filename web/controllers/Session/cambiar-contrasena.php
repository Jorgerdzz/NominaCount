<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $id_usuario = $_SESSION['usuarioActivo']['id_usuario'];
    $contrasena = $_SESSION['usuarioActivo']['contrasena'];

    $contra_actual = $data['contra_actual'] ?? '';
    $nueva_contra = $data['nueva_contra'] ?? '';
    $confirmar_contra = $data['confirmar_contra'] ?? '';

    Database::getInstance($_SESSION['db_nombre']);
    $empleados = Empleado::getEmpleados();

    if(password_verify($contra_actual, $contrasena) && $nueva_contra == $confirmar_contra){
        Usuario::cambiarContrasena($id_usuario, $nueva_contra);
        echo json_encode(['exito' => TRUE]);
        exit;
    }

    echo json_encode(['exito' => FALSE]);
    exit;
}
