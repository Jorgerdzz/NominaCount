<?php

    Database::getInstance($_SESSION['db_nombre']);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {
            $nombre_departamento = $_POST['nombre_departamento'] ?? null;
            $jefe_departamento = $_POST['jefe_departamento'] ?? null;
            
            $existe = Departamento::existeDepartamento($nombre_departamento);
            if ($existe) {
                json_encode(['success' => false, 'message' => 'El departamento ya existe.']);
            }else{
                Departamento::crearDepartamento($nombre_departamento, $jefe_departamento);
            
                json_encode([
                    'success' => true,
                    'message' => 'Departamento creado correctamente',
                    'departamento' => $nombre_departamento
                ]);
            }

        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

    }
    
    $page = 'empresa';

    require_once 'views/empresa.view.php';