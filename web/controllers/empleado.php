<?php

    if(isset($_GET['id'])){
        $id_empleado = $_GET['id'];
        
        Database::getInstance($_SESSION['db_nombre']);

        $empleado = Empleado::getEmpleadoPorId($id_empleado);
        $nombre_empleado = $empleado['nombre'];
        $apellidos_empleado = $empleado['apellidos'];
        $dni = $empleado['dni'];
        $email = $empleado['email'];
        $telefono = $empleado['telefono'];
        $antiguedad_empresa = $empleado['antiguedad_empresa'];
        $num_hijos = $empleado['num_hijos'];
        $estado_civil = $empleado['estado_civil'];
        $fecha_nacimiento = $empleado['fecha_nacimiento'];
        $salario_base = $empleado['salario_base'];
    }

    $page = "empleado";
    require_once 'views/empleado.view.php'; 