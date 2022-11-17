-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 10:59:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logs_1_15_1`
--

CREATE SCHEMA `logs_1_15_1`;
USE `logs_1_15_1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_alta_baja_rol`
--

CREATE TABLE `usuario_alta_baja_rol` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fecha_desde` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_hasta` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_operador` varchar(250) COLLATE utf8_bin NOT NULL,
  `nombre_operador` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario_alta_baja_rol`
--

INSERT INTO `usuario_alta_baja_rol` (`id`, `id_usuario`, `id_rol`, `fecha_desde`, `fecha_hasta`, `ip_operador`, `nombre_operador`) VALUES
(6, 4, 2, '2022-11-15 16:32:27', '2022-11-15 16:51:45', '127.0.0.1', NULL),
(7, 4, 3, '2022-11-15 16:51:45', '2022-11-17 12:34:02', '127.0.0.1', NULL),
(8, 4, 2, '2022-11-15 17:14:08', '2022-11-17 13:14:21', '127.0.0.1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_blanqueo`
--

CREATE TABLE `usuario_blanqueo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip_operador` varchar(250) COLLATE utf8_bin NOT NULL,
  `nombre_operador` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario_blanqueo`
--

INSERT INTO `usuario_blanqueo` (`id`, `id_usuario`, `fecha`, `ip_operador`, `nombre_operador`) VALUES
(6, 4, '2022-11-11 16:57:15', '127.0.0.1', NULL),
(7, 4, '2022-11-15 16:18:16', '127.0.0.1', NULL),
(8, 4, '2022-11-17 12:38:04', '127.0.0.1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_login`
--

CREATE TABLE `usuario_login` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(250) COLLATE utf8_bin NOT NULL,
  `fecha_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip_usuario` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `login_status` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario_alta_baja_rol`
--
ALTER TABLE `usuario_alta_baja_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_blanqueo`
--
ALTER TABLE `usuario_blanqueo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario_alta_baja_rol`
--
ALTER TABLE `usuario_alta_baja_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario_blanqueo`
--
ALTER TABLE `usuario_blanqueo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario_login`
--
ALTER TABLE `usuario_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
