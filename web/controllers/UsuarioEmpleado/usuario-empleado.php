<?php

Database::getInstance($_SESSION['db_nombre']);

$empleado = Empleado::getEmpleadoPorEmail($_SESSION['usuarioActivo']['email']);

$page = 'usuario-empleado';

require_once 'views/UsuarioEmpleado/usuario-empleado.view.php';