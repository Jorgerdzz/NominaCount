<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $nombre = $data['nombre'] ?? '';
    $apellidos = $data['apellidos'] ?? '';
    $dni = $data['dni'] ?? '';
    $email_ceo = $data['email_ceo'] ?? '';
    $contra = $data['contra'] ?? '';

    $num_seguridad_social = $data['num_seguridad_social'] ?? '';
    $telefono_ceo = $data['telefono_ceo'] ?? '';
    $fecha_incorporacion = $data['fecha_incorporacion'] ?? '';
    $categoria_profesional = $data['categoria_profesional'] ?? '';
    $num_hijos = $data['num_hijos'] ?? '';
    $estado_civil = $data['estado_civil'] ?? '';
    $fecha_nacimiento = $data['fecha_nacimiento'] ?? '';
    $minusvalia = $data['minusvalia'] ?? '';
    $salario_base = $data['salario_base'] ?? '';

    $cif = $data['cif'] ?? '';

    $nombre_usuario = $nombre . " " .  $apellidos;

    Database::getInstance('sistema_empresas');

    $empresa = Empresa::getEmpresaPorCIF($cif);
    Usuario::crearUsuario($empresa['id_empresa'], $nombre_usuario, 'Empresario', TRUE, TRUE, $email_ceo, $contra);

    Database::getInstance($empresa['db_nombre']);

    Empleado::darAltaEmpleado(
                    NULL,
                    $nombre,
                    $apellidos,
                    $dni,
                    $num_seguridad_social,
                    $email_ceo,
                    $telefono_ceo,
                    $fecha_incorporacion,
                    $fecha_nacimiento,
                    $categoria_profesional,
                    $minusvalia,
                    (int)$num_hijos,
                    $estado_civil,
                    (float)$salario_base
                );

    echo json_encode(['exito' => TRUE]);

    exit;
}