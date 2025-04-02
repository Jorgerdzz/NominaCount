<?php

class Empresa extends Database
{
    private $cif;
    private $denominacion_social;
    private $nombre_comercial;
    private $direccion;
    private $telefono;
    private $email;
    private $db_nombre;

    public static function crearEmpresa($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $email, $db_nombre)
    {
        $instance = new self();
        $query = "INSERT INTO empresas(cif, denominacion_social, nombre_comercial, direccion, telefono, email, db_nombre) 
        VALUES (:cif, :denominacion_social, :nombre_comercial, :direccion, :telefono, :email, :db_nombre);";
        $params = [
            'cif' => $cif,
            'denominacion_social' => $denominacion_social,
            'nombre_comercial' => $nombre_comercial,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'email' => $email,
            'db_nombre' => $db_nombre
        ];
        $instance->query($query, $params);
    }

    public static function getEmpresas()
    {
        $instance = new self();
        $query = "SELECT * FROM empresas;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEmpresaPorEmail($email)
    {
        $instance = new self();
        $query = "SELECT * FROM empresas WHERE email = :email;";
        $params = [
            'email' => $email
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function getNombreComercialPorIdEmpresa($id_empresa)
    {
        $instance = new self();
        $query = "SELECT nombre_comercial FROM empresas WHERE id_empresa = :id_empresa;";
        $params = [
            'id_empresa' => $id_empresa
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC)['nombre_comercial'];
    }

    
}
