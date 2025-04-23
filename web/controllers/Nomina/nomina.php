<?php

    if(isset($_GET['id'])){
        $id_empleado = $_GET['id'];

        Database::getInstance($_SESSION['db_nombre']);

        $empleado = Empleado::getEmpleadoPorId($id_empleado);

        $nomina = Nomina::getUltimaNominaEmpleado($id_empleado);

        $cotizacion_contingencias_comunes = $nomina['base_cc'] * 0.236;
        $cotizacion_accidentes_trabajo = $nomina['base_cp'] * 0.015;
        $cotizacion_desempleo_empresa  = $nomina['base_cp'] * 0.055;
        $cotizacion_formacion_empresa = $nomina['base_cp'] * 0.006;
        $cotizacion_fogasa_empresa = $nomina['base_cp'] * 0.002;
        $cotizacion_horas_extra = $nomina['horas_extra'] * 0.2360;
        $cotizacion_horas_extra_fuerza_mayor = $nomina['horas_complementarias'] * 0.12;
        $coste_total_trabajador = 
                                $cotizacion_contingencias_comunes+
                                $cotizacion_accidentes_trabajo + $cotizacion_desempleo_empresa + 
                                $cotizacion_formacion_empresa + $cotizacion_fogasa_empresa +
                                $cotizacion_horas_extra + $cotizacion_horas_extra_fuerza_mayor;

        Empleado::insertarCostesTrabajador($id_empleado, $nomina['fecha_inicio'], $nomina['fecha_fin'], $cotizacion_contingencias_comunes, $cotizacion_accidentes_trabajo, $cotizacion_desempleo_empresa, $cotizacion_formacion_empresa, $cotizacion_fogasa_empresa, $cotizacion_horas_extra, $cotizacion_horas_extra_fuerza_mayor, $coste_total_trabajador);
        
        Empleado::seleccionarCostesTrabajador($id_empleado);

    }

$page = "nomina";
require 'views/Nomina/nomina.view.php';