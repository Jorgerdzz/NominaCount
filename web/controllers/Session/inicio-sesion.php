<?php

header('Content-Type: application/json');

define('db_maestra', 'sistema_empresas_');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'] ?? '';
    $contra = $data['contra'] ?? '';

    $usuarios = Usuario::getUsuarios();

    foreach ($usuarios as $usuario) {
        if ($email === $usuario['email'] && password_verify($contra, $usuario['contrasena'])) {

            $_SESSION['usuarioActivo'] = [
                'id_usuario'      => $usuario['id_usuario'],
                'id_empresa'      => $usuario['id_empresa'],
                'nombre_usuario'  => $usuario['nombre_usuario'],
                'rol'             => $usuario['rol'],
                'ceo'             => $usuario['ceo'],
                'delegado'        => $usuario['delegado'],
                'email'           => $usuario['email'],
                'contrasena'      => $usuario['contrasena'],
            ];

            $empresa = Empresa::getEmpresaPorId($usuario['id_empresa']);

            if ($empresa) {
                $_SESSION['empresaActiva'] = [
                    'id_empresa'           => $empresa['id_empresa'],
                    'cif'                  => $empresa['cif'],
                    'denominacion_social'  => $empresa['denominacion_social'],
                    'nombre_comercial'     => $empresa['nombre_comercial'],
                    'direccion'            => $empresa['direccion'],
                    'telefono'             => $empresa['telefono'],
                    'logo_path'            => $empresa['logo_path'],
                    'email'                => $empresa['email'],
                    'db_nombre'            => $empresa['db_nombre']
                ];

                $_SESSION['db_nombre'] = db_nombre(db_maestra, $empresa['nombre_comercial']);
                Database::getInstance($_SESSION['db_nombre']);

                $ruta = ($_SESSION['usuarioActivo']['rol'] === 'Empresario') ? '/empresa' : '/usuario-empleado';

                echo json_encode([
                    'exito' => true,
                    'ruta' => $ruta
                ]);
                exit;
            }
        }
    }

    echo json_encode(['exito' => false]);
    exit;
}
