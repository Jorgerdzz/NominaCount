<?php

class Vacacion extends Database
{

    public static function getVacaciones()
    {
        $instance = self::getInstance();
        $query = "SELECT * FROM vacaciones;";
        return $instance->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

}
