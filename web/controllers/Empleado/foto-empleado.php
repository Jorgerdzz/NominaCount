<?php

Database::getInstance($_SESSION['db_nombre']);

$id_empleado = $_POST['id_empleado'];
$foto = $_FILES['foto_empleado'];

$empleado = Empleado::getEmpleadoPorId($id_empleado);

$carpeta = 'views/img/fotos_empleados/';

$nombre_limpio = preg_replace('/[^a-zA-Z0-9]/', '', $empleado['nombre']);
$apellidos_limpios = preg_replace('/[^a-zA-Z0-9]/', '', $empleado['apellidos']);

$extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
$nombre_archivo = 'foto_' . $nombre_limpio . '_' . $apellidos_limpios . '_' . uniqid() . '.' . $extension;
$ruta_relativa = $carpeta . $nombre_archivo;

move_uploaded_file($foto['tmp_name'], $ruta_relativa);

Empleado::actualizarFotoEmpleado($id_empleado, $ruta_relativa);

header("Location: /empleado?id=" . $id_empleado);
exit;