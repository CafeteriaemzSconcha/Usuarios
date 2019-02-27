-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2019 a las 01:11:56
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cafe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agregados`
--

CREATE TABLE `agregados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agregados`
--

INSERT INTO `agregados` (`id`, `nombre`, `precio`) VALUES
(1, 'Smoothie', 500),
(2, 'Jarabe vainilla', 200),
(3, 'Jarabe caramelo', 200),
(4, 'Jarabe avellanas', 200),
(5, 'Marshmallows', 500),
(6, 'Nutella', 600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agregado_mesa`
--

CREATE TABLE `agregado_mesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_agregado` int(10) UNSIGNED NOT NULL,
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `descuento` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agregado_mesa`
--

INSERT INTO `agregado_mesa` (`id`, `id_agregado`, `id_mesa`, `descuento`) VALUES
(1, 2, 6, 0),
(3, 3, 7, 0),
(11, 1, 20, 0),
(12, 1, 20, 0),
(13, 1, 20, 0),
(14, 3, 20, 0),
(15, 3, 23, 0),
(16, 1, 39, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida`
--

CREATE TABLE `bebida` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bebida`
--

INSERT INTO `bebida` (`id`, `nombre`, `precio`) VALUES
(1, 'Jugo natural durazno', 2500),
(2, 'Jugo natural frambuesa', 2500),
(3, 'Jugo natural frutilla', 2500),
(4, 'Jugo natural mango', 2500),
(5, 'Jugo natural limonada', 2500),
(6, 'Jugo natural limonada - maracuya', 2500),
(7, 'Jugo natural piña', 2500),
(8, 'Jugo natural melon', 2500),
(9, 'Jugo natural sandia', 2500),
(10, 'Jugo natural arandanos', 2500),
(11, 'Coca cola', 1500),
(12, 'Coca cola light', 1500),
(13, 'Coca cola zero', 1500),
(14, 'Fanta', 1500),
(15, 'Fanta zero', 1500),
(16, 'Sprite', 1500),
(17, 'Sprite zero', 1500),
(18, 'Nectar durazno light', 1800),
(19, 'Nectar naranja light', 1800),
(20, 'Nectar piña light', 1800),
(21, 'Benedictino con gas', 1500),
(22, 'Benedictino sin gas', 1500),
(23, 'Batido Arandano', 3000),
(24, 'Batido Durazno', 3000),
(25, 'Batido Frambuesa', 3000),
(26, 'Batido Frutilla', 3000),
(27, 'Batido Limonada', 3000),
(28, 'Batido Limonada Maracuya', 3000),
(29, 'Batido Mango', 3000),
(30, 'Batido Mango Maracuya', 3000),
(31, 'Batido Mango Piña', 3000),
(32, 'Batido Maracuya', 3000),
(33, 'Batido Melon', 3000),
(34, 'Batido Piña', 3000),
(35, 'Batido Sandia', 3000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida_mesa`
--

CREATE TABLE `bebida_mesa` (
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_bebida` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL,
  `descuento` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bebida_mesa`
--

INSERT INTO `bebida_mesa` (`id_mesa`, `id_bebida`, `cantidad`, `id`, `descuento`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 1, 2, 0),
(7, 2, 1, 3, 0),
(7, 6, 1, 4, 0),
(8, 4, 1, 5, 0),
(10, 2, 1, 6, 0),
(11, 5, 1, 7, 0),
(10, 12, 1, 8, 0),
(12, 5, 1, 9, 0),
(14, 7, 1, 10, 0),
(14, 4, 1, 11, 0),
(16, 7, 1, 12, 0),
(16, 2, 1, 13, 0),
(20, 3, 1, 17, 0),
(20, 2, 1, 18, 0),
(20, 1, 1, 19, 0),
(22, 3, 1, 20, 0),
(25, 13, 2, 24, 0),
(25, 8, 1, 25, 0),
(25, 4, 1, 26, 0),
(31, 10, 1, 28, 0),
(35, 22, 1, 34, 0),
(37, 8, 1, 37, 0),
(37, 9, 1, 38, 0),
(39, 1, 1, 39, 0),
(47, 5, 1, 43, 0),
(47, 17, 1, 44, 0),
(52, 6, 2, 47, 0),
(56, 14, 1, 52, 0),
(56, 13, 1, 53, 0),
(61, 2, 1, 57, 0),
(61, 8, 1, 58, 0),
(65, 13, 1, 59, 0),
(65, 14, 3, 60, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafe`
--

CREATE TABLE `cafe` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafe`
--

INSERT INTO `cafe` (`id`, `nombre`, `precio`) VALUES
(1, 'Iced tea Adagio frambuesa', 2500),
(2, 'Iced tea Adagio mango', 2500),
(3, 'Iced tea Adagio verde bonita', 2500),
(4, 'Iced tea Adagio arandano', 2500),
(5, 'Iced tea Adagio explosion de berries', 2500),
(6, 'Te Twinings english breakfast', 1200),
(7, 'Te Twinings earl grey', 1200),
(8, 'Te Twinings camomilla manzanilla', 1500),
(9, 'Te Twinings menta pura', 1500),
(10, 'Te Twinings limon gengibre', 1500),
(11, 'Adagio Te infusiones Cha Cha', 2500),
(12, 'Adagio Te infusiones explosion de berries', 2500),
(13, 'Adagio Te negro earl grey lavanda', 2500),
(14, 'Adagio Te negro maracuya', 2500),
(15, 'Adagio Te negro masala Chai', 2500),
(16, 'Adagio Te Rooibos Verde arandano', 2500),
(17, 'Adagio Te Rooibos Verde bonita', 2500),
(18, 'Adagio Te verde frambuesa', 2500),
(19, 'Adagio Te verde Mango', 2500),
(20, 'Espresso', 1300),
(21, 'Latte', 1800),
(22, 'Mocaccino', 2000),
(23, 'Capuccino', 1900),
(24, 'Frapuccino', 2500),
(25, 'Chocolate caliente', 2300),
(26, 'Café Helado', 2500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafe_mesa`
--

CREATE TABLE `cafe_mesa` (
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_cafe` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL,
  `descuento` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafe_mesa`
--

INSERT INTO `cafe_mesa` (`id_mesa`, `id_cafe`, `cantidad`, `id`, `descuento`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 1, 2, 0),
(2, 11, 1, 3, 0),
(3, 23, 1, 4, 0),
(3, 13, 1, 5, 0),
(6, 21, 1, 7, 0),
(7, 21, 1, 9, 0),
(8, 26, 1, 10, 0),
(10, 22, 1, 11, 0),
(11, 12, 1, 12, 0),
(20, 20, 2, 14, 0),
(22, 11, 1, 15, 0),
(23, 23, 1, 16, 0),
(23, 2, 1, 17, 0),
(26, 23, 1, 18, 0),
(38, 20, 2, 21, 0),
(39, 1, 1, 22, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_cargo` varchar(50) NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre_cargo`, `id_users`) VALUES
(1, 'Caja', 1),
(2, 'Cocina', 2),
(3, 'Caja', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desayuno`
--

CREATE TABLE `desayuno` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `desayuno`
--

INSERT INTO `desayuno` (`id`, `nombre`, `precio`) VALUES
(1, 'Desayuno Clásico', 2990),
(2, 'Desayuno Rapidito', 3200),
(3, 'Desayuno Chileno', 5000),
(4, 'Desayuno light', 5000),
(5, 'Desayuno campestre', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desayuno_mesa`
--

CREATE TABLE `desayuno_mesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_desayuno` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) UNSIGNED DEFAULT '1',
  `descuento` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `desayuno_mesa`
--

INSERT INTO `desayuno_mesa` (`id`, `id_mesa`, `id_desayuno`, `cantidad`, `descuento`) VALUES
(1, 1, 3, 2, 0),
(2, 2, 5, 1, 0),
(5, 20, 1, 1, 0),
(6, 22, 3, 1, 0),
(7, 31, 5, 1, 0),
(8, 31, 4, 1, 0),
(9, 39, 1, 1, 0),
(14, 44, 1, 1, 0),
(15, 44, 4, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descuento` int(2) UNSIGNED DEFAULT '0',
  `id_mesa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id`, `descuento`, `id_mesa`) VALUES
(1, 10, 1),
(2, 10, 2),
(3, 20, 2),
(4, 15, 3),
(6, 10, 7),
(7, 10, 8),
(8, 15, 22),
(9, 15, 22),
(10, 5, 25),
(11, 5, 25),
(12, 5, 25),
(13, 15, 32),
(16, 10, 56),
(17, 10, 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_mesa`
--

CREATE TABLE `estado_mesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` enum('Abierto','Atendido','Cerrado') NOT NULL,
  `id_mesa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_mesa`
--

INSERT INTO `estado_mesa` (`id`, `estado`, `id_mesa`) VALUES
(1, 'Cerrado', 1),
(2, 'Cerrado', 2),
(3, 'Cerrado', 3),
(6, 'Cerrado', 6),
(7, 'Cerrado', 7),
(8, 'Cerrado', 8),
(9, 'Cerrado', 9),
(10, 'Cerrado', 10),
(11, 'Cerrado', 11),
(12, 'Cerrado', 12),
(13, 'Cerrado', 13),
(14, 'Cerrado', 14),
(16, 'Cerrado', 16),
(20, 'Cerrado', 20),
(21, 'Cerrado', 21),
(22, 'Cerrado', 22),
(23, 'Cerrado', 23),
(25, 'Cerrado', 25),
(26, 'Cerrado', 26),
(27, 'Cerrado', 27),
(31, 'Cerrado', 31),
(32, 'Cerrado', 32),
(35, 'Cerrado', 35),
(37, 'Cerrado', 37),
(38, 'Cerrado', 38),
(39, 'Cerrado', 39),
(44, 'Cerrado', 44),
(47, 'Cerrado', 47),
(50, 'Cerrado', 50),
(52, 'Cerrado', 52),
(56, 'Cerrado', 56),
(61, 'Cerrado', 61),
(62, 'Cerrado', 62),
(65, 'Cerrado', 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `helados`
--

CREATE TABLE `helados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `helados`
--

INSERT INTO `helados` (`id`, `nombre`, `precio`) VALUES
(1, 'Barquillo 1 sabor', 1300),
(2, 'Barquillo 2 sabores', 2200),
(3, 'Helado tentación', 3500),
(4, 'Canasto de helado', 3400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `helado_mesa`
--

CREATE TABLE `helado_mesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_helado` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) UNSIGNED DEFAULT '1',
  `descuento` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `helado_mesa`
--

INSERT INTO `helado_mesa` (`id`, `id_mesa`, `id_helado`, `cantidad`, `descuento`) VALUES
(1, 1, 1, 5, 0),
(2, 2, 4, 1, 0),
(9, 16, 3, 1, 0),
(10, 27, 2, 1, 0),
(11, 39, 1, 1, 0),
(15, 56, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_mesa` int(2) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `observacion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id`, `numero_mesa`, `fecha`, `observacion`) VALUES
(1, 1, '2019-02-21 09:24:49', NULL),
(2, 2, '2019-02-22 12:12:54', NULL),
(3, 3, '2019-02-22 02:01:05', NULL),
(6, 1, '2019-02-22 03:03:42', NULL),
(7, 1, '2019-02-22 03:14:23', NULL),
(8, 16, '2019-02-22 03:31:49', NULL),
(9, 1, '2019-02-22 05:38:08', NULL),
(10, 6, '2019-02-22 06:08:51', NULL),
(11, 7, '2019-02-22 06:22:50', NULL),
(12, 5, '2019-02-22 06:51:16', NULL),
(13, 16, '2019-02-22 07:05:38', NULL),
(14, 9, '2019-02-22 07:47:33', NULL),
(16, 3, '2019-02-22 08:24:46', NULL),
(20, 13, '2019-02-22 08:44:46', NULL),
(21, 16, '2019-02-22 09:05:49', NULL),
(22, 4, '2019-02-22 09:19:31', NULL),
(23, 5, '2019-02-22 09:54:48', NULL),
(25, 8, '2019-02-22 10:47:00', NULL),
(26, 7, '2019-02-23 11:41:45', NULL),
(27, 16, '2019-02-23 11:54:44', NULL),
(31, 8, '2019-02-23 12:35:46', NULL),
(32, 16, '2019-02-23 03:54:50', NULL),
(35, 16, '2019-02-23 05:37:25', NULL),
(37, 16, '2019-02-23 06:44:48', NULL),
(38, 16, '2019-02-23 07:28:13', NULL),
(39, 16, '2019-02-23 08:00:06', NULL),
(44, 9, '2019-02-24 11:44:56', NULL),
(47, 9, '2019-02-24 01:39:46', NULL),
(50, 16, '2019-02-24 03:13:05', NULL),
(52, 9, '2019-02-24 04:00:35', NULL),
(56, 9, '2019-02-24 06:55:46', NULL),
(61, 3, '2019-02-24 08:00:30', NULL),
(62, 16, '2019-02-24 08:01:00', NULL),
(65, 5, '2019-02-24 09:03:04', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sebastian_concha@hotmail.cl', '$2y$10$0cx4AXVluvnNAwIu88aMe.Bt.7KCSyI1.p75iXXo1CvZifzwZ11sG', '2018-11-28 13:54:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasteles`
--

CREATE TABLE `pasteles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pasteles`
--

INSERT INTO `pasteles` (`id`, `nombre`, `precio`) VALUES
(1, 'Donuts cobertura chocolate', 890),
(2, 'Donuts cobertura frambuesa', 890),
(3, 'Donuts rellena chocolate', 1300),
(4, 'Donuts rellena frambuesa', 1300),
(5, 'Muffins americano Arandano', 1300),
(6, 'Muffins americano Chips chocolate', 1300),
(7, 'Muffins americano Frambuesa', 1300),
(8, 'Muffins americano Mango maracuya', 1300),
(9, 'Muffins americano Red Velvet', 1300),
(10, 'Muffins Frambuesa Cheesecake', 1300),
(11, 'Muffins Arandano Cheesecake', 1300),
(12, 'Muffins Chocolate relleno con manjar', 1300),
(13, 'Brownie', 1000),
(14, 'Pastel emz', 2000),
(15, 'Media luna Argentina', 590),
(16, 'Media luna rellena con manjar', 990);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasteles_mesa`
--

CREATE TABLE `pasteles_mesa` (
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_pastel` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL,
  `descuento` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pasteles_mesa`
--

INSERT INTO `pasteles_mesa` (`id_mesa`, `id_pastel`, `cantidad`, `id`, `descuento`) VALUES
(1, 1, 1, 1, 0),
(2, 14, 1, 2, 0),
(7, 3, 2, 3, 0),
(11, 1, 1, 4, 0),
(11, 2, 1, 5, 0),
(13, 9, 1, 6, 0),
(13, 14, 1, 7, 0),
(13, 6, 1, 8, 0),
(13, 12, 1, 9, 0),
(16, 14, 1, 10, 0),
(22, 5, 1, 11, 0),
(16, 5, 1, 12, 0),
(25, 2, 2, 13, 0),
(26, 16, 1, 14, 0),
(32, 14, 3, 15, 0),
(32, 13, 1, 16, 0),
(32, 10, 1, 17, 0),
(32, 11, 1, 18, 0),
(38, 1, 1, 19, 0),
(38, 15, 1, 20, 0),
(39, 7, 1, 21, 0),
(50, 13, 1, 25, 0),
(62, 12, 1, 29, 0),
(62, 11, 1, 30, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `precio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`id`, `nombre`, `precio`) VALUES
(1, 'Vegetariano del campo', 4200),
(2, 'Vegetariano del huerto', 4200),
(3, 'Vegano', 4200),
(4, 'Caribeño reina pepiada', 4200),
(5, 'Caribeño llanera', 4200),
(6, 'Pollo oriental', 4200),
(7, 'Del pacífico', 4200),
(8, 'Ropa vieja', 4200),
(9, 'Clásico', 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato_mesa`
--

CREATE TABLE `plato_mesa` (
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_plato` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) NOT NULL DEFAULT '1',
  `id` int(11) NOT NULL,
  `descuento` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plato_mesa`
--

INSERT INTO `plato_mesa` (`id_mesa`, `id_plato`, `cantidad`, `id`, `descuento`) VALUES
(1, 1, 1, 1, 0),
(1, 3, 1, 2, 0),
(2, 3, 1, 3, 0),
(3, 8, 1, 4, 0),
(3, 7, 1, 5, 0),
(7, 8, 1, 6, 0),
(7, 5, 1, 7, 0),
(10, 4, 1, 8, 0),
(10, 1, 1, 9, 0),
(14, 3, 2, 10, 0),
(16, 9, 1, 12, 0),
(21, 8, 1, 13, 0),
(22, 9, 1, 14, 0),
(22, 2, 1, 15, 0),
(23, 5, 1, 16, 0),
(25, 1, 1, 20, 0),
(25, 4, 1, 21, 0),
(25, 9, 1, 22, 0),
(25, 8, 1, 23, 0),
(37, 6, 2, 33, 0),
(39, 1, 1, 34, 0),
(47, 6, 1, 45, 0),
(47, 2, 1, 46, 0),
(52, 8, 1, 49, 0),
(52, 4, 1, 50, 0),
(56, 8, 1, 55, 0),
(56, 6, 1, 56, 0),
(61, 6, 1, 61, 0),
(65, 8, 1, 64, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postres`
--

CREATE TABLE `postres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postres`
--

INSERT INTO `postres` (`id`, `nombre`, `precio`) VALUES
(1, 'Cake del día', 2500),
(2, 'Waffles', 4200),
(3, 'Crepes', 3800),
(4, 'Brownie con helado', 2300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postre_mesa`
--

CREATE TABLE `postre_mesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_postre` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) UNSIGNED DEFAULT '1',
  `descuento` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postre_mesa`
--

INSERT INTO `postre_mesa` (`id`, `id_mesa`, `id_postre`, `cantidad`, `descuento`) VALUES
(1, 1, 1, 6, 0),
(2, 2, 1, 1, 0),
(3, 8, 2, 1, 0),
(4, 9, 1, 1, 0),
(5, 12, 4, 1, 0),
(6, 10, 4, 1, 0),
(7, 14, 4, 1, 0),
(8, 16, 2, 1, 0),
(10, 20, 4, 3, 0),
(11, 20, 4, 2, 0),
(12, 23, 4, 1, 0),
(13, 16, 2, 1, 0),
(14, 25, 2, 1, 0),
(15, 39, 1, 1, 0),
(20, 61, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sebas', 'sebastian_concha@hotmail.cl', '$2y$10$nWr1upLBqM9vShlsCToTruJ8mRp68J/0SKfr1emIEX5rb20DZzHBy', 'kjY8QC7WLKJOiRFIiGi5Ed2FY9f6ZNP7cBKXKs31JSdbsw0W543m7LxvvDlG', '2018-11-28 13:48:30', '2018-11-28 13:48:30'),
(2, 'carta', 'concha.m.sebastian@gmail.cl', '$2y$10$dSeLtcUKQ2W.zssltL46DuNZRZj03MYzRYK.GLhMkpANKbPWkPlnS', 'bjvmV6XqukvvXB90GkLTrMwShHvKgHWfUWu5Bm8rJ2lC86XoVXQ11b3MlbHq', '2019-02-09 16:56:37', '2019-02-09 16:56:37'),
(3, 'Daniel Concha', 'daniel@cafeteriaemz.cl', '$2y$10$tx8icPEenWRysBPdIAKSEObVslQwNMlyYKXvFxSM49Wf7zWlPMGd6', 'LCGi9oOI56KxQfHz8sF4jTQC83GsVbIGhx3fYYZFzW7DQjWQjhYpLKAECiJo', '2019-02-24 23:57:35', '2019-02-24 23:57:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agregados`
--
ALTER TABLE `agregados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `agregado_mesa`
--
ALTER TABLE `agregado_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agregado` (`id_agregado`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bebida_mesa`
--
ALTER TABLE `bebida_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bebida` (`id_bebida`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cafe_mesa`
--
ALTER TABLE `cafe_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cafe` (`id_cafe`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indices de la tabla `desayuno`
--
ALTER TABLE `desayuno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `desayuno_mesa`
--
ALTER TABLE `desayuno_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_desayuno` (`id_desayuno`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`id_mesa`);

--
-- Indices de la tabla `helados`
--
ALTER TABLE `helados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `helado_mesa`
--
ALTER TABLE `helado_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_helado` (`id_helado`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pasteles`
--
ALTER TABLE `pasteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pasteles_mesa`
--
ALTER TABLE `pasteles_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pastel` (`id_pastel`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plato_mesa`
--
ALTER TABLE `plato_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plato` (`id_plato`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `postres`
--
ALTER TABLE `postres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `postre_mesa`
--
ALTER TABLE `postre_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_postre` (`id_postre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agregados`
--
ALTER TABLE `agregados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `agregado_mesa`
--
ALTER TABLE `agregado_mesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `bebida_mesa`
--
ALTER TABLE `bebida_mesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `cafe_mesa`
--
ALTER TABLE `cafe_mesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `desayuno`
--
ALTER TABLE `desayuno`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `desayuno_mesa`
--
ALTER TABLE `desayuno_mesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `helados`
--
ALTER TABLE `helados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `helado_mesa`
--
ALTER TABLE `helado_mesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pasteles`
--
ALTER TABLE `pasteles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pasteles_mesa`
--
ALTER TABLE `pasteles_mesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `plato_mesa`
--
ALTER TABLE `plato_mesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `postres`
--
ALTER TABLE `postres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `postre_mesa`
--
ALTER TABLE `postre_mesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agregado_mesa`
--
ALTER TABLE `agregado_mesa`
  ADD CONSTRAINT `agregado_mesa_ibfk_1` FOREIGN KEY (`id_agregado`) REFERENCES `agregados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agregado_mesa_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `bebida_mesa`
--
ALTER TABLE `bebida_mesa`
  ADD CONSTRAINT `bebida_mesa_ibfk_1` FOREIGN KEY (`id_bebida`) REFERENCES `bebida` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bebida_mesa_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cafe_mesa`
--
ALTER TABLE `cafe_mesa`
  ADD CONSTRAINT `cafe_mesa_ibfk_1` FOREIGN KEY (`id_cafe`) REFERENCES `cafe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cafe_mesa_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `desayuno_mesa`
--
ALTER TABLE `desayuno_mesa`
  ADD CONSTRAINT `desayuno_mesa_ibfk_1` FOREIGN KEY (`id_desayuno`) REFERENCES `desayuno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `desayuno_mesa_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `descuentos_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  ADD CONSTRAINT `estado` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `helado_mesa`
--
ALTER TABLE `helado_mesa`
  ADD CONSTRAINT `helado_mesa_ibfk_1` FOREIGN KEY (`id_helado`) REFERENCES `helados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `helado_mesa_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pasteles_mesa`
--
ALTER TABLE `pasteles_mesa`
  ADD CONSTRAINT `pasteles_mesa_ibfk_1` FOREIGN KEY (`id_pastel`) REFERENCES `pasteles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasteles_mesa_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plato_mesa`
--
ALTER TABLE `plato_mesa`
  ADD CONSTRAINT `plato_mesa_ibfk_1` FOREIGN KEY (`id_plato`) REFERENCES `plato` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plato_mesa_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `postre_mesa`
--
ALTER TABLE `postre_mesa`
  ADD CONSTRAINT `postre_mesa_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postre_mesa_ibfk_2` FOREIGN KEY (`id_postre`) REFERENCES `postres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
