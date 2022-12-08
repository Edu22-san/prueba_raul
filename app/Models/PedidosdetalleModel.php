<?php

namespace App\Models;

use App\Entities\PedidosdetalleEntity;
use CodeIgniter\Model;

class PedidosdetalleModel extends Model
{
    protected $table = "pedidos_detalle";
    protected $primaryKey = 'pedidos_detalle_id';
    protected $returnType = PedidosdetalleEntity::class;
    protected $allowedFields = ["pedido_id",
                                "producto_id", ];
    public $rules = [
        

        
    ];

    public $rulesUpdate = [];
}
