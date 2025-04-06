<?php

if (isset($_GET['departamento'])) {
    $nombreDepartamento = $_GET['departamento'];
    // Lógica backend
    Database::getInstance($_SESSION['db_nombre']);
    $departamentoActual = Departamento::getDepartamentoPorNombre($nombreDepartamento);
    // $empleados = Empleado::listarPorDepartamento($departamento['id']); // Ejemplo
    

    $page = 'departamento';
    require_once 'views/departamento.view.php';
} else {
    header("Location: /empresa"); // Redirige si no hay parámetro
}

    