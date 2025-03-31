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

    private function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public static function setDatabase($db_name)
    {
        $instance = new self();
        $instance->connection = null; 
        $instance->__construct($db_name); 
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
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUsuarios(){
        $instance = new self();
        $query = "SELECT * FROM usuarios;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEmpresaPorEmail($email){
        $instance = new self();
        $query = "SELECT * FROM empresas WHERE email = :email;";
        $params = [
            'email' => $email
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC);
    }

    public static function getNombreComercialPorIdEmpresa($id_empresa){
        $instance = new self();
        $query = "SELECT nombre_comercial FROM empresas WHERE id_empresa = :id_empresa;";
        $params = [
            'id_empresa' => $id_empresa
        ];
        return $instance->query($query, $params)->fetch(PDO::FETCH_ASSOC)['nombre_comercial'];
    }

}