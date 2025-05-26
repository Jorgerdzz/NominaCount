<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion']) && $_POST['accion'] === 'delegar_usuario') {
        $nombre_usuario = $_POST['delegar_nombre_usuario'];
        $email_usuario = $_POST['delegar_email'];

        Database::getInstance('sistema_empresas');

        $existe = existeUsuario($email_usuario);

        if($existe){
            Usuario::delegarUsuario($email_usuario, TRUE);
            echo json_encode(['exito' => TRUE]);
        }else{
            echo json_encode(['exito' => FALSE]);
        }

        Database::getInstance($_SESSION['db_nombre']);
        exit;
    }
}
