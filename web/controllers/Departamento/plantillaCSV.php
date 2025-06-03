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


$ejemplo = [
    'Juan',
    'Perez Garcia',
    '12345678Z',
    '123456789012',
    'juan.perezgarcia@empresa.com',
    '600123456',
    '2023-01-15',
    '1985-05-20',
    'Ingenieros y Licenciados. Personal de alta direccion',
    'Sin discapacidad',
    '2',
    'Casado',
    '18000'
];
fputcsv($salida, $ejemplo);

fclose($salida);
exit;
