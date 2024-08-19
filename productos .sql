-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2024 a las 01:31:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `tipo_producto` varchar(50) DEFAULT NULL,
  `categoria_producto` varchar(50) DEFAULT NULL,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `imagen_producto` varchar(255) DEFAULT NULL,
  `precio_producto` decimal(10,2) DEFAULT NULL,
  `cuotas` varchar(5) DEFAULT NULL,
  `oferta` varchar(5) DEFAULT NULL,
  `envio_gratis` varchar(5) DEFAULT NULL,
  `marca_producto` varchar(50) DEFAULT NULL,
  `genero_producto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `tipo_producto`, `categoria_producto`, `nombre_producto`, `imagen_producto`, `precio_producto`, `cuotas`, `oferta`, `envio_gratis`, `marca_producto`, `genero_producto`) VALUES
(2, 'indumentaria', 'pantalon', '6767', 'uploads/colta.png', 6767676.00, 'no', 'no', 'no', 'nike', 'hombre'),
(3, 'indumentaria', 'pantalon', 'Pantalon Cargo', 'uploads/pantalon.jpg', 27500.00, 'si', 'no', 'si', 'adidas', 'unisex'),
(4, 'deporte', 'básquet', 'Pelota de basquet', 'uploads/colta.png', 33.00, 'si', 'no', 'no', 'adidas', 'no_aplica'),
(5, 'indumentaria', 'pantalon', 'thiago putazo', 'uploads/zapatillas.jpg', 10000.00, 'no', 'si', 'si', 'nike', 'mujer'),
(6, 'indumentaria', 'zapatillas', 'Campera Deportiva Training', 'uploads/camperadeportiva.jfif', 49400.00, 'si', 'si', 'si', 'adidas', 'mujer'),
(7, 'deporte', 'rugby', 'Pelota de rugby', 'uploads/logo.jpg', 353535.00, 'si', 'si', 'si', 'adidas', 'hombre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
