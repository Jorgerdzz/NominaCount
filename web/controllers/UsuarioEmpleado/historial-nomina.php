<?php

if (isset($_GET['id'])) {

    Database::getInstance($_SESSION['db_nombre']);
    $empleado = Empleado::getEmpleadoPorEmail($_SESSION['usuarioActivo']['email']);

    $año = isset($_GET['anio']) ? (int)$_GET['anio'] : date('Y');
    $mes_seleccionado = isset($_GET['mes']) ? (int)$_GET['mes'] : 1;

    $nominasPorMes = Nomina::getNominasPorMes($empleado['id_empleado'], $año);
    $costesPorMes = Empleado::getCostesPorMes($empleado['id_empleado'], $año);

    $meses = [
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];
}

$page = 'usuario-empleado-historial-nomina';

require_once 'views/UsuarioEmpleado/historial-nomina.view.php';
