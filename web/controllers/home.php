<?php

define('db_maestra', 'sistema_empresas_');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['emailInicioSesion']) && isset($_POST['contraInicioSesion'])) {
        $emailInicioSesion = $_POST['emailInicioSesion'];
        $contraInicioSesion = $_POST['contraInicioSesion'];
        iniciarSesion($emailInicioSesion, $contraInicioSesion);
    } else {
        var_dump($_POST);
        $cif = $_POST['cif'];
        $denominacion_social = $_POST['denominacion_social'];
        $nombre_comercial = $_POST['nombre_comercial'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $persona = $_POST['persona'];
        $email = $_POST['email'];
        $contra = $_POST['contra'];
        registro($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $persona, $email, $contra);
        header('Location: /');
    }
}

function iniciarSesion($email, $contra)
{
    $usuarios = Usuario::getUsuarios();

    foreach ($usuarios as $usuario) {
        if ($email === $usuario['email'] && password_verify($contra, $usuario['contrasena'])) {

            $_SESSION['usuarioActivo'] = [
                'id_usuario'      => $usuario['id_usuario'],
                'id_empresa'      => $usuario['id_empresa'],
                'nombre_usuario'  => $usuario['nombre_usuario'],
                'rol'             => $usuario['rol'],
                'ceo'             => $usuario['ceo'],
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
                    'email'                => $empresa['email'],
                    'db_nombre'            => $empresa['db_nombre']
                ];

                $_SESSION['db_nombre'] = db_nombre(db_maestra, $empresa['nombre_comercial']);
                Database::getInstance($_SESSION['db_nombre']);

                if($_SESSION['usuarioActivo']['rol'] === 'Empresario'){
                    header('Location: /empresa');
                }else {
                    header('Location: /usuario-empleado');
                }

                
                exit();
            }
        }
    }
}



function registro($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $persona, $email, $contra)
{
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
        $existeEmpresa = existeEmpresa($email);
        if (!$existeEmpresa) {
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
}

$page = 'home';

require 'views/home.view.php';
