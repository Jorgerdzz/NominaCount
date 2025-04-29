<?php

if(isset($_GET['id'])){
    $id_empleado = $_GET['id'];

    Database::getInstance($_SESSION['db_nombre']);

    $empleado = Empleado::getEmpleadoPorId($id_empleado);

    $año = isset($_GET['anio']) ? (int)$_GET['anio'] : date('Y');
    $mes_seleccionado = isset($_GET['mes']) ? (int)$_GET['mes'] : 1; 

    $nominasPorMes = Nomina::getNominasPorMes($id_empleado, $año);
    $costesPorMes = Empleado::getCostesPorMes($id_empleado, $año);

    $meses = [
        1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
        5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
        9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
    ];
}


$page = "historial-nomina";
require 'views/Nomina/historial-nomina.view.php';