<?php

Database::getInstance($_SESSION['db_nombre']);

$vacaciones = Vacaciones::getVacaciones();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_empleado = $_POST['id_empleado']; // Obtén el id_empleado del formulario

    if (isset($_POST['accion'])) {
        if ($_POST['accion'] === 'aceptar') {
            $aprobado = 'aprobado';
            Vacaciones::solicitudAprobada($id_empleado, $aprobado);
            header('Location: /notificaciones');
        } elseif ($_POST['accion'] === 'rechazar') {
            $rechazado = 'rechazado';
            Vacaciones::solicitudRechazada($id_empleado, $rechazado);
            header('Location: /notificaciones');
        }
    }
}

$page = "notificaciones";

require_once "views/Session/notificaciones.view.php";