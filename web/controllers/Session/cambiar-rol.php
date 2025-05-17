<?php

if($_SESSION['usuarioActivo']['rol'] == 'Empresario'){
    Usuario::cambiarRolUsuario($_SESSION['usuarioActivo']['email'], 'Empleado');
    $_SESSION['usuarioActivo']['rol'] = 'Empleado';
    header('Location: /usuario-empleado');
}else {
    Usuario::cambiarRolUsuario($_SESSION['usuarioActivo']['email'], 'Empresario');
    $_SESSION['usuarioActivo']['rol'] = 'Empresario';
    header('Location: /empresa');
}