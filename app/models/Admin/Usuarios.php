<?php

namespace App\Models\Admin;

use Core\Model;
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

    public function ver(int $id)
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

        $sql = "UPDATE {$this->table}
                SET rol_id = :rol_id,
                    nombre = :nombre,
                    apellidos = :apellidos,
                    email = :email,
                    telefono = :telefono,
                    activo = :activo";

        if (!empty($data['password'])) {
            $params[':password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $sql .= ", password_hash = :password_hash";
        }

        $sql .= " WHERE id = :id";

        $preparado = self::$db->prepare($sql);
        return $preparado->execute($params);
    }

  public function eliminar($id)
    {
        self::$db->beginTransaction();

        try {
            $sql = "UPDATE {$this->table} SET activo = 0 WHERE id = :id AND activo = 1";
            $stmt = self::$db->prepare($sql);
            $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                self::$db->rollBack();
                return false;
            }

            $stmt = self::$db->prepare(
                'UPDATE sesiones SET activa = 0 WHERE usuario_id = :id AND activa = 1'
            );
            $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $stmt->execute();
            self::$db->commit();

            return true;
        } catch (\Throwable $exception) {
            if (self::$db->inTransaction()) {
                self::$db->rollBack();
            }
            throw $exception;
        }
    }
}