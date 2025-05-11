<?php

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="plantilla_empleados.csv"');

$salida = fopen('php://output', 'w');

$encabezados = [
    'Nombre',
    'Apellidos',
    'DNI',
    'Numero Seguridad Social',
    'Email',
    'Teléfono',
    'Fecha Incorporacion',
    'Fecha Nacimiento',
    'Categoria Profesional',
    'Minusvalia',
    'Numero Hijos',
    'Estado Civil',
    'Salario Base'
];

fputcsv($salida, $encabezados);
fclose($salida);
exit;
