<?php

namespace app\models\Admin;

use core\Model;
use PDO;

class Usuarios extends Model
{
    protected $table = 'usuarios';

    public function registrar($data)
    {
        $sql = "INSERT INTO {$this->table} (rol_id, nombre, apellidos, email, password_hash, telefono, activo) VALUES (:rol_id, :nombre, :apellidos, :email, :password_hash, :telefono, :activo)";
        $params = [
            ':rol_id'        => $data['rol_id'],
            ':nombre'        => $data['nombre'],
            ':apellidos'     => $data['apellidos'],
            ':email'         => $data['email'],
            ':password_hash' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':telefono'      => !empty($data['telefono']) ? $data['telefono'] : null,
            ':activo'        => $data['activo']
        ];
        $preparado = self::$db->prepare($sql);
        return $preparado->execute($params);
    }

    public function buscar()
    {
        $sql = "SELECT u.*, r.nombre AS rol_nombre FROM {$this->table} u INNER JOIN roles r ON u.rol_id = r.id";
        $preparado = self::$db->prepare($sql);
        $preparado->execute();
        return $preparado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ver(Int $id)
    {
        $params = [':id' => $id];
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $preparado = self::$db->prepare($sql);
        $preparado->execute($params);
        return $preparado->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($data)
    {
        $params = [
            ':rol_id'    => $data['rol_id'],
            ':nombre'    => $data['nombre'],
            ':apellidos' => $data['apellidos'],
            ':email'     => $data['email'],
            ':telefono'  => !empty($data['telefono']) ? $data['telefono'] : null,
            ':activo'    => $data['activo'],
            ':id'        => $data['id']
        ];

        if (!empty($data['password'])) {
            $sql = "UPDATE {$this->table} SET rol_id = :rol_id, nombre = :nombre, apellidos = :apellidos,  email = :email, password_hash = :password_hash, telefono = :telefono, activo = :activo WHERE id = :id";
            $params[':password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            $sql = "UPDATE {$this->table} SET rol_id = :rol_id, nombre = :nombre, apellidos = :apellidos, email = :email, telefono = :telefono, activo = :activo  WHERE id = :id";
        }

        $preparado = self::$db->prepare($sql);
        return $preparado->execute($params);
    }

    public function eliminar(Int $id){}
}