<?php

    Database::getInstance($_SESSION['db_nombre']);

    $estadisticas = Empresa::getEstadisticasEmpresa();
    
    $page = 'empresa';

    require_once 'views/empresa.view.php';