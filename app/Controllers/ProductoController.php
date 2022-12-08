<?php
namespace App\Controllers;
use App\Models\ProductosModel;
use CodeIgniter\API\ResponseTrait;
use Config\Services;

class ProductoController extends BaseController{

    use ResponseTrait;

    public function viewProducto(){
        $model = model(ProductosModel::class);
        $data=[
            'productos'=> $model->paginate(4),
            'pager'=> $model->pager
        ];
        return view('productos/ver',$data);
    }

    public function createProducto(){

        return view('productos/crearproducto');
    }

   public function createActionProducto(){
       $model = model(ProductosModel::class);
       $data = [
           'producto_nombre' =>$this->request->getVar('producto_nombre'),
           'producto_descripcion' =>$this->request->getVar('producto_descripcion'),
           'producto_imagen_url' =>$this->request->getVar('producto_imagen_url'),
           'producto_precio' =>$this->request->getVar('producto_precio'),

       ];
       $model->insert($data);
       return $this->response->redirect(site_url('/viewproducto'));
    }

    public function delete($id = null){
        $model = model(ProductosModel::class);
        $data['delete'] = $model->where('producto_id', $id)->delete($id);
        return $this->response->redirect(site_url('/viewproducto'));
    }

   

}






?>