<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/producto.css'); ?>">
    <title>Crear Producto</title>
</head>

<body>
    <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="<?= base_url('viewproducto') ?>">Productos</a></li>
    </ul>
    <div class="container-sm mt-5">
        <div class="card">
            <h1 class="card-header bg-dark text-white d-flex justify-content-between align-items-center">REGISTRAR
                <form action="viewproducto/">
                    <input type="submit" class="btn btn-danger btn-sm ml-auto" value="Atras" />
                </form>
            </h1>
            <div class="card-body bg-light">
                <form method="post" id="crearproducto" name="crearproducto" action="<?= site_url('/create-producto-action') ?>">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="producto_nombre" class="form-control" placeholder="nombre de producto...">
                    </div>
                    
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea class="form-control" id="producto_descripcion" name="producto_descripcion" rows="3" placeholder="descripcion..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Imagen URL</label>
                        <input type="url" name="producto_imagen_url" class="form-control" placeholder="url de imagen...">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="text" name="producto_precio" class="form-control" placeholder="precio...">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" >Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>