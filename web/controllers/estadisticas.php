<?php

if (isset($_GET['stats'])) {
    $nombre_departamento = $_GET['stats'];
    
    Database::getInstance($_SESSION['db_nombre']);

    $departamento = Departamento::getDepartamentoPorNombre($nombre_departamento);

    $empleados = Empleado::getEmpleadosPorDepartamento($departamento['id_departamento']);

    $costes_empleados = Empleado::getCostesTrabajador($empleados['id_empleado']);


} 

$page = 'estadisticas';
require_once 'views/estadisticas.view.php'; 