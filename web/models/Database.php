<?php

class Database
{

    private $connection;

    public function __construct($db_name = null)
    {
        $dsn = "mysql:host=localhost;dbname=". ($db_name ? $db_name : 'sistema_empresas') .";charset=utf8mb4";
        $user = "root";
        $password = "";
        $this->connection = new PDO($dsn, $user, $password);
    }

    protected function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public static function crearDatabase($db_nombre){
        $instance = new self();
        $query = "CREATE DATABASE $db_nombre;";
        $instance->query($query);
    }

    public static function setDatabase($db_name)
    {
        $instance = new self();
        $instance->connection = null; 
        $instance->__construct($db_name); 
    }

}