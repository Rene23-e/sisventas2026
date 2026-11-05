<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\Usuarios;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarioModel = new Usuarios();
        $usuarios = $usuarioModel->buscar();

        $this->view('admin/usuarios/index', [
            'module'    => 'admin',
            'pageTitle' => 'Usuarios',
            'usuarios'  => $usuarios
        ]);
        exit;
    }

    public function nuevo()
    {
        $this->view('admin/usuarios/nuevo', [
            'module'    => 'admin',
            'pageTitle' => 'Nuevo Usuario'
        ]);
        exit;
    }

    public function editar($id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: ' . BASE_URL . '/admin/usuarios');
            exit;
        }

        $usuarioModel = new Usuarios();
        $usuario = $usuarioModel->ver($id);

        if (!$usuario) {
            $_SESSION['flash_error'] = 'No se encontró el usuario.';
            header('Location: ' . BASE_URL . '/admin/usuarios');
            exit;
        }

        $this->view('admin/usuarios/editar', [
            'module'    => 'admin',
            'pageTitle' => 'Editar Usuario',
            'usuario'   => $usuario
        ]);
        exit;
    }

    public function guardar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/admin/usuarios');
            exit;
        }

        $datos = [
            'rol_id'    => filter_input(INPUT_POST, 'rol_id', FILTER_VALIDATE_INT),
            'nombre'    => trim($_POST['nombre'] ?? ''),
            'apellidos' => trim($_POST['apellidos'] ?? ''),
            'email'     => trim($_POST['email'] ?? ''),
            'password'  => $_POST['password'] ?? '',
            'telefono'  => trim($_POST['telefono'] ?? ''),
            'activo'    => isset($_POST['activo']) && $_POST['activo'] === '0' ? 0 : 1
        ];

        if (
            !$datos['rol_id'] ||
            $datos['nombre'] === '' ||
            $datos['apellidos'] === '' ||
            !filter_var($datos['email'], FILTER_VALIDATE_EMAIL) ||
            $datos['password'] === ''
        ) {
            $_SESSION['flash_error'] = 'Completa todos los campos obligatorios con datos válidos.';
            header('Location: ' . BASE_URL . '/admin/usuarios/nuevo');
            exit;
        }

        $usuarioModel = new Usuarios();
        if ($usuarioModel->registrar($datos)) {
            $_SESSION['flash_success'] = 'Usuario registrado correctamente.';
            header('Location: ' . BASE_URL . '/admin/usuarios');
        } else {
            $_SESSION['flash_error'] = 'No se pudo registrar el usuario.';
            header('Location: ' . BASE_URL . '/admin/usuarios/nuevo');
        }
        exit;
    }

    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/admin/usuarios');
            exit;
        }

        $datos = [
            'id'        => filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT),
            'rol_id'    => filter_input(INPUT_POST, 'rol_id', FILTER_VALIDATE_INT),
            'nombre'    => trim($_POST['nombre'] ?? ''),
            'apellidos' => trim($_POST['apellidos'] ?? ''),
            'email'     => trim($_POST['email'] ?? ''),
            'password'  => $_POST['password'] ?? '',
            'telefono'  => trim($_POST['telefono'] ?? ''),
            'activo'    => isset($_POST['activo']) && $_POST['activo'] === '0' ? 0 : 1
        ];

        if (
            !$datos['id'] ||
            !$datos['rol_id'] ||
            $datos['nombre'] === '' ||
            $datos['apellidos'] === '' ||
            !filter_var($datos['email'], FILTER_VALIDATE_EMAIL)
        ) {
            $_SESSION['flash_error'] = 'Datos inválidos para actualizar el usuario.';
            header('Location: ' . BASE_URL . '/admin/usuarios');
            exit;
        }

        $usuarioModel = new Usuarios();
        if ($usuarioModel->actualizar($datos)) {
            $_SESSION['flash_success'] = 'Usuario actualizado correctamente.';
        } else {
            $_SESSION['flash_error'] = 'No se pudo actualizar el usuario.';
        }

        header('Location: ' . BASE_URL . '/admin/usuarios');
        exit;
    }

    public function eliminar($id)
    {
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) { $usuarioModel = new Usuarios();
         $usuarioModel->eliminar($id);
        }

        header('Location: ' . BASE_URL . '/admin/usuarios');
        exit; 
    }
    
}