-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2020 a las 23:58:18
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
(98, '1595698955_03.jpg', 3, 65),
(99, '1599066865_01.png', 1, 67),
(100, '1599066865_02.png', 2, 67),
(101, '1599066865_03.png', 3, 67),
(102, '1599067121_01.png', 1, 68),
(103, '1599067121_02.png', 2, 68),
(104, '1599067121_03.png', 3, 68),
(105, '1599067372_01.png', 1, 69),
(106, '1599067372_02.png', 2, 69),
(107, '1599067372_03.png', 3, 69),
(108, '1599067699_01.png', 1, 70),
(109, '1599067699_02.png', 2, 70),
(110, '1599067699_03.png', 3, 70),
(111, '1599068164_01.png', 1, 71),
(112, '1599068164_02.png', 2, 71),
(113, '1599068164_03.png', 3, 71),
(114, '1599068596_01.png', 1, 72),
(115, '1599068596_02.png', 2, 72),
(116, '1599068596_03.png', 3, 72);

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
(54, 'Asus Rog phone 2', 3000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 1),
(55, 'Moto z4 play', 2800, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 1),
(56, 'Moto g8 play', 2800, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 1),
(57, 'Motorola One Macro', 2900, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 1),
(58, 'Nubia Red magic 3', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 1),
(59, 'Surface pro 3', 3500, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 5, 1),
(60, 'Tabler MIIX 310', 1200, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 6, 1),
(61, 'iPad pro 11', 2800, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 6, 1),
(62, 'Laptop HP Pavilion', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 19, 1),
(63, 'Asus Rog Strix', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 19, 1),
(64, 'Asus Rog Zephyrus', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 19, 1),
(65, 'Laptop msi GF63', 5000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 19, 1),
(67, 'Silla gamer TECHNISPORT', 599, 'Marca Original: TECHNISPORT (Representantes Oficiales)\r\nEnvios en Caja (Ver video tutorial de armado abajo).\r\nColor:Negro con rojo. \r\nReposa pies \r\nSilla Gamer con estructura de PVC.\r\nInclinación de 180 grados.\r\nCapacidad: 120 kg\r\n2 Almohadas (Cabecera y Columna) Regulable en altura para un mayor comfort.\r\nMaterial Acolchado Recubierto con Cuerina de espesor 9 cm.\r\nIdeales para pasar horas en la computadora bien sea jugando o de trabajo.\r\nApoya brazos con cojín suave en material PU regulable en altura.\r\nMecanismo regulable en altura con gas revestido clase II. \r\nBases de Nylon.\r\n5 Ruedas ligeras y silenciosas en el traslado.\r\nDimensiones de la caja: 80 Largo x 64 Ancho x 53 Profundidad (cm).\r\nDimensiones Silla: Altura : 127 a 137 cm (piso a cabecera) piso a asiento (46 a 56 cm)  profundidad 50 cm ancho 54 cm', 14, 1),
(68, 'Silla gamer DTX-1006-PK', 799, 'Garantía de 1 año.\r\nCuero PU.\r\nEspuma moldeadora de alta densidad.\r\nCapacidad de peso: 150 Kg.\r\nBase de 5 estrellas\r\nReclinación 180° grados.\r\nReposabrazos ajustable.\r\n2 Cojínes lumbares ajustables.', 14, 1),
(69, 'Silla gamer DTX-7007-GR', 799, 'Estructura: Acero \r\nClase de elevación de gas: Clase-4 Gaslift \r\nMaterial de la cubierta de la silla: Cuero PU \r\nTipo de espuma: Espuma moldeadora de alta densidad Densidad de espuma: 55 kg / m³ m Apoyabrazos ajustables: 2D – Arriba y abajo.\r\nÁngulo de inclinación ajustable: 12 grados \r\nÁngulo trasero ajustable: 180°\r\nCojín Lumbar Ajustable + Cojin para nuca. \r\nTipo de base: Base de barra de color de 5 estrellas.\r\nCapacidad de peso: 150 kg \r\nPeso neto: 22 kg \r\nPeso bruto: 25 kg \r\nGarantia: Solo cubre partes no cubre cuero.', 14, 1),
(70, 'Silla gamer Halion Ha-s41', 779, 'Silla de oficina: Diseño Gamer\r\nMarca: HALION\r\nMecanismo: Mariposa\r\nEstructura: Metal\r\nEspuma: Moldeable\r\nDensidad de espuma: 50kg/m3\r\nTapiz: PVU alta calidad -PVC\r\nBrazos: 3D/ Poliuretano / Ajustable\r\nBase: Metal / 350mm\r\nElevador: Gas 80mm\r\nGas-Lif: CLASS-4\r\nInclinación: 90º – 180º\r\nRueda: 6mm\r\nSoporta Peso: 150 kg\r\nAlmohadilla de cabecera\r\nAlmohadilla lumbar', 14, 1),
(71, 'Mouse Gamer Logitech G502 wireless', 359, 'Tipo de mouse Convencional\r\nTipo de sensor HERO™\r\nResolución del sensor 16000 dpi\r\nInterfaces USB', 3, 0),
(72, 'Bocina Xiaomi', 59, 'Connectivity: Bluetooth \r\nSupport Bluetooth Version: 4.2 \r\nSupport Protocol: A2DP / AVRCP / SPP / HFP / BLE \r\nTransmission Distance: 10m \r\nImpedance: 4ohm \r\nFrequency Response: 200 - 18kHz \r\nBattery: Built-in Lithium-ion Battery \r\nBattery Capacity: 3.7V 480mAh ', 17, 0);

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
  MODIFY `id_imagen` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
