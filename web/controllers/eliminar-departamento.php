<?php

$data = json_decode(file_get_contents('php://input'), true);
$idDepartamento = $data['id_departamento'] ?? null;

Database::getInstance($_SESSION['db_nombre']);
Departamento::eliminarDepartamento($idDepartamento);

