<?php

class Database_empresa
{
    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=cine;charset=utf8mb4";
        $user = "root";
        $password = "";
        $this->connection = new PDO($dsn, $user, $password);
    }
    private function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }
}