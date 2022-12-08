create database prueba_raul;
use prueba_raul;

CREATE TABLE productos(
producto_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
producto_nombre VARCHAR(100)UNIQUE NOT NULL,
producto_descripcion VARCHAR(200) NOT NULL,
producto_imagen_url TEXT NOT NULL,
producto_precio VARCHAR(10) NOT NULL,
PRIMARY KEY(producto_id)
);

CREATE TABLE pedidos(
pedido_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
pedido_nombre_cliente VARCHAR(50) NOT NULL,
pedido_fecha_pedido DATE NOT NULL,
PRIMARY KEY(pedido_id)
);

CREATE TABLE pedidos_detalle(
pedidos_detalle_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
pedido_id INT UNSIGNED NOT NULL,
producto_id INT UNSIGNED NOT NULL,
CONSTRAINT fk_pedidosdetalles_pedidos FOREIGN KEY (pedido_id) REFERENCES pedidos(pedido_id),
CONSTRAINT fk_pedidosdetalles_productos FOREIGN KEY(producto_id) REFERENCES productos(producto_id),
PRIMARY KEY(pedidos_detalle_id)
);
