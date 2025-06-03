<?php

function validarCIF($cif)
{
    return strlen($cif) == 9;
}

function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false && strlen($email) <= 255;
}

function validarCadena($string)
{
    return strlen($string) >= 2 && strlen($string) <= 255;
}

function validarCredenciales($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $email)
{
    return validarCadena($cif)
        && validarCadena($denominacion_social)
        && validarCadena($nombre_comercial)
        && validarCadena($direccion)
        && validarCadena($telefono)
        && validarEmail($email);
}

function db_nombre($db_maestra, $nombre_comercial) {
    $nombre = strtolower($nombre_comercial);
    
    $nombre = iconv('UTF-8', 'ASCII//TRANSLIT', $nombre);
    
    $nombre = preg_replace('/[^a-z0-9]/', '_', $nombre);
    
    $nombre = str_replace(' ', '', $nombre);
    
    return $db_maestra . $nombre;
}

function existeEmpresa($cif, $denominacion_social)
{
    $empresas = Empresa::getEmpresas();
    foreach ($empresas as $empresa) {
        if ($empresa['cif'] === $cif || $empresa['denominacion_social'] === $denominacion_social) {
            return true;
        }
    }
    return false;
}

function existeUsuario($email)
{
    $usuarios = Usuario::getUsuarios();
    foreach ($usuarios as $usuario) {
        if ($usuario['email'] == $email) {
            return true;
        }
    }
    return false;
}
