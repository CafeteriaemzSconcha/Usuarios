-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2019 a las 23:14:13
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
(1, 'Jugo natural durazno', 1500),
(2, 'Jugo natural frutilla', 1500),
(3, 'Coca cola light', 1500),
(4, 'Sprite Zero', 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebida_mesa`
--

CREATE TABLE `bebida_mesa` (
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_bebida` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bebida_mesa`
--

INSERT INTO `bebida_mesa` (`id_mesa`, `id_bebida`, `cantidad`) VALUES
(1, 1, 3),
(1, 2, 3),
(1, 3, 3),
(1, 4, 3);

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
(1, 'Iced tea Adagio mango', 2500),
(2, 'Iced tea Adagio verde bonita', 2500),
(3, 'Espresso', 1300),
(4, 'Latte', 1800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cafe_mesa`
--

CREATE TABLE `cafe_mesa` (
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_cafe` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cafe_mesa`
--

INSERT INTO `cafe_mesa` (`id_mesa`, `id_cafe`, `cantidad`) VALUES
(1, 1, 3),
(1, 2, 3),
(1, 3, 3),
(1, 4, 3);

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
(1, 'Caja', 1);

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
(1, 'Abierto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `helados`
--

CREATE TABLE `helados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_mesa` int(2) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id`, `numero_mesa`, `fecha`) VALUES
(1, 1, '2019-02-08 07:09:56');

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
(2, 'Muffin americano Arandano', 1300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasteles_mesa`
--

CREATE TABLE `pasteles_mesa` (
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_pastel` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pasteles_mesa`
--

INSERT INTO `pasteles_mesa` (`id_mesa`, `id_pastel`, `cantidad`) VALUES
(1, 1, 3),
(1, 2, 3);

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
(1, 'Vegetariano del puerto', 4200),
(2, 'Caribeño reina pepiado', 4200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato_mesa`
--

CREATE TABLE `plato_mesa` (
  `id_mesa` int(10) UNSIGNED NOT NULL,
  `id_plato` int(10) UNSIGNED NOT NULL,
  `cantidad` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plato_mesa`
--

INSERT INTO `plato_mesa` (`id_mesa`, `id_plato`, `cantidad`) VALUES
(1, 1, 3),
(1, 2, 3);

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
(1, 'sebas', 'sebastian_concha@hotmail.cl', '$2y$10$nWr1upLBqM9vShlsCToTruJ8mRp68J/0SKfr1emIEX5rb20DZzHBy', 'b780iPy8N01H5cGUHQaqgGp1K1Q84Zk7mnEf4A8bFmTvUDMvPv3KO4Myc77j', '2018-11-28 13:48:30', '2018-11-28 13:48:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bebida_mesa`
--
ALTER TABLE `bebida_mesa`
  ADD PRIMARY KEY (`id_mesa`,`id_bebida`),
  ADD KEY `id_bebida` (`id_bebida`);

--
-- Indices de la tabla `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cafe_mesa`
--
ALTER TABLE `cafe_mesa`
  ADD PRIMARY KEY (`id_mesa`,`id_cafe`),
  ADD KEY `id_cafe` (`id_cafe`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indices de la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `helados`
--
ALTER TABLE `helados`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_mesa`,`id_pastel`),
  ADD KEY `id_pastel` (`id_pastel`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plato_mesa`
--
ALTER TABLE `plato_mesa`
  ADD PRIMARY KEY (`id_mesa`,`id_plato`),
  ADD KEY `id_plato` (`id_plato`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cafe`
--
ALTER TABLE `cafe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `helados`
--
ALTER TABLE `helados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pasteles`
--
ALTER TABLE `pasteles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bebida_mesa`
--
ALTER TABLE `bebida_mesa`
  ADD CONSTRAINT `bebida_mesa_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`),
  ADD CONSTRAINT `bebida_mesa_ibfk_2` FOREIGN KEY (`id_bebida`) REFERENCES `bebida` (`id`);

--
-- Filtros para la tabla `cafe_mesa`
--
ALTER TABLE `cafe_mesa`
  ADD CONSTRAINT `cafe_mesa_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`),
  ADD CONSTRAINT `cafe_mesa_ibfk_2` FOREIGN KEY (`id_cafe`) REFERENCES `cafe` (`id`);

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  ADD CONSTRAINT `estado_mesa_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`);

--
-- Filtros para la tabla `pasteles_mesa`
--
ALTER TABLE `pasteles_mesa`
  ADD CONSTRAINT `pasteles_mesa_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`),
  ADD CONSTRAINT `pasteles_mesa_ibfk_2` FOREIGN KEY (`id_pastel`) REFERENCES `pasteles` (`id`);

--
-- Filtros para la tabla `plato_mesa`
--
ALTER TABLE `plato_mesa`
  ADD CONSTRAINT `plato_mesa_ibfk_1` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id`),
  ADD CONSTRAINT `plato_mesa_ibfk_2` FOREIGN KEY (`id_plato`) REFERENCES `plato` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
