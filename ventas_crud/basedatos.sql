create database `bdnike`;

use `bdnike`;

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

CREATE TABLE `ventas` (
  `id_venta` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `producto` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_cajero` int(100) NOT NULL,
  `id_cliente` int(100) NOT NULL,
  `no_factura` int(100) NOT NULL,
  `id` int(11) NOT NULL,
    PRIMARY KEY  (`id_venta`),
  CONSTRAINT FK_products_1
  FOREIGN KEY (id) REFERENCES usuarios(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;