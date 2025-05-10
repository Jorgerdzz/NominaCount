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
        return $instance->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function solicitudAprobada($id_vacacion, $aprobado)
    {
        $instance = self::getInstance();
        $query = "UPDATE vacaciones SET estado = :estado WHERE id_vacacion = :id_vacacion;";
        $params = [
            'id_vacacion' => $id_vacacion,
            'estado'      => $aprobado
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function solicitudRechazada($id_vacacion, $rechazado)
    {
        $instance = self::getInstance();
        $query = "UPDATE vacaciones SET estado = :estado WHERE id_vacacion = :id_vacacion;";
        $params = [
            'id_vacacion' => $id_vacacion,
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

    public static function solicitarDiasVacaciones($id_empleado, $fecha_inicio, $fecha_fin)
    {
        $instance = self::getInstance();
        $query = "INSERT INTO vacaciones (id_empleado, fecha_inicio, fecha_fin, estado) VALUES (:id_empleado, :fecha_inicio, :fecha_fin, 'pendiente')";
        $params = [
            'id_empleado' => $id_empleado,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        ];
        return $instance->query($query, $params);
    }

    public static function contarSolicitudesPendientes($pendiente)
    {
        $instance = self::getInstance();
        $query = "SELECT COUNT(*) as num_solicitudes_pendientes FROM vacaciones WHERE estado = :estado;";
        $params = [
            'estado' => $pendiente,
        ];

        $stmt = $instance->query($query, $params);

        if ($stmt && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 
            return $result['num_solicitudes_pendientes']; 
        }

        return 0; 
    }
}
