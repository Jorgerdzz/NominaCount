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

    public static function crearDatabase($db_nombre){
        $instance = new self();
        $query = "CREATE DATABASE $db_nombre;";
        $instance->query($query);
    }

    public static function crearUsuario($id_empresa, $nombre_usuario, $rol, $email, $contra)
    {
        $instance = new self();
        $query = "INSERT INTO usuarios(id_empresa, nombre_usuario, rol, email, contrasena) 
        VALUES (:id_empresa, :nombre_usuario, :rol, :email, :contra);";
        $params = [
            'id_empresa' => $id_empresa,
            'nombre_usuario' => $nombre_usuario,
            'rol' => $rol,
            'email' => $email,
            'contra' => password_hash($contra, PASSWORD_DEFAULT)
        ];
        $instance->query($query, $params);
    }

    public static function getEmpresas(){
        $instance = new self();
        $query = "SELECT * FROM empresas;";
        return $instance->query($query);
    }

    public static function getUsuarios(){
        $instance = new self();
        $query = "SELECT * FROM usuarios;";
        return $instance->query($query);
    }

    public static function getEmpresaPorEmail($email){
        $instance = new self();
        $query = "SELECT * FROM empresas WHERE email = :email;";
        $params = [
            'email' => $email
        ];
        return $instance->query($query, $params);
    }

}