<?php

if (isset($_GET['id'])) {
    $id_empleado = $_GET['id'];

    Database::getInstance($_SESSION['db_nombre']);

    $nombreEmpresa = strtoupper($_SESSION['empresaActiva']['denominacion_social']);

    $empleado = Empleado::getEmpleadoPorId($id_empleado);

    $nombreCompleto = $empleado['nombre'] . ' ' . $empleado['apellidos'];
    $dni = $empleado['dni'];

    $finiquito = Finiquito::getFiniquitoEmpleado($empleado['id_empleado']);

}

$page = "finiquito";
require 'views/Finiquito/finiquito.view.php';