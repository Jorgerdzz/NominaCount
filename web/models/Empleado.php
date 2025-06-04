<?php

class Empleado extends Database
{

    public static function getEmpleados()
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM empleados;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEmpleadosPorDepartamento($id_departamento)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM empleados WHERE id_departamento = :id_departamento;";
        $params = [
            'id_departamento' => $id_departamento
        ];
        return $instance->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getNumEmpleadosPorDepartamento($id_departamento)
    {
        $instance = self::getInstance();
        $query = "SELECT COUNT(*) FROM empleados as numero_empleados WHERE id_departamento = :id_departamento;";
        $params = [
            'id_departamento' => $id_departamento
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function getEmpleadoPorId($id_empleado)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM empleados WHERE id_empleado = :id_empleado;";
        $params = [
            'id_empleado' => $id_empleado
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function getEmpleadoPorEmail($email)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM empleados WHERE email = :email;";
        $params = [
            'email' => $email
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }


    public static function darAltaEmpleado($id_departamento, $nombre, $apellidos, $dni, $num_seguridad_social, $email, $telefono, $antiguedad_empresa, $fecha_nacimiento, $categoria_profesional, $minusvalia, $num_hijos, $estado_civil, $salario_base)
    {
        $instance = self::getInstance();
        $query = "INSERT INTO empleados (id_departamento, nombre, apellidos, dni, num_seguridad_social, email, 
        telefono, antiguedad_empresa, fecha_nacimiento, categoria_profesional, minusvalia, num_hijos, 
        estado_civil, salario_base)
        VALUES (:id_departamento, :nombre, :apellidos, :dni, :num_seguridad_social, :email, :telefono,
        :antiguedad_empresa, :fecha_nacimiento, :categoria_profesional, :minusvalia, :num_hijos, 
        :estado_civil, :salario_base);";
        $params = [
            "id_departamento"       => $id_departamento,
            "nombre"                => $nombre,
            "apellidos"             => $apellidos,
            "dni"                   => $dni,
            "num_seguridad_social"  => $num_seguridad_social,
            "email"                 => $email,
            "telefono"              => $telefono,
            "antiguedad_empresa"    => $antiguedad_empresa,
            "fecha_nacimiento"      => $fecha_nacimiento,
            "categoria_profesional" => $categoria_profesional,
            "minusvalia"            => $minusvalia,
            "num_hijos"             => $num_hijos,
            "estado_civil"          => $estado_civil,
            "salario_base"          => $salario_base,
        ];
        $instance->query($query, $params);
    }

    public static function darBajaEmpleado($id_empleado){
        $instance = self::getInstance();
        $query = "DELETE FROM empleados WHERE id_empleado = :id_empleado;";
        $params = [
            "id_empleado" => $id_empleado,
        ];
        $instance->query($query, $params);
    }

    public static function modificarDatosEmpleado($id_empleado, $nombre, $apellidos, $dni, $num_seguridad_social, $email, $telefono, $antiguedad_empresa, $fecha_nacimiento, $categoria_profesional, $minusvalia, $num_hijos, $estado_civil, $salario_base)
    {
        $instance = self::getInstance();
        $query = "UPDATE empleados SET nombre = :nombre, apellidos = :apellidos, dni = :dni, num_seguridad_social = :num_seguridad_social, 
        email = :email, telefono = :telefono, antiguedad_empresa = :antiguedad_empresa, fecha_nacimiento = :fecha_nacimiento, 
        categoria_profesional = :categoria_profesional, minusvalia = :minusvalia, num_hijos = :num_hijos, estado_civil = :estado_civil,  salario_base = :salario_base WHERE id_empleado = :id_empleado";
        $params = [
            "id_empleado"           => $id_empleado,
            "nombre"                => $nombre,
            "apellidos"             => $apellidos,
            "dni"                   => $dni,
            "num_seguridad_social"  => $num_seguridad_social,
            "email"                 => $email,
            "telefono"              => $telefono,
            "antiguedad_empresa"    => $antiguedad_empresa,
            "fecha_nacimiento"      => $fecha_nacimiento,
            "categoria_profesional" => $categoria_profesional,
            "minusvalia"            => $minusvalia,
            "fecha_nacimiento"      => $fecha_nacimiento,
            "num_hijos"             => $num_hijos,
            "estado_civil"          => $estado_civil,
            "salario_base"          => $salario_base,
        ];
        $instance->query($query, $params);
    }

    public static function insertarCostesTrabajador($id_empleado, $fecha_inicio, $fecha_fin, $cotizacion_contingencias_comunes, $cotizacion_accidentes_trabajo, $cotizacion_desempleo_empresa, $cotizacion_formacion_empresa, $cotizacion_fogasa_empresa, $cotizacion_horas_extra, $cotizacion_horas_extra_fuerza_mayor, $coste_total_trabajador)
    {
        $instance = self::getInstance();
        $query = "INSERT INTO costes_trabajador (id_empleado, fecha_inicio, fecha_fin, cotizacion_contingencias_comunes,
        cotizacion_accidentes_trabajo, cotizacion_desempleo_empresa, cotizacion_formacion_empresa, cotizacion_fogasa_empresa, 
        cotizacion_horas_extra, cotizacion_horas_extra_fuerza_mayor, coste_total_trabajador)
        VALUES (:id_empleado, :fecha_inicio, :fecha_fin, :cotizacion_contingencias_comunes, :cotizacion_accidentes_trabajo,
        :cotizacion_desempleo_empresa,:cotizacion_formacion_empresa, :cotizacion_fogasa_empresa, 
        :cotizacion_horas_extra, :cotizacion_horas_extra_fuerza_mayor, :coste_total_trabajador);";
        $params = [
            "id_empleado"                           => $id_empleado,
            "fecha_inicio"                          => $fecha_inicio,
            "fecha_fin"                             => $fecha_fin,
            "cotizacion_contingencias_comunes"      => $cotizacion_contingencias_comunes,
            "cotizacion_accidentes_trabajo"         => $cotizacion_accidentes_trabajo,
            "cotizacion_desempleo_empresa"          => $cotizacion_desempleo_empresa,
            "cotizacion_formacion_empresa"          => $cotizacion_formacion_empresa,
            "cotizacion_fogasa_empresa"             => $cotizacion_fogasa_empresa,
            "cotizacion_horas_extra"                => $cotizacion_horas_extra,
            "cotizacion_horas_extra_fuerza_mayor"   => $cotizacion_horas_extra_fuerza_mayor,
            "coste_total_trabajador"                => $coste_total_trabajador,
        ];
        $instance->query($query, $params);
    }


    public static function getCostesTrabajador($id_empleado)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM costes_trabajador WHERE id_empleado = :id_empleado ORDER BY fecha_fin DESC";
        $params = ['id_empleado' => $id_empleado];
        return $instance->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCosteTotalAcumulado($id_empleado)
    {
        $instance = self::getInstance();
        $query = "SELECT SUM(coste_total_trabajador) as coste_total 
                FROM costes_trabajador 
                WHERE id_empleado = :id_empleado";
        $params = ['id_empleado' => $id_empleado];
        $result = $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
        
        return $result['coste_total'] ?? 0;
    }

    public static function getCostesPorAnio($id_empleado, $anio = null)
    {
        $instance = self::getInstance();
        if ($anio === null) {
            $anio = date('Y');
        }
        $query = "SELECT * FROM costes_trabajador 
              WHERE id_empleado = :id_empleado 
              AND YEAR(fecha_fin) = :anio
              ORDER BY fecha_fin ASC";
        $params = [
            'id_empleado' => $id_empleado,
            'anio' => $anio
        ];
        return $instance->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCostesPorMes($id_empleado, $año = null)
    {
        $costes = self::getCostesPorAnio($id_empleado, $año);
        $costesPorMes = [];

        foreach ($costes as $coste) {
            $mes = date('n', strtotime($coste['fecha_fin']));
            $costesPorMes[$mes] = $coste;
        }

        return $costesPorMes;
    }

    public static function getCostesAgrupadosPorMes($id_empleado, $anio = null)
    {
        $costes = self::getCostesPorAnio($id_empleado, $anio);
        $costesPorMes = array_fill(1, 12, 0); // Inicializamos con 12 meses

        foreach ($costes as $coste) {
            $mes = (int)date('n', strtotime($coste['fecha_fin']));
            $costesPorMes[$mes] += (float)$coste['coste_total_trabajador'];
        }

        return $costesPorMes; 
    }

    public static function getCostesPorMesYAnio($id_empleado, $mes, $anio)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM costes_trabajador 
                  WHERE id_empleado = :id_empleado 
                  AND MONTH(fecha_fin) = :mes 
                  AND YEAR(fecha_fin) = :anio
                  LIMIT 1";
        $params = [
            'id_empleado' => $id_empleado,
            'mes' => $mes,
            'anio' => $anio
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }


    public static function buscarEmpleadosPorNombre($terminoBusqueda)
    {
        $instance = self::getInstance();
        $query = "SELECT id_empleado, nombre, apellidos, dni, id_departamento 
                  FROM empleados 
                  WHERE CONCAT(nombre, ' ', apellidos) LIKE :termino 
                  OR nombre LIKE :termino 
                  OR apellidos LIKE :termino 
                  OR dni LIKE :termino
                  ORDER BY apellidos, nombre
                  LIMIT 10";
        $params = [
            'termino' => '%' . $terminoBusqueda . '%'
        ];
        return $instance->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
}
