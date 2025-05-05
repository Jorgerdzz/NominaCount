<?php

define('contrasena', 'P@ssw0rd'); //contraseña por defecto

if (isset($_GET['departamento'])) {
    $nombre_departamento = $_GET['departamento'];

    Database::getInstance($_SESSION['db_nombre']);
    $departamentoActual = Departamento::getDepartamentoPorNombre($nombre_departamento);

    $_SESSION['nombre_departamento'] = $departamentoActual['nombre_departamento'];
    $empleados = Empleado::getEmpleadosPorDepartamento($departamentoActual['id_departamento']);
    $numEmpleados = Empleado::getNumEmpleadosPorDepartamento($departamentoActual['id_departamento']);
    Departamento::actualizarNumEmpleados($departamentoActual['id_departamento'], $numEmpleados['COUNT(*)']);


    if(isset($_POST['nombre_empleado']) &&
        isset($_POST['apellidos_empleado']) &&
        isset($_POST['dni_empleado']) &&
        isset($_POST['num_seguridad_social']) &&
        isset($_POST['email_empleado']) &&
        isset($_POST['telefono_empleado']) &&
        isset($_POST['antiguedad_empresa']) &&
        isset($_POST['num_hijos']) &&
        isset($_POST['estado_civil']) &&
        isset($_POST['fecha_nacimiento']) &&
        isset($_POST['categoria_profesional']) &&
        isset($_POST['minusvalia']) &&
        isset($_POST['salario_base'])){
            
            Empleado::darAltaEmpleado($departamentoActual['id_departamento'], 
            $_POST['nombre_empleado'],
            $_POST['apellidos_empleado'],
            $_POST['dni_empleado'],
            $_POST['num_seguridad_social'],
            $_POST['email_empleado'],
            $_POST['telefono_empleado'],
            $_POST['antiguedad_empresa'],
            $_POST['fecha_nacimiento'],
            $_POST['categoria_profesional'],
            $_POST['minusvalia'],
            $_POST['num_hijos'],
            $_POST['estado_civil'],
            $_POST['salario_base']);

            $id_empresa = $_SESSION['empresaActiva']['id_empresa'];
            $nombre_usuario = $_POST['nombre_empleado'] . " " .  $_POST['apellidos_empleado'];

            Usuario::crearUsuario($id_empresa, $nombre_usuario, 'Empleado', $_POST['email_empleado'], contrasena);
            
            header('Location: /departamento?departamento=' . $_SESSION['nombre_departamento']);
    }

    $page = 'departamento';
    require_once 'views/departamento.view.php';
}

    