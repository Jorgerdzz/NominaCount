<?php

header('Content-Type: application/json');

define('db_maestra', 'sistema_empresas_');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cif = $_POST['cif'] ?? '';
    $denominacion_social = $_POST['denominacion_social'] ?? '';
    $nombre_comercial = $_POST['nombre_comercial'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $correo_empresa = $_POST['correo_empresa'] ?? '';

    $logo_path = '';

    $existe = false; 

    if (validarCredenciales(
        $cif,
        $denominacion_social,
        $nombre_comercial,
        $direccion,
        $telefono,
        $correo_empresa
    )) {
        $db_nombre = db_nombre(db_maestra, $nombre_comercial);
        $existe = existeEmpresa($cif, $denominacion_social);
        if (!$existe) {

            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/views/img/logos/';
                
                $nombre_empresa_sanitizado = preg_replace('/[^a-zA-Z0-9_]/', '_', strtolower($nombre_comercial));
                $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $filename = 'logo_' . $nombre_empresa_sanitizado . '.' . $extension;
                $uploadPath = $uploadDir . $filename;
                
                if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath)) {
                    $logo_path = 'views/img/logos/' . $filename;
                }
            }

            Empresa::crearEmpresa(
                $cif,
                $denominacion_social,
                $nombre_comercial,
                $direccion,
                $telefono,
                $logo_path,
                $correo_empresa,
                $db_nombre
            );
        }
    }

    echo json_encode([
        'existe' => $existe,
        'cif' => $cif
    ]);

    exit;
}