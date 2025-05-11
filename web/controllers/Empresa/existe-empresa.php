<?php

header('Content-Type: application/json');

define('db_maestra', 'sistema_empresas_');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $cif = $data['cif'] ?? '';
    $denominacion_social = $data['denominacion_social'] ?? '';
    $nombre_comercial = $data['nombre_comercial'] ?? '';
    $direccion = $data['direccion'] ?? '';
    $telefono = $data['telefono'] ?? '';
    $persona = $data['persona'] ?? '';
    $email = $data['email'] ?? '';
    $contra = $data['contra'] ?? '';

    if (validarCredenciales(
        $cif,
        $denominacion_social,
        $nombre_comercial,
        $direccion,
        $telefono,
        $persona,
        $email,
        $contra
    )) {
        $db_nombre = db_nombre(db_maestra, $nombre_comercial);
        $existe = existeEmpresa($cif, $denominacion_social);
        if (!$existe) {
            Empresa::crearEmpresa(
                $cif,
                $denominacion_social,
                $nombre_comercial,
                $direccion,
                $telefono,
                $email,
                $db_nombre
            );
            $empresa = Empresa::getEmpresaPorEmail($email);
            Usuario::crearUsuario($empresa['id_empresa'], $persona, 'Empresario', TRUE, $email, $contra);
        }
    }

    echo json_encode(['existe' => $existe]);

    exit;
}