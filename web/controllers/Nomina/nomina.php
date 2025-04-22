<?php

    if(isset($_GET['id'])){
        $id_empleado = $_GET['id'];
        
    }

$page = "nomina";
require 'views/Nomina/nomina.view.php';