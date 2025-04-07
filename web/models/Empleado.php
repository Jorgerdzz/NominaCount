<?php

class Empleado extends Database 
{

    public static function getEmpleados()
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM empleados;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEmpleadosPorDepartamento($id_departamento)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM empleados WHERE id_departamento = :id_departamento;";
        $params = [
            'id_departamento' => $id_departamento
        ];
        return $instance->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function añadirEmpleado($id_departamento, $nombre, $apellidos, $dni, $email, $telefono, $antiguedad_empresa, $fecha_nacimiento, $num_hijos, $estado_civil, $salario_base)
    {
        $instance = self::getInstance();
        $query = "INSERT INTO empleados (id_departamento, nombre, apellidos, dni, email, 
        telefono, antiguedad_empresa, fecha_nacimiento, num_hijos, estado_civil, salario_base)
        VALUES (:id_departamento, :nombre, :apellidos, :dni, :email, :telefono,
        :antiguedad_empresa, :fecha_nacimiento, :num_hijos, :estado_civil, :salario_base);";
        $params = [
            "id_departamento"    => $id_departamento,
            "nombre"             => $nombre,
            "apellidos"          => $apellidos,
            "dni"                => $dni,
            "email"              => $email,
            "telefono"           => $telefono,
            "antiguedad_empresa" => $antiguedad_empresa,
            "fecha_nacimiento"   => $fecha_nacimiento,
            "num_hijos"          => $num_hijos,
            "estado_civil"       => $estado_civil,
            "salario_base"       => $salario_base,
        ];
        $instance->query($query, $params);
    }


}