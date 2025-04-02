<?php

class Usuario extends Database
{

    private $nombre_usuario;
    private $rol;
    private $email;
    private $contra;

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

    public static function getUsuarios()
    {
        $instance = new self();
        $query = "SELECT * FROM usuarios;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
