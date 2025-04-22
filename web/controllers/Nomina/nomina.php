<?php

    if(isset($_GET['id'])){
        $id_empleado = $_GET['id'];

        Database::getInstance($_SESSION['db_nombre']);

        $empleado = Empleado::getEmpleadoPorId($id_empleado);

        $nomina = Nomina::getUltimaNominaEmpleado($id_empleado);
        
    }

$page = "nomina";
require 'views/Nomina/nomina.view.php';