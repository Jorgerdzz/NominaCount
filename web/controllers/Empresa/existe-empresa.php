<?php

header('Content-Type: application/json');

define('db_maestra', 'sistema_empresas_');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cif = $_POST['cif'] ?? '';
    $denominacion_social = $_POST['denominacion_social'] ?? '';
    $nombre_comercial = $_POST['nombre_comercial'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $persona = $_POST['persona'] ?? '';
    $email = $_POST['email'] ?? '';
    $contra = $_POST['contra'] ?? '';

    $logo_path = '';

    $existe = false; 

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
            
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/views/img/logos/';
                
                // Generar nombre único para el archivo
                $extension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
                $filename = uniqid('logo_') . '.' . $extension;
                $uploadPath = $uploadDir . $filename;
                
                // Mover el archivo subido
                if (move_uploaded_file($_FILES['logo']['tmp_name'], $uploadPath)) {
                    // Guardar la ruta relativa para la base de datos
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