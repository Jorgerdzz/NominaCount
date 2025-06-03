<?php

define('contrasena', 'P@ssw0rd'); //contraseña por defecto

if (isset($_GET['id'])) {
    $id_departamento = $_GET['id'];

    Database::getInstance($_SESSION['db_nombre']);
    $departamentoActual = Departamento::getDepartamentoPorId($id_departamento);

    $nombre_departamento = $departamentoActual['nombre_departamento'];
    $empleados = Empleado::getEmpleadosPorDepartamento($departamentoActual['id_departamento']);
    $numEmpleados = Empleado::getNumEmpleadosPorDepartamento($departamentoActual['id_departamento']);
    Departamento::actualizarNumEmpleados($departamentoActual['id_departamento'], $numEmpleados['COUNT(*)']);

    //AÑADIR EMPLEADOS MEDIANTE FORMULARIO
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        Empleado::darAltaEmpleado(
            $departamentoActual['id_departamento'],
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
            $_POST['salario_base']
        );

        $id_empresa = $_SESSION['empresaActiva']['id_empresa'];
        $nombre_usuario = $_POST['nombre_empleado'] . " " .  $_POST['apellidos_empleado'];

        Usuario::crearUsuario($id_empresa, $nombre_usuario, 'Empleado', FALSE, FALSE, $_POST['email_empleado'], contrasena);

        header('Location: /departamento?id=' . $departamentoActual['id_departamento']);
        exit;

    }

    //AÑADIR EMPLEADOS MEDIANTE CSV
    if (isset($_POST['importar_csv']) && isset($_FILES['csv_empleados'])) {
        $csvFile = $_FILES['csv_empleados']['tmp_name'];
        if (($archivo = fopen($csvFile, "r")) !== FALSE) {
            $cabecera = fgetcsv($archivo);
            while (($linea = fgetcsv($archivo, 1000, ",")) !== FALSE) {
                if (count($linea) != 13) {
                    continue; // Saltar filas incorrectas
                }
                $data = array_map('trim', $linea);
                list($nombre, $apellidos, $dni, $num_seguridad_social, $email, $telefono, $antiguedad_empresa, $fecha_nacimiento, $categoria_profesional, $minusvalia, $num_hijos, $estado_civil, $salario_base) = $data;


                Empleado::darAltaEmpleado(
                    $departamentoActual['id_departamento'],
                    $nombre,
                    $apellidos,
                    $dni,
                    $num_seguridad_social,
                    $email,
                    $telefono,
                    $antiguedad_empresa,
                    $fecha_nacimiento,
                    $categoria_profesional,
                    $minusvalia,
                    (int)$num_hijos,
                    $estado_civil,
                    (float)$salario_base
                );

                Usuario::crearUsuario(
                    $_SESSION['empresaActiva']['id_empresa'],
                    "$nombre $apellidos",
                    'Empleado',
                    false,
                    false,
                    $email,
                    contrasena
                );
            }
        }
        fclose($archivo);

        header('Location: /departamento?id=' . $departamentoActual['id_departamento']);
        exit;

    }

    $page = 'departamento';
    require_once 'views/departamento.view.php';

}
