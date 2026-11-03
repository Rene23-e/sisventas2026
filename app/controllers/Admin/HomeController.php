<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Core\Model;
use PDO;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $db = (new Model())->getDB();
        $productos = (int) $db->query('SELECT COUNT(*) FROM productos')->fetchColumn();
        $usuarios = (int) $db->query('SELECT COUNT(*) FROM usuarios')->fetchColumn();
        $ventas = (int) $db->query('SELECT COUNT(*) FROM ventas')->fetchColumn();

        $this->view('admin/index', [
            'productos' => $productos,
            'usuarios'  => $usuarios,
            'ventas'    => $ventas,
            'isAdmin'   => true,
            'pageTitle' => 'Sistema de Administración',
            'module'    => 'admin'
        ]);
    }
}
