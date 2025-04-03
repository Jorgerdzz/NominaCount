<?php

class Departamento extends Database
{

    private $nombre_departamento;
    private $jefe_departamento;
    private $num_empleados;


    public static function crearDepartamento($nombre_departamento, $jefe_departamento)
    {
        $instance = self::getInstance();
        $query = "INSERT INTO `departamentos` (`id_departamento`, `nombre_departamento`, `jefe_departamento`,
        `num_empleados`, `coste_total_departamento`) 
        VALUES (NULL, ':nombre_departamento', ':jefe_departamento', NULL, NULL)";
        $params = [
            'nombre_departamento' => $nombre_departamento,
            'jefe_departamento' => $jefe_departamento
        ]
        $instance->query($query, $params);
    }

}