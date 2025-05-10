<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre_departamento']) && isset($_POST['jefe_departamento'])) {
        $nombre_departamento = $_POST['nombre_departamento'] ?? null;
        $jefe_departamento = $_POST['jefe_departamento'] ?? null;

        Database::getInstance($_SESSION['db_nombre']);

        $existe = Departamento::existeDepartamento($nombre_departamento);

        if (!$existe) {
            Departamento::crearDepartamento($nombre_departamento, $jefe_departamento);
            header("Location: /departamento?departamento=$nombre_departamento");
        }
    }
}
