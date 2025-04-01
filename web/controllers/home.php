<?php

require 'models/Database.php';
require 'models/Empresa.php';
require 'models/Usuario.php';
require 'Core/funciones.php';

define('db_maestra', 'sistema_empresas_');

$registro = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['emailInicioSesion']) && isset($_POST['contraInicioSesion'])) {
        $emailInicioSesion = $_POST['emailInicioSesion'];
        $contraInicioSesion = $_POST['contraInicioSesion'];
        iniciarSesion($emailInicioSesion, $contraInicioSesion);
    } else {
        $cif = $_POST['cif'];
        $denominacion_social = $_POST['denominacion_social'];
        $nombre_comercial = $_POST['nombre_comercial'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $persona = $_POST['persona'];
        $email = $_POST['email'];
        $contra = $_POST['contra'];
        $registro = registro($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $persona, $email, $contra);
        $_SESSION['registro_exitoso'] = $registro;
        header('Location: /'); 
    }
}

function iniciarSesion($email, $contra)
{
    $usuarios = Usuario::getUsuarios();
    foreach ($usuarios as $usuario) {
        if ($email === $usuario['email'] && password_verify($contra, $usuario['contrasena'])) {
            $_SESSION['usuarioActivo'] = [
                'id_usuario' => $usuario['id_usuario'],
                'id_empresa' => $usuario['id_empresa'],
                'nombre_usuario' => $usuario['nombre_usuario'],
                'rol' => $usuario['rol'],
                'email' => $usuario['email'],
                'contrasena' => $usuario['contrasena']
            ];
            $nombre_comercial = Empresa::getNombreComercialPorIdEmpresa($_SESSION['usuarioActivo']['id_empresa']);
            $db_nombre = db_nombre(db_maestra, $nombre_comercial);
            Database::setDatabase($db_nombre);
            header('Location: /empresa');
        }
    }
}



function registro($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $persona, $email, $contra)
{
    $registro = false;
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
            Database::crearDatabase($db_nombre);
            Usuario::crearUsuario($empresa['id_empresa'], $persona, 'Empresario', $email, $contra);
            $registro = true;
        }
    }
    return $registro;
}

require 'views/home.view.php';
