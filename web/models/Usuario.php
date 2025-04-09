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

    public static function modificarUsuario($id_empresa, $id_usuario, $nombre_usuario, $email, $cif, $denominacion_social, $nombre_comercial, $direccion, $telefono)
    {
        $instance = self::getInstance();

        try{
            $instance->beginTransaction();

            $queryUsuario = "UPDATE usuarios SET nombre_usuario = :nombre_usuario, email = :email WHERE id_usuario = :id_usuario;";
            $paramsUsuario = [
                'id_usuario'     => $id_usuario,
                'nombre_usuario' => $nombre_usuario,
                'email'          => $email
            ];
            $instance->query($queryUsuario, $paramsUsuario);

            $queryEmpresa = "UPDATE empresas SET cif = :cif, denominacion_social = :denominacion_social, 
            nombre_comercial = :nombre_comercial, direccion = :direccion, telefono = :telefono, email = :email  
            WHERE id_empresa = :id_empresa;";
            $paramsEmpresa = [
                'id_empresa'          => $id_empresa,
                'cif'                 => $cif,
                'denominacion_social' => $denominacion_social,
                'nombre_comercial'    => $nombre_comercial,
                'direccion'           => $direccion,
                'telefono'            => $telefono,
                'email'               => $email,
            ];
            $instance->query($queryEmpresa, $paramsEmpresa);
            $instance->commit();
            return true;

        }catch (Exception $e){
            $instance->rollback();
            throw $e;
        }
    }
}
