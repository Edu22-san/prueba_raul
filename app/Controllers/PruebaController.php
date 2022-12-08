<?php

namespace App\Controllers;

use App\Entities\PedidosdetalleEntity;
use App\Entities\ProductosEntity;
use App\Models\PedidosdetalleModel;
use App\Models\PedidosModel;
use App\Models\ProductosModel;
use CodeIgniter\API\ResponseTrait;

class PruebaController extends BaseController
{

    use ResponseTrait;

//METHODS PRODUCTOS
    public function createproducto()
    {
        $productosModel = new ProductosModel();
        $productosentity = new ProductosEntity();
        $productos = $this->request->getVar();
        
        if (!$this->validate($productosModel->rules)) {
            $errors = $this->validator->getErrors();
            $response = [
                'statusCode' => 400,
                'errors' => $errors
            ];
            return $this->respond($response, 400);
        } else {
            $productosModel->save($productos);
            $response = [
                'statusCode' => 201,
                'data' => $productos
            ];
            return $this->respond($response, 201);
        }
    }

    public function getproducto()
    {
        $productosModel = new ProductosModel();
        $productosData = $productosModel->findAll();
        $response = [
            'statusCode' => 200,
            'data' => $productosData
        ];
        return $this->respond($response, 200);
    }

    //METHODS CREAR PEDIDO DE PRODUCTOS DE CLIENTE

    public function createPedidosdetalle(){
        $pedidosModel = new PedidosModel();
        $productosModel = new ProductosModel();
        $pedidos = $pedidosModel->where('pedidos.pedido_nombre_cliente !=')->findAll();
        $productos = $productosModel->where('productos.producto_nombre !=')->findAll();
        return $this->respond($pedidos['response'], $productos['response']);
    }

    
    public function createActionPedidosdetalle()
    {
        $PedidosdetalleModel = new PedidosdetalleModel();
        $model = new PruebaController();
        $model = $this->request->getVar();
        $PedidosdetalleModel->save($model);
        $response = [
            'statusCode' => 201,
            'data' => $model
        ];
        return $this->respond($response, 201);
    }


    //PARA RETORNAR LA VISTA PARA CONSUMIR API UTILIZANDO AJAX
    public function index(){
        return view('index.php');
    }



    
}
