<?php

if (isset($_GET['departamento'])) {
    $nombreDepartamento = $_GET['departamento'];

    Database::getInstance($_SESSION['db_nombre']);
    $departamentoActual = Departamento::getDepartamentoPorNombre($nombreDepartamento);

    $empleados = Empleado::getEmpleadosPorDepartamento($departamentoActual['id_departamento']);

    $page = 'departamento';
    require_once 'views/departamento.view.php';
}

    