<?php

class Departamento extends Database
{

    private $nombre_departamento;
    private $jefe_departamento;
    private $num_empleados;


    public static function getDepartamentos()
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM departamentos;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getDepartamentoPorNombre($nombre_departamento)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM departamentos WHERE nombre_departamento = :nombre_departamento";
        $params = [
            'nombre_departamento' => $nombre_departamento,
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function crearDepartamento($nombre_departamento, $jefe_departamento)
    {
        $instance = self::getInstance();
        $query = "INSERT INTO departamentos (id_departamento, nombre_departamento, jefe_departamento,
        num_empleados, coste_total_departamento) 
        VALUES (NULL, :nombre_departamento, :jefe_departamento, NULL, NULL);";
        $params = [
            'nombre_departamento' => $nombre_departamento,
            'jefe_departamento' => $jefe_departamento
        ];
        $instance->query($query, $params);
    }

    public static function eliminarDepartamento($id_departamento)
    {
        $instance = self::getInstance();
        $query = "DELETE FROM departamentos WHERE id_departamento = :id_departamento;";
        $params = [
            'id_departamento' => $id_departamento
        ];
        $instance->query($query, $params);
    }

}