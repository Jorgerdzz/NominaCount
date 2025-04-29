<?php

header('Content-Type: application/json');

Database::getInstance($_SESSION['db_nombre']);

$departamentos = Departamento::getCostesPorDepartamento();

echo json_encode($departamentos);