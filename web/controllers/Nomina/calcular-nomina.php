<?php

if (isset($_GET['id'])) {
    $id_empleado = $_GET['id'];

    Database::getInstance($_SESSION['db_nombre']);

    $empleado = Empleado::getEmpleadoPorId($id_empleado);
    $nombre_empleado = $empleado['nombre'];
    $apellidos_empleado = $empleado['apellidos'];
    $dni = $empleado['dni'];
    $num_seguridad_social = $empleado['num_seguridad_social'];
    $email = $empleado['email'];
    $telefono = $empleado['telefono'];
    $antiguedad_empresa = $empleado['antiguedad_empresa'];
    $num_hijos = $empleado['num_hijos'];
    $estado_civil = $empleado['estado_civil'];
    $fecha_nacimiento = $empleado['fecha_nacimiento'];
    $categoria_profesional = $empleado['categoria_profesional'];
    $minusvalia = $empleado['minusvalia'];
    $salario_base = $empleado['salario_base'];

}

$page = "calcular-nomina";
require 'views/Nomina/calcular-nomina.view.php';
