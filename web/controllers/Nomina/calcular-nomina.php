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
        
    }

}

$page = "calcular-nomina";
require 'views/Nomina/calcular-nomina.view.php';
