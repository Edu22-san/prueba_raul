<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">

</head>

<body>
    <ul>
        <li><a class="active" href="#home">Home</a></li>
    </ul>

    <section id="container-render-card">

    </section>



    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "http://prueba_raul.test/productos",
                dataType: "json",
                success: function(response) {
                    $.each(response.data, function(i, item) {
                        var row = "<article class='container-card'>" +

                            "<p class='campo text-bold'>" + item.producto_nombre + "</p>" +
                            "<p class='campo text-right'>" + "$" + item.producto_precio + "</p>" +
                            "<p class='campo w-full'>" + item.producto_descripcion + "</p>" +
                            "<img class='imagen' src=" + item.producto_imagen_url + ">"
                        "</article>";
                        $("#container-render-card").append(row);
                    });
                },
            });
        });
    </script>
</body>

</html>