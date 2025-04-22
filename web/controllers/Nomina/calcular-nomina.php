<?php

if (isset($_GET['id'])) {
    $id_empleado = $_GET['id'];

    Database::getInstance($_SESSION['db_nombre']);

    $empleado = Empleado::getEmpleadoPorId($id_empleado);

    $datos_empleado = [
        'id_empleado' => $id_empleado,
        'nombre' => $empleado['nombre'],
        'apellidos' => $empleado['apellidos'],
        'dni' => $empleado['dni'],
        'num_seguridad_social' => $empleado['num_seguridad_social'],
        'email' => $empleado['email'],
        'telefono' => $empleado['telefono'],
        'antiguedad_empresa' => $empleado['antiguedad_empresa'],
        'num_hijos' => $empleado['num_hijos'],
        'estado_civil' => $empleado['estado_civil'],
        'fecha_nacimiento' => $empleado['fecha_nacimiento'],
        'categoria_profesional' => $empleado['categoria_profesional'],
        'minusvalia' => $empleado['minusvalia'],
        'salario_base' => $empleado['salario_base']
    ];

    $hoy = new DateTime();
    $fecha_nac = new DateTime($empleado['fecha_nacimiento']);
    $edad = $hoy->diff($fecha_nac)->y;
    $datos_empleado['edad'] = $edad;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $periodo_inicio = $_POST['periodo_inicio'];
        $periodo_fin = $_POST['periodo_fin'];
        $salario_base = $_POST['salario_base'];
        $incentivos = $_POST['incentivos'];
        $plus_dedicacion = $_POST['plus_dedicacion'];
        $plus_antiguedad = $_POST['plus_antiguedad'];
        $plus_actividad = $_POST['plus_actividad'];
        $plus_nocturnidad = $_POST['plus_nocturnidad'];
        $plus_responsabilidad = $_POST['plus_responsabilidad'];
        $plus_convenio = $_POST['plus_convenio'];
        $plus_idiomas = $_POST['plus_idiomas'];
        $horas_extra = $_POST['horas_extra'];
        $horas_complementarias = $_POST['horas_complementarias'];
        $salario_especie = $_POST['salario_especie'];
        $indemnizaciones = $_POST['indemnizaciones'];
        $indemnizaciones_ss = $_POST['indemnizaciones_ss'];
        $indemnizaciones_despido = $_POST['indemnizaciones_despido'];
        $plus_transporte = $_POST['plus_transporte'];
        $dietas = $_POST['dietas'];
        $base_cc = $_POST['base_cc'];
        $base_cp = $_POST['base_fp'];
        $importe_cc = $_POST['importe_cc'];
        $importe_MEI = $_POST['importe_MEI'];
        $importe_desempleo = $_POST['importe_desempleo'];
        $importe_fp = $_POST['importe_fp'];
        $importe_hextra = $_POST['importe_hextra'];
        $importe_hextraFuerzaMayor = $_POST['importe_hextraFuerzaMayor'];
        $total_aportaciones = $_POST['total_aportaciones'];
        $importe_irpf = $_POST['importe_irpf'];
        $total_deducciones = $_POST['total_deducir'];
        $total_devengado = $_POST['total_devengado'];
        $liquido = $_POST['liquido'];


        Nomina::insertarNomina($id_empleado,
        $periodo_inicio,
        $periodo_fin,
        $salario_base,
        $incentivos,
        $plus_dedicacion,
        $plus_antiguedad,
        $plus_actividad,
        $plus_nocturnidad,
        $plus_responsabilidad,
        $plus_convenio,
        $plus_idiomas,
        $horas_extra,
        $horas_complementarias,
        $salario_especie,
        $indemnizaciones,
        $indemnizaciones_ss,
        $indemnizaciones_despido,
        $plus_transporte,
        $dietas,
        $base_cc,
        $base_cp,
        $importe_cc,
        $importe_MEI,
        $importe_desempleo,
        $importe_fp,
        $importe_hextra,
        $importe_hextraFuerzaMayor,
        $total_aportaciones,
        $importe_irpf,
        $total_deducciones,
        $total_devengado,
        $liquido);

        header("Location: /nomina/empleado?id=$id_empleado");
    }

}

$page = "calcular-nomina";
require 'views/Nomina/calcular-nomina.view.php';
