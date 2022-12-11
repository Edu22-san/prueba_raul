<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/producto.css'); ?>">
    <title>Editar Producto</title>
</head>

<body>
    <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="<?= base_url('viewproducto') ?>">Productos</a></li>
    </ul>
    <div class="container-sm mt-5">
        <div class="card">
            <div class="card-header bg-dark text-white ">
                <h1>EDITAR</h1>
            </div>
            <div class="card-body">
                <form method="post" id="updateactionproducto" name="updateactionproducto" action="<?= site_url('/updateactionproducto') ?>">
                    <input type="hidden" name="producto_id" id="id" value="<?php echo $producto_obj->producto_id; ?>">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="producto_nombre" class="form-control" value="<?php echo $producto_obj->producto_nombre; ?>">
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" name="producto_descripcion" class="form-control" value="<?php echo $producto_obj->producto_descripcion; ?>">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="text" name="producto_precio" class="form-control" value="<?php echo $producto_obj->producto_precio; ?>">
                    </div>

                    <div class="group-buttons">
                        <button type="button" onclick="window.history.back()" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>

</body>

</html>