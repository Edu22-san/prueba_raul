<?php

namespace App\Models;

use App\Entities\PedidosEntity;
use CodeIgniter\Model;

class PedidosModel extends Model
{
    protected $table = "pedidos";
    protected $primaryKey = 'pedido_id';
    protected $returnType = PedidosEntity::class;
    protected $allowedFields = ["pedido_nombre_cliente",
                                "pedido_fecha_pedido", ];
    public $rules = [
        'pedido_nombre_cliente' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo pedido_nombre_cliente es requerido',
            ]
        ],    
    ];

    public $rulesUpdate = [];
}
