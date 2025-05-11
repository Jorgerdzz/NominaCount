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

function validarCredenciales($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $persona, $email, $contra)
{
    return validarCadena($cif)
        && validarCadena($denominacion_social)
        && validarCadena($nombre_comercial)
        && validarCadena($direccion)
        && validarCadena($telefono)
        && validarCadena($persona)
        && validarEmail($email)
        && validarCadena($contra);
}

function db_nombre($db_maestra, $nombre_comercial)
{
    $empresa = str_replace(' ', '', $nombre_comercial);
    return $db_maestra . $empresa;
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
