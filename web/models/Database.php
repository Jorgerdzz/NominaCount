<?php

class Database
{

    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=sistema_empresas;charset=utf8mb4";
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

    public static function crearEmpresa($cif, $denominacion_social, $nombre_comercial, $direccion, $telefono, $email, $db_nombre)
    {
        $instance = new self();
        $query = "INSERT INTO empresas(cif, denominacion_social, nombre_comercial, direccion, telefono, email, db_nombre) 
        VALUES (:cif, :denominacion_social, :nombre_comercial, :direccion, :telefono, :email, :db_nombre);";
        $params = [
            'cif' => $cif,
            'denominacion_social' => $denominacion_social,
            'nombre_comercial' => $nombre_comercial,
            'direccion' => $direccion,
            'telefono' => $telefono,
            'email' => $email,
            'db_nombre' => $db_nombre
        ];
        $instance->query($query, $params);
    }

    public static function crearUsuario($nombre_usuario, $rol, $email, $contra)
    {
        $instance = new self();
        $query = "INSERT INTO usuarios(nombre_usuario, rol, email, contrasena) 
        VALUES (:nombre_usuario, :rol, :email, :contra);";
        $params = [
            'nombre_usuario' => $nombre_usuario,
            'rol' => $rol,
            'email' => $email,
            'contra' => password_hash($contra, PASSWORD_DEFAULT)
        ];
        $instance->query($query, $params);
    }

    public static function crearDatabase($db_nombre){
        $instance = new self();
        $query = "CREATE DATABASE :db_nombre";
        $params = [
            'db_nombre' => $db_nombre,
        ];
        $instance->query($query, $params);
    }

    public static function empresas(){
        $instance = new self();
        $query = "SELECT * FROM empresas";
        $instance->query($query);
    }

}