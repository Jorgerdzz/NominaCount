<?php

class Departamento extends Database
{

    public static function getDepartamentos()
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM departamentos;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getDepartamentoPorNombre($nombre_departamento)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM departamentos WHERE nombre_departamento = :nombre_departamento";
        $params = [
            'nombre_departamento' => $nombre_departamento,
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function getDepartamentoPorId($id_departamento)
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM departamentos WHERE id_departamento = :id_departamento";
        $params = [
            'id_departamento' => $id_departamento,
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function crearDepartamento($nombre_departamento, $jefe_departamento)
    {
        $instance = self::getInstance();
        $query = "INSERT INTO departamentos (id_departamento, nombre_departamento, jefe_departamento,
        num_empleados, coste_total_departamento) 
        VALUES (NULL, :nombre_departamento, :jefe_departamento, NULL, NULL);";
        $params = [
            'nombre_departamento' => $nombre_departamento,
            'jefe_departamento' => $jefe_departamento
        ];
        $instance->query($query, $params);
    }

    public static function eliminarDepartamento($id_departamento)
    {
        $instance = self::getInstance();
        $query = "DELETE FROM departamentos WHERE id_departamento = :id_departamento;";
        $params = [
            'id_departamento' => $id_departamento
        ];
        $instance->query($query, $params);
    }

    public static function existeDepartamento($nombre_departamento)
    {
        $instance = self::getInstance();
        $query = "SELECT COUNT(*) as count FROM departamentos WHERE LOWER(nombre_departamento) = LOWER(:nombre_departamento)";
        $params = ['nombre_departamento' => $nombre_departamento];
        $result = $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);

        return !empty($result) && $result['count'] > 0;
    }

    public static function actualizarNumEmpleados($id_departamento, $num_empleados)
    {
        $instance = self::getInstance();
        $query = "UPDATE departamentos 
                  SET num_empleados = :num_empleados 
                  WHERE id_departamento = :id_departamento";
        $params = [
            'id_departamento' => $id_departamento,
            'num_empleados' => $num_empleados
        ];
        $instance->query($query, $params);
    }

    public static function actualizarCosteDepartamento($id_departamento, $coste_total)
    {
        $instance = self::getInstance();
        $query = "UPDATE departamentos 
                  SET coste_total_departamento = :coste_total 
                  WHERE id_departamento = :id_departamento";
        $params = [
            'id_departamento' => $id_departamento,
            'coste_total' => $coste_total
        ];
        $instance->query($query, $params);
    }

    public static function getCostesPorDepartamento()
    {
        $instance = self::getInstance();
        $query = "SELECT nombre_departamento, coste_total_departamento 
                  FROM departamentos 
                  WHERE coste_total_departamento IS NOT NULL
                  ORDER BY coste_total_departamento DESC";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEstadisticasDepartamento($nombre_departamento)
    {
        $instance = self::getInstance();

        $query = "SELECT id_departamento, num_empleados, coste_total_departamento 
                  FROM departamentos 
                  WHERE nombre_departamento = :nombre_departamento";
        $params = ['nombre_departamento' => $nombre_departamento];
        $departamento = $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT SUM(ct.coste_total_trabajador) as coste_real
                  FROM empleados e
                  JOIN costes_trabajador ct ON e.id_empleado = ct.id_empleado
                  WHERE e.id_departamento = :id_departamento";
        $params = ['id_departamento' => $departamento['id_departamento']];
        $coste_real = $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);

        $coste_medio = ($departamento['num_empleados'] > 0)
            ? ($coste_real['coste_real'] / $departamento['num_empleados'])
            : 0;

        return [
            'nombre_departamento' => $nombre_departamento,
            'id_departamento' => $departamento['id_departamento'],
            'num_empleados' => $departamento['num_empleados'],
            'coste_total_departamento' => $coste_real['coste_real'] ?? 0,
            'coste_medio_empleado' => $coste_medio,
            'coste_departamento_bd' => $departamento['coste_total_departamento']
        ];
    }

    public static function getEstadisticasDepartamentoPorMes($nombre_departamento, $anio = null)
    {
        $instance = self::getInstance();

        $query = "SELECT id_departamento, num_empleados 
                FROM departamentos 
                WHERE nombre_departamento = :nombre_departamento";
        $params = ['nombre_departamento' => $nombre_departamento];
        $departamento = $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT 
                    MONTH(ct.fecha_inicio) as mes,
                    SUM(ct.coste_total_trabajador) as coste_total_mes,
                    COUNT(DISTINCT e.id_empleado) as num_empleados_mes,
                    AVG(ct.coste_total_trabajador) as coste_medio_empleado
                FROM empleados e
                JOIN costes_trabajador ct ON e.id_empleado = ct.id_empleado
                WHERE e.id_departamento = :id_departamento";

        $params = ['id_departamento' => $departamento['id_departamento']];

        if ($anio !== null) {
            $query .= " AND YEAR(ct.fecha_inicio) = :anio";
            $params['anio'] = $anio;
        }

        $query .= " GROUP BY MONTH(ct.fecha_inicio) ORDER BY mes";

        $resultados = $instance->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);

        $estadisticas = [
            'nombre_departamento' => $nombre_departamento,
            'id_departamento' => $departamento['id_departamento'],
            'num_empleados_total' => $departamento['num_empleados'],
            'datos_mensuales' => []
        ];

        for ($mes = 1; $mes <= 12; $mes++) {
            $estadisticas['datos_mensuales'][$mes] = [
                'coste_total' => 0,
                'num_empleados' => 0,
                'coste_medio_empleado' => 0
            ];
        }

        foreach ($resultados as $fila) {
            $mes = (int)$fila['mes'];
            $estadisticas['datos_mensuales'][$mes] = [
                'coste_total' => (float)$fila['coste_total_mes'],
                'num_empleados' => (int)$fila['num_empleados_mes'],
                'coste_medio_empleado' => (float)$fila['coste_medio_empleado']
            ];
        }

        return $estadisticas;
    }
}
