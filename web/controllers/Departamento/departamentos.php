<?php

Database::getInstance($_SESSION['db_nombre']);
$departamentos = Departamento::getDepartamentos();

$page = 'departamentos';
require_once 'views/departamentos.view.php';
