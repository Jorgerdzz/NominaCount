<?php

Database::getInstance($_SESSION['db_nombre']);

$vacaciones = Vacaciones::getVacaciones();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_vacacion = $_POST['id_vacacion']; 

    if (isset($_POST['accion'])) {
        if ($_POST['accion'] === 'aceptar') {
            $aprobado = 'aprobado';
            Vacaciones::solicitudAprobada($id_vacacion, $aprobado);
            header('Location: /notificaciones');
        } elseif ($_POST['accion'] === 'rechazar') {
            $rechazado = 'rechazado';
            Vacaciones::solicitudRechazada($id_vacacion, $rechazado);
            header('Location: /notificaciones');
        }
    }
}

$page = "notificaciones";

require_once "views/Session/notificaciones.view.php";