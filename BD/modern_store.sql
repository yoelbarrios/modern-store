-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2020 a las 21:09:49
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modern_store`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(3, 'ratones'),
(5, 'smartphones'),
(6, 'tablets'),
(14, 'Sillas'),
(16, 'Ordenadores'),
(17, 'Altavoces'),
(18, 'Video Juegos'),
(19, 'Portatiles'),
(20, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(4) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prioridad` int(1) NOT NULL,
  `id_producto` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `nombre`, `prioridad`, `id_producto`) VALUES
(36, '1595696144_01.jpg', 1, 0),
(37, '1595696144_02.jpg', 2, 0),
(38, '1595696144_03.jpg', 3, 0),
(39, '1595696289_01.jpg', 1, 0),
(40, '1595696289_02.jpg', 2, 0),
(41, '1595696289_03.jpg', 3, 0),
(42, '1595696301_01.jpg', 1, 0),
(43, '1595696301_02.jpg', 2, 0),
(44, '1595696301_03.jpg', 3, 0),
(51, '1595696763_01.jpg', 1, 0),
(52, '1595696763_02.jpg', 2, 0),
(53, '1595696763_03.jpg', 3, 0),
(54, '1595696867_01.jpg', 1, 0),
(55, '1595696867_02.jpg', 2, 0),
(56, '1595696867_03.jpg', 3, 0),
(57, '1595697048_01.jpg', 1, 0),
(58, '1595697048_02.jpg', 2, 0),
(59, '1595697048_03.jpg', 3, 0),
(60, '1595697073_01.jpg', 1, 0),
(61, '1595697073_02.jpg', 2, 0),
(62, '1595697073_03.jpg', 3, 0),
(63, '1595697933_01.jpg', 1, 54),
(64, '1595697933_02.jpg', 2, 54),
(65, '1595697933_03.jpg', 3, 54),
(66, '1595698018_01.jpg', 1, 55),
(67, '1595698018_02.jpg', 2, 55),
(68, '1595698018_03.jpg', 3, 55),
(69, '1595698106_01.jpg', 1, 56),
(70, '1595698106_02.jpg', 2, 56),
(71, '1595698106_03.jpg', 3, 56),
(72, '1595698272_01.jpg', 1, 57),
(73, '1595698272_02.jpg', 2, 57),
(74, '1595698272_03.jpg', 3, 57),
(75, '1595698368_01.jpg', 1, 58),
(76, '1595698368_02.jpg', 2, 58),
(77, '1595698368_03.png', 3, 58),
(78, '1595698473_01.jpg', 1, 59),
(79, '1595698473_02.jpg', 2, 59),
(80, '1595698473_03.jpg', 3, 59),
(81, '1595698562_01.jpg', 1, 60),
(82, '1595698562_02.jpg', 2, 60),
(83, '1595698562_03.jpg', 3, 60),
(84, '1595698623_01.jpg', 1, 61),
(85, '1595698623_02.png', 2, 61),
(86, '1595698623_03.png', 3, 61),
(87, '1595698761_01.jpg', 1, 62),
(88, '1595698761_02.jpg', 2, 62),
(89, '1595698761_03.jpg', 3, 62),
(90, '1595698812_01.jpg', 1, 63),
(91, '1595698812_02.jpg', 2, 63),
(92, '1595698812_03.jpg', 3, 63),
(93, '1595698892_01.jpg', 1, 64),
(94, '1595698892_02.jpg', 2, 64),
(95, '1595698892_03.jpg', 3, 64),
(96, '1595698955_01.jpg', 1, 65),
(97, '1595698955_02.jpg', 2, 65),
(98, '1595698955_03.jpg', 3, 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(3) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(2) NOT NULL,
  `inicio` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `descripcion`, `id_categoria`, `inicio`) VALUES
(54, 'Asus Rog phone 2', 3000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 0),
(55, 'Moto z4 play', 2800, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 0),
(56, 'Moto g8 play', 2800, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 0),
(57, 'Motorola One Macro', 2900, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 1),
(58, 'Nubia Red magic 3', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 0),
(59, 'Surface pro 3', 3500, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 1),
(60, 'Tabler MIIX 310', 1200, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 6, 1),
(61, 'iPad pro 11', 2800, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 6, 0),
(62, 'Laptop HP Pavilion', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 19, 0),
(63, 'Asus Rog Strix', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 19, 1),
(64, 'Asus Rog Zephyrus', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 19, 1),
(65, 'Laptop msi GF63', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 19, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
