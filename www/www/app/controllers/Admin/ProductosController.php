<?php
namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\Categorias;

class ProductosController extends Controller
{
    protected $categoriasModel;
    public function __construct() {
    //Inicializa el modelo de Categorias para poder usarlos
        $this->categoriasModel = new Categorias();
    }
    //Muestra la pagina principal con el listado de productos.
    public function index()
    {
        // Envia
        $this->view('admin/productos/index', [
            'isAdmin'  => true,
            'module'    => 'admin',
            'pageTitle' => 'Productos'
        ]);
        exit;
    }
    // Muestra el formulario para crear un nuevo producto.
    public function nuevo(){
        // Estas categorias de utilixzan para llenar el selector del fo
        $categorias = $this->categoriasModel->categorias_select(); 
        var_dump($categorias); 

        //Envia a la vista de los datos necesarios para renderizar el fo
        $this->view('admin/productos/nuevo', [
            'isAdmin'  => true,
            'module'    => 'admin',
            'pageTitle' => 'Nuevo Producto',
            'categorias' => $categorias
        ]);
        exit;
    }
}