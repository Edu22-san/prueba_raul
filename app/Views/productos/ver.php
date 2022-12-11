<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/producto.css'); ?>">
    <title>Ver Productos</title>
</head>

<body>
    <ul>
        <li><a class="active" href="#home">Home</a></li>

        <li><a href="<?= base_url('viewproducto') ?>">Productos</a></li>
    </ul>
    <div class="container">
        <div class="card-content">
            <div class="card-container">
                <h4 class="title-content"><b>VER PRODUCTOS</b></h4>
                <a href="<?php echo site_url('/createProducto') ?>" class="btn-new">Nuevo</a>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                }
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($productos) : ?>
                            <?php foreach ($productos as $productos) : ?>
                                <tr>
                                    <td><?php echo $productos->producto_id; ?></td>
                                    <td><?php echo $productos->producto_nombre ?></td>
                                    <td><?php echo $productos->producto_descripcion ?></td>
                                    <td><img class="imagen" src="<?php echo $productos->producto_imagen_url ?>" alt=""></td>
                
                                    <td><?php echo '$'.$productos->producto_precio ?></td>
                                    <td>
                                        <a href="<?php echo base_url('editproducto/' . $productos->producto_id); ?>" class="btn btn-success btn-small">Edit</a>
                                        <a href="<?php echo base_url('deleteproducto/' . $productos->producto_id); ?>" class="btn btn-danger btn-small">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="pagination">
                    <?php if ($pager) : ?>
                        <?php $pagi_path = 'viewproducto'; ?>
                        <?php $pager->setPath($pagi_path); ?>
                        <?= $pager->links() ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>