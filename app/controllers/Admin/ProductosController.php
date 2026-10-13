<?php

namespace App\Controllers\Admin;

use Core\Controller;

use App\Models\Admin\Categorias;

class ProductosController extends Controller
{

    protected $categoriasModel;
    public function __construct()
    {
        $this->categoriasModel = new Categorias();
    }


    //muestra pagina principal de listado de productos

    public function index()
    {
        //envi a la vista el modulo actual y el titulo de la pagina
        $this->view('admin/productos/index', [
            'isAdmin'   => true,
        ]);
        exit;
    }
    public function nuevo()
    {
        //estas categorias se utilizan para llenar en selector del formulario
        $categorias = $this->categoriasModel->categorias_select();
        //var_dump($categorias); // Agrega esta línea para depuración//
        //envia a la vista los datos necesarios para renderizar el formulaio 
        $this->view('admin/productos/nuevo', [
            'isAdmin'   => true,
            'module'    => 'admin',
            'pageTitle' => 'Nuevo Producto',
            'module'    => 'admin',
            'pageTitle' => 'Productos',
            'categorias' => $categorias
        ]);
        exit;
    }
}
