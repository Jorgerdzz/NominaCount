<?php

Database::getInstance($_SESSION['db_nombre']);

$vacaciones = Vacacion::getVacaciones();



$page = "notificaciones";

require_once "views/Session/notificaciones.view.php";