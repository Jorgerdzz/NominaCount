<?php

class Empresa extends Database
{

    public static function crearEmpresa($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $email, $db_nombre)
    {
        Database::crearDatabase($db_nombre);

        Database::getInstance($db_nombre);

        Database::ejecutarScriptSQL(__DIR__ . '/../sql/estructura_base.sql');

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

    public static function getEmpresaPorId($id_empresa)
    {
        $instance = new self();
        $query = "SELECT * FROM empresas WHERE id_empresa = :id_empresa;";
        $params = [
            'id_empresa' => $id_empresa
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
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

    public static function getEstadisticasEmpresa() {
        $instance = self::getInstance();
        
        $queryCostes = "SELECT 
                        SUM(coste_total_departamento) as coste_total,
                        AVG(coste_total_departamento) as coste_medio,
                        COUNT(*) as num_departamentos
                        FROM departamentos 
                        WHERE coste_total_departamento IS NOT NULL";
        
        $queryEmpleados = "SELECT COUNT(*) as num_empleados FROM empleados";
        
        $estadisticas = $instance->query($queryCostes)->fetch(PDO::FETCH_ASSOC);
        $empleados = $instance->query($queryEmpleados)->fetch(PDO::FETCH_ASSOC);
        
        return array_merge($estadisticas, $empleados);
    }
    



}
