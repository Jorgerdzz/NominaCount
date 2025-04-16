<?php

class Nomina extends Database
{
    public static function insertarNomina($id_empleado, $fecha_inicio, $fecha_fin, $salario_base, $incentivos, $plus_especial_dedicacion,
    $plus_antiguedad, $plus_actividad, $plus_nocturnidad, $plus_responsabilidad, $plus_convenio, $plus_idiomas, $horas_extra, 
    $horas_complementarias, $salario_especie, $indemnizaciones, $indemnizaciones_ss, $indemnizaciones_despido, $plus_transporte, $dietas,
    $prorrateo_pagas_extra, $base_cc, $base_cp, $importe_cc, $importe_MEI, $importe_desempleo, $importe_fp, $importe_horas_extra,
    $importe_horas_extra_fuerza_mayor, $cotizacion_ss, $importe_irpf, $total_deducciones, $total_devengado, $salario_neto)
    {
        $instance = self::getInstance();
        $query = "INSERT INTO nomina (id_empleado, fecha_inicio, fecha_fin, salario_base, incentivos, plus_especial_dedicacion, plus_antiguedad,
        plus_actividad, plus_nocturnidad, plus_responsabilidad, plus_convenio, plus_idiomas, horas_extra, horas_complementarias, 
        salario_especie, indemnizaciones, indemnizaciones_ss, indemnizaciones_despido, plus_transporte, dietas, prorrateo_pagas_extra,
        base_cc, base_cp, importe_cc, importe_MEI, importe_desempleo, importe_fp, importe_horas_extra, importe_horas_extra_fuerza_mayor, 
        cotizacion_ss, importe_irpf, total_deducciones, total_devengado, salario_neto)

        VALUES (:id_empleado, :fecha_inicio, :fecha_fin, :salario_base, :incentivos, :plus_especial_dedicacion, :plus_antiguedad,
        :plus_actividad, :plus_nocturnidad, :plus_responsabilidad, :plus_convenio, :plus_idiomas, :horas_extra, :horas_complementarias, 
        :salario_especie, :indemnizaciones, :indemnizaciones_ss, :indemnizaciones_despido, :plus_transporte, :dietas, :prorrateo_pagas_extra,
        :base_cc, :base_cp, :importe_cc, :importe_MEI, :importe_desempleo, :importe_fp, :importe_horas_extra, :importe_horas_extra_fuerza_mayor, 
        :cotizacion_ss, :importe_irpf, :total_deducciones, :total_devengado, :salario_neto);";

        $params = [
            "id_empleado"                       => $id_empleado,
            "fecha_inicio"                      => $fecha_inicio,
            "fecha_fin"                         => $fecha_fin,
            "salario_base"                      => $salario_base,
            "incentivos"                        => $incentivos,
            "plus_especial_dedicacion"          => $plus_especial_dedicacion,
            "plus_antiguedad"                   => $plus_antiguedad,
            "plus_actividad"                    => $plus_actividad,
            "plus_nocturnidad"                  => $plus_nocturnidad,
            "plus_responsabilidad"              => $plus_responsabilidad,
            "plus_convenio"                     => $plus_convenio,
            "plus_idiomas"                      => $plus_idiomas,
            "horas_extra"                       => $horas_extra,
            "horas_complementarias"             => $horas_complementarias,
            "salario_especie"                   => $salario_especie,
            "indemnizaciones"                   => $indemnizaciones,
            "indemnizaciones_ss"                => $indemnizaciones_ss,
            "indemnizaciones_despido"           => $indemnizaciones_despido,
            "plus_transporte"                   => $plus_transporte,
            "dietas"                            => $dietas,
            "prorrateo_pagas_extra"             => $prorrateo_pagas_extra,
            "base_cc"                           => $base_cc,
            "base_cp"                           => $base_cp,
            "importe_cc"                        => $importe_cc,
            "importe_MEI"                       => $importe_MEI,
            "importe_desempleo"                 => $importe_desempleo,
            "importe_fp"                        => $importe_fp,
            "importe_horas_extra"               => $importe_horas_extra,
            "importe_horas_extra_fuerza_mayor"  => $importe_horas_extra_fuerza_mayor,
            "cotizacion_ss"                     => $cotizacion_ss,
            "importe_irpf"                      => $importe_irpf,
            "total_deducciones"                 => $total_deducciones,
            "total_devengado"                   => $total_devengado,
            "salario_neto"                      => $salario_neto,
        ];
        $instance->query($query, $params);
    }
}