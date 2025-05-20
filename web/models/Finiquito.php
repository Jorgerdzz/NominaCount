<?php

class Finiquito extends Database
{
    public static function insertarFiniquito(
        $id_empleado,
        $fecha_baja,
        $motivo_baja,
        $prorrateo_pagas_extra_salario_base,
        $total_devengado_prorrateado,
        $pago_vacaciones,
        $indemnizacion,
        $total_finiquito,
    ) {
        $instance = self::getInstance();
        $query = "INSERT INTO finiquito (id_empleado, fecha_baja, motivo_baja, prorrateo_pagas_extra_salario_base, 
        total_devengado_prorrateado, pago_vacaciones, indemnizacion, total_finiquito)
        VALUES (:id_empleado, :fecha_baja, :motivo_baja, :prorrateo_pagas_extra_salario_base, :total_devengado_prorrateado, 
        :pago_vacaciones, :indemnizacion, :total_finiquito);";

        $params = [
            "id_empleado"                         => $id_empleado,
            "fecha_baja"                          => $fecha_baja,
            "motivo_baja"                         => $motivo_baja,
            "prorrateo_pagas_extra_salario_base"  => $prorrateo_pagas_extra_salario_base,
            "total_devengado_prorrateado"         => $total_devengado_prorrateado,
            "pago_vacaciones"                     => $pago_vacaciones,
            "indemnizacion"                       => $indemnizacion,
            "total_finiquito"                     => $total_finiquito,
        ];
        $instance->query($query, $params);
    }

    public static function getFiniquitoEmpleado($id_empleado){
        $instance = self::getInstance();
        $query = "SELECT * FROM finiquito WHERE id_empleado = :id_empleado;";
        $params = [
            "id_empleado" => $id_empleado,
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }
}
