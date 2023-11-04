-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-11-2023 a las 13:14:11
-- Versión del servidor: 8.0.34-cll-lve
-- Versión de PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gelohimg9_elohim`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_ventas`
--

CREATE TABLE `detalles_ventas` (
  `id` int NOT NULL,
  `cantidad` int DEFAULT NULL,
  `id_producto` int DEFAULT NULL,
  `id_venta` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalles_ventas`
--

INSERT INTO `detalles_ventas` (`id`, `cantidad`, `id_producto`, `id_venta`) VALUES
(3, 1, 1, 21),
(4, 1, 1, 22),
(5, 1, 1, 23),
(6, 1, 2, 24),
(7, 1, 1, 25),
(8, 5, 1, 26),
(9, 1, 3, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoproducts`
--

CREATE TABLE `fotoproducts` (
  `id` int NOT NULL,
  `products_id` int DEFAULT NULL,
  `foto1` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto2` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto3` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fotoproducts`
--

INSERT INTO `fotoproducts` (`id`, `products_id`, `foto1`, `foto2`, `foto3`) VALUES
(1, 1, 'https://i.postimg.cc/VvCv67C7/Imagen-de-Whats-App-2023-10-16-a-las-13-43-02-b362dc4c-2.jpg', NULL, NULL),
(2, 2, 'https://i.postimg.cc/05bt8ht8/Imagen-de-Whats-App-2023-10-16-a-las-13-43-48-4766a1a8.jpg', NULL, NULL),
(3, 3, 'https://i.postimg.cc/2SKyfb3j/Imagen-de-Whats-App-2023-10-16-a-las-13-43-52-de1255ce.jpg', NULL, NULL),
(4, 4, 'https://i.postimg.cc/PJShz9wf/Imagen-de-Whats-App-2023-10-16-a-las-13-43-55-c94d8def.jpg', NULL, NULL),
(5, 5, 'https://i.postimg.cc/xCRSnhgG/Imagen-de-Whats-App-2023-10-16-a-las-13-43-59-5c8dc29c.jpg', NULL, NULL),
(6, 6, 'https://i.postimg.cc/h42qwFXc/Imagen-de-Whats-App-2023-10-16-a-las-13-44-27-6c1ef703.jpg', NULL, NULL),
(7, 7, 'https://i.postimg.cc/rmqvngcD/Imagen-de-Whats-App-2023-10-16-a-las-13-44-29-6e6178f5.jpg', NULL, NULL),
(8, 8, 'https://i.postimg.cc/BvBzKDD4/Imagen-de-Whats-App-2023-10-16-a-las-13-44-32-2a7be15b.jpg', NULL, NULL),
(9, 9, 'https://i.postimg.cc/mDd6ds8n/Imagen-de-Whats-App-2023-10-16-a-las-13-44-32-e8d07102.jpg', NULL, NULL),
(10, 10, 'https://i.postimg.cc/xdVrHn4y/Imagen-de-Whats-App-2023-10-16-a-las-13-44-27-6475b3e9.jpg', NULL, NULL),
(11, 11, 'fotosProductos/11/1.webp', NULL, NULL),
(12, 12, 'fotosProductos/12/1.webp', NULL, NULL),
(13, 13, 'fotosProductos/13/1.webp', NULL, NULL),
(14, 14, 'fotosProductos/14/1.webp', NULL, NULL),
(15, 15, 'fotosProductos/15/1.webp', NULL, NULL),
(16, 16, 'fotosProductos/16/1.webp', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidostemporales`
--

CREATE TABLE `pedidostemporales` (
  `id` int NOT NULL,
  `producto_id` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `tokenCliente` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidostemporales`
--

INSERT INTO `pedidostemporales` (`id`, `producto_id`, `cantidad`, `tokenCliente`, `fecha`) VALUES
(51, 1, 1, 'rq4RXhE7QeH2M3Z4NYNmrXvrtEWWxVQ2', '2023-10-16 06:00:16'),
(52, 2, 1, 'agM9vngj0gj8k484DHRa6DN6AJCmQXYM', '2023-10-16 06:40:21'),
(54, 1, 3, 'Md0qKqMDncCHAWnTYrZqHE0zBWrVpHwT', '2023-10-16 21:28:55'),
(55, 2, 1, 'Md0qKqMDncCHAWnTYrZqHE0zBWrVpHwT', '2023-10-16 21:29:27'),
(56, 1, 5, 'bJvuJU3k2Vu4N7eTvE8af8w4qVV8XWxw', '2023-10-18 14:13:03'),
(59, 12, 2, 'aY92u9pFED0zYgCZxXvcnPB479AJcWCN', '2023-10-18 21:20:26'),
(60, 1, 2, 'aY92u9pFED0zYgCZxXvcnPB479AJcWCN', '2023-10-18 21:21:01'),
(61, 3, 1, 'aY92u9pFED0zYgCZxXvcnPB479AJcWCN', '2023-10-18 21:21:37'),
(62, 2, 1, 'aY92u9pFED0zYgCZxXvcnPB479AJcWCN', '2023-10-18 21:22:03'),
(63, 1, 1, '0nXwiAbehZVWNuGNiUJxRMhDqkb2MM29', '2023-10-19 17:10:59'),
(65, 3, 1, 'RkMtaWrU0NGwAYn7P6M3KZGNpCQuE4N0', '2023-10-19 17:29:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `nameProd` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `precio` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_Prod` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nameProd`, `precio`, `description_Prod`) VALUES
(1, 'Pan de Maíz', '2500', 'Delicioso pan de maíz recién horneado, perfecto para el desayuno o la merienda.'),
(2, 'Arepas Rellenas', '3200', 'Arepas doraditas rellenas de queso, chicharrón y guacamole. ¡Una explosión de sabor!'),
(3, 'Rosca de Queso', '4500', 'Una rosca suave y esponjosa, rellena de queso fresco. Irresistible.'),
(4, 'Croissants de Chocolate', '3800', 'Croissants crujientes rellenos de chocolate derretido. Pura indulgencia.'),
(5, 'Almojábanas', '2800', 'Almojábanas calientes y esponjosas, ideales para acompañar con café o chocolate caliente.'),
(6, 'Empanadas de Carne', '2900', 'Empanadas rellenas de carne molida sazonada, una deliciosa opción para cualquier momento del día.'),
(7, 'Torta de Tres Leches', '5500', 'Nuestra famosa torta de tres leches, empapada en una mezcla de leche condensada, evaporada y crema.'),
(8, 'Galletas de Avena', '2200', 'Galletas saludables de avena con trozos de frutas secas y nueces.'),
(9, 'Muffins de Arándanos', '3200', 'Muffins esponjosos repletos de jugosos arándanos. Una delicia para el paladar.'),
(10, 'Pandequeso', '2600', 'Pequeñas bolitas de queso horneadas hasta obtener una textura crujiente por fuera y suave por dentro.'),
(11, 'Palitos de Queso', '2700', 'Palitos de pan horneados con queso derretido en su interior, ideales como aperitivo.'),
(12, 'Pastelitos de Piña', '4000', 'Deliciosos pastelitos rellenos de piña y azúcar moreno, perfectos para el postre.'),
(13, 'Cuñapes', '2900', 'Cuñapes frescos y esponjosos, una delicia boliviana con queso y almidón de yuca.'),
(14, 'Torta de Chocolate', '4800', 'Torta de chocolate rica y decadente, cubierta con ganache de chocolate.'),
(15, 'Pan Integral', '3500', 'Pan integral recién horneado, rico en fibra y sabor para una alimentación saludable.'),
(16, 'Deditos de Queso', '2700', 'Deditos crujientes de queso, perfectos para compartir o disfrutar en solitario.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `tipo_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contraseña`, `tipo_usuario`) VALUES
(28, 'juan', 'juantorres@gmal.com', 'tienda12', 1),
(29, 'juan', 'admin1@elohim.com', 'elohim23', 2),
(30, 'Juan Pablo Madrigal Castañeda ', 'juanmarcas2013@hotmail.es', 'JPMC1312', 1),
(31, 'Juan ', 'juansebastiantorresherrera0@gmail.com', 'tienda12', 1),
(32, 'Jsjaja', 'juantorres@gmail.com', 'jsjsjs', 1),
(33, 'Juan ', 'juansebastiantorresherrera@gmail.com', 'tienda12', 1),
(34, 'Vergara', 'neiderxavier@gmail.com', '123456789', 1),
(35, 'Jheral ', 'jheralcardenas12345@gmail.com', '3045759635', 1),
(36, 'Juan', 'juan_k1@hotmail.com', '12345', 1),
(37, 'juan', 'juan12@gamil.com', 'tienda12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int NOT NULL,
  `factura` varchar(255) DEFAULT NULL,
  `total_venta` float DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `metodo_pago` varchar(255) DEFAULT NULL,
  `id_cliente` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `factura`, `total_venta`, `direccion`, `fecha_hora`, `metodo_pago`, `id_cliente`) VALUES
(21, '1697436031163', 2.5, 'csf', '2023-10-16 01:00:31', 'efectivo', 28),
(22, '1697436443502', 2.5, 'csf', '2023-10-16 01:07:23', 'efectivo', 28),
(23, '1697436464510', 2.5, 'ft54', '2023-10-16 01:07:44', 'efectivo', 28),
(24, '1697438429036', 3.2, 'gfdsfd', '2023-10-16 01:40:29', 'efectivo', 28),
(25, '1697442208677', 2.5, 'hghjg', '2023-10-16 02:43:28', 'transferecia', 28),
(26, '1697638435100', 12.5, 'Poli', '2023-10-18 09:13:54', 'tarjeta', 33),
(27, '1697736586371', 4.5, 'csda', '2023-10-19 12:29:46', 'tarjeta', 37);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `fotoproducts`
--
ALTER TABLE `fotoproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidostemporales`
--
ALTER TABLE `pedidostemporales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `fotoproducts`
--
ALTER TABLE `fotoproducts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pedidostemporales`
--
ALTER TABLE `pedidostemporales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_ventas`
--
ALTER TABLE `detalles_ventas`
  ADD CONSTRAINT `detalles_ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `detalles_ventas_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
