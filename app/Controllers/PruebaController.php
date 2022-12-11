<?php

namespace App\Controllers;
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


    //METHODS PEDIDOS

    public function createpedido(){
        $model = model(PedidosModel::class);
        $data= [
            'pedido_nombre_cliente' =>$this->request->getVar('pedido_nombre_cliente'),
            'pedido_fecha_pedido' =>$this->request->getVar('pedido_fecha_pedido'),
        ];
        $model->insert($data);
        //Para mostrar el id
        $id = $model->getInsertID();
        return $this->respond($data);
    }

       public function getpedido()
    {
        $pedidosModel = new PedidosModel();
        $pedidosData = $pedidosModel->findAll();
        $response = [
            'statusCode' => 200,
            'data' => $pedidosData
        ];
        return $this->respond($response, 200);
    }

    //METHODS CREAR PEDIDO DE PRODUCTOS DE CLIENTE
 
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

    public function __construct()
    {
        $this->pedidosdetalleModel = new PedidosdetalleModel();
    }

    public function getpedidosdetalle()
    {
       
        $pedidosdetalleData = $this->pedidosdetalleModel->select('pedidos_detalle.*, pedidos.*, productos.*')
        ->join('pedidos','pedidos.pedido_id = pedidos_detalle.pedido_id')
        ->join('productos','productos.producto_id = pedidos_detalle.producto_id');
        
        $prueba = $pedidosdetalleData->findAll();

      $detallepedidos = array_map(function ($detalle){

           return 
           [
               'pedidos_detalle_id' => $detalle->pedidos_detalle_id,
               'pedido' => [
                   'pedido_id' => $detalle->pedido_id, 
                   'pedido_nombre_cliente' =>$detalle->pedido_nombre_cliente,
                   'pedido_fecha_pedido' =>$detalle->pedido_fecha_pedido
               ], 
               'producto' => [
                   'producto_id' => $detalle->producto_id,
                   'producto_nombre' => $detalle->producto_nombre,
                   'producto_descripcion' => $detalle->producto_descripcion,
                   'producto_imagen_url' => $detalle->producto_imagen_url,
                   'producto_precio' => $detalle->producto_precio,

               ]
    
           ];

       } 
       ,$prueba);

        $response = [
            'statusCode' => 200,
            'data' => $detallepedidos
        ];
        return $this->respond($response, 200);
    }


    //PARA RETORNAR LA VISTA PARA CONSUMIR API UTILIZANDO AJAX
    public function index(){
        return view('index.php');
    }



    
}
