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

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fecha_baja = $_POST['fecha_baja'];
        $motivo_baja = $_POST['motivo_baja'];
        $prorrateo_pagas_extra_salario_base = $_POST['prorrateo_pagas'];
        $total_devengado_prorrateado = $_POST['total_devengado'];
        $pago_vacaciones = $_POST['importe_vacaciones'];
        $indemnizacion = $_POST['importe_indemnizacion'];
        $total_finiquito = $_POST['total_finiquito'];

        Finiquito::insertarFiniquito($datos_empleado['id_empleado'], $fecha_baja, $motivo_baja, $prorrateo_pagas_extra_salario_base, $total_devengado_prorrateado,
        $pago_vacaciones, $indemnizacion, $total_finiquito);

        header("Location: /finiquito/empleado?id=$id_empleado");

    }

}

$page = "calcular-finiquito";
require 'views/Finiquito/calcular-finiquito.view.php';

