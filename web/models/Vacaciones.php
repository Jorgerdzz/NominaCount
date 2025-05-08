<?php

class Vacaciones extends Database
{
    public static function getVacaciones()
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM vacaciones;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getVacacionesPorIdEmpleado($id_empleado)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM vacaciones WHERE id_empleado = :id_empleado;";
        $params = [
            'id_empleado' => $id_empleado,
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function getPeriodoVacaciones($id_empleado)
    {
        $instance = self::getInstance();
        $query = "SELECT fecha_inicio, fecha_fin FROM vacaciones WHERE id_empleado = :id_empleado;";
        $params = [
            'id_empleado' => $id_empleado,
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function getFechaSolicitud($id_empleado)
    {
        $instance = self::getInstance();
        $query = "SELECT fecha_solicitud FROM vacaciones WHERE id_empleado = :id_empleado;";
        $params = [
            'id_empleado' => $id_empleado,
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function solicitudAprobada($id_empleado, $aprobado)
    {
        $instance = self::getInstance();
        $query = "UPDATE vacaciones SET estado = :estado WHERE id_empleado = :id_empleado;";
        $params = [
            'id_empleado' => $id_empleado,
            'estado'      => $aprobado
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function solicitudRechazada($id_empleado, $rechazado)
    {
        $instance = self::getInstance();
        $query = "UPDATE vacaciones SET estado = :estado WHERE id_empleado = :id_empleado;";
        $params = [
            'id_empleado' => $id_empleado,
            'estado'      => $rechazado, 
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function borrarSolicitud($id_empleado)
    {
        $instance = self::getInstance();
        $query = "DELETE FROM vacaciones WHERE id_empleado = id_empleado;";
        $params = [
            'id_empleado' => $id_empleado,
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }


}
