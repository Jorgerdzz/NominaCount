<?php

if (isset($_GET['id'])) {
    $id_empleado = $_GET['id'];

    Database::getInstance($_SESSION['db_nombre']);

    $empleado = Empleado::getEmpleadoPorId($id_empleado);

    if ($empleado['id_departamento'] != NULL) {
        $departamento = Departamento::getDepartamentoPorId($empleado['id_departamento']);
    }

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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        Empleado::modificarDatosEmpleado(
            $id_empleado,
            $_POST['editar-nombre-empleado'],
            $_POST['editar-apellidos-empleado'],
            $_POST['editar-dni-empleado'],
            $_POST['editar-num-seguridad-social'],
            $_POST['editar-email-empleado'],
            $_POST['editar-telefono-empleado'],
            $_POST['editar-antiguedad-empleado'],
            $_POST['editar-nacimiento-empleado'],
            $_POST['editar-categoria-profesional'],
            $_POST['editar-minusvalia'],
            $_POST['editar-hijos-empleado'],
            $_POST['editar-estado-empleado'],
            $_POST['editar-salario-empleado']
        );

        header("Location: /empleado?id=$id_empleado");
    }
}

$page = "empleado";
require_once 'views/empleado.view.php';
