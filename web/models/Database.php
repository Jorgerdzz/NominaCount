<?php

class Database
{

    private static $instance = null;
    private $connection;

    public function __construct($db_name = null)
    {
        $dsn = "mysql:host=localhost;dbname=" . ($db_name ? $db_name : 'sistema_empresas') . ";charset=utf8mb4";
        $user = "root";
        $password = "";
        $this->connection = new PDO($dsn, $user, $password);
    }

    public static function getInstance($db_name = null)
    {
        if (self::$instance === null) {
            self::$instance = new self($db_name);
        } else {
            if ($db_name) {
                self::$instance->connection = null;
                self::$instance->__construct($db_name);
            }
        }
        return self::$instance;
    }

    protected function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public static function crearDatabase($db_nombre)
    {
        $instance = new self();
        $query = "CREATE DATABASE $db_nombre;";
        $instance->query($query);
    }

    public static function eliminarDatabase($db_nombre)
    {
        $instance = new self();

        if (!preg_match('/^[a-z0-9_]+$/', $db_nombre)) {
            throw new Exception("Nombre de base de datos inválido.");
        }

        $query = "DROP DATABASE `$db_nombre`;";
        $instance->query($query);
    }

    public static function ejecutarScriptSQL($rutaScript)
    {
        $instance = self::getInstance();
        $sql = file_get_contents($rutaScript);
        $instance->query($sql);
    }

    public function beginTransaction()
    {
        return $this->connection->beginTransaction();
    }

    public function commit()
    {
        return $this->connection->commit();
    }

    public function rollback()
    {
        return $this->connection->rollback();
    }
}
