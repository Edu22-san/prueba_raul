<?php

namespace App\Models;

use App\Entities\ProductosEntity;
use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table = "productos";
    protected $primaryKey = 'producto_id';
    protected $returnType = ProductosEntity::class;
    protected $allowedFields = ["producto_nombre",
                                "producto_descripcion",
                                "producto_imagen_url", 
                                "producto_precio"];
    public $rules = [
        'producto_nombre' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'El campo producto_nombre es requerido',
            ]
        ],

        
    ];

    public $rulesUpdate = [];
}
