<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\Categorias;
use App\Models\Admin\Productos;

class ProductosController extends Controller
{

    protected $categoriasModel;
    protected $productosModel;
    public function __construct()
    {
        $this->categoriasModel = new Categorias();
        $this->productosModel = new Productos();
    }


    //muestra pagina principal de listado de productos

    public function index()
    {
        $productos = $this->productosModel->buscar();
        //envi a la vista el modulo actual y el titulo de la pagina
         $this->view('admin/productos/index', [
            'isAdmin'   => true,
            'productos' => $productos,
            'module'    => 'admin',
            'pageTitle' => 'Productos',
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
            'categorias' => $categorias
        ]);
        exit;
    }
public function guardar(){
    $data = $_POST;

    //validar datos
    if(!empty($data['categoria']) && !empty($data['codigo']) && !empty($data['nombre']) && !empty($data['descripcion']) && !empty($data['precio']) && !empty($data['stock'])){

        //guardar producto
        //llamar al modelo de productos para guardar el producto en la base de datos
        $resultado = $this->productosModel->registar($data);

        //notificar al usuario si se guardo correctamente o no
        
        if($resultado){
            $_SESSION['flash_success'] = 'Producto registrado correctamente';
            //redireccionar a la lista de productos
            header('Location: ' . BASE_URL . '/admin/productos');
        }else{
            //notificar al usuario que hubo un error al guardar el producto
            $_SESSION['flash_error'] = 'Error al registrar el producto';
            //redireccionar al formulario de nuevo producto
            header('Location: ' . BASE_URL . '/admin/productos/nuevo');
     }

    }else{
        header('Location: ' . BASE_URL . '/admin/productos/nuevo');
    }
  }
}