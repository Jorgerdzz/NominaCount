<?php

Database::getInstance($_SESSION['db_nombre']);

$page = 'usuario-empleado';

require_once 'views/usuario-empleado.view.php';