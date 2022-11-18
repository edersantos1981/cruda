-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 17:45:06
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios_1_15_1`
--

CREATE SCHEMA `usuarios_1_15_1`;
USE `usuarios_1_15_1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  `fk_sistema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id`, `descripcion`, `fk_sistema`) VALUES
(1, 'Administrar el Sistema', 1),
(2, 'Agregar Todo', 3),
(3, 'Blanqueo Clave', 3),
(4, 'Editar Todo', 3),
(5, 'Ver Todo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  `fk_sistema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `descripcion`, `fk_sistema`) VALUES
(1, 'Administrador de Sistema', 3),
(2, 'Supervisor', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `fk_rol` int(11) NOT NULL,
  `fk_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`fk_rol`, `fk_permiso`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE `sistema` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `sistema`
--

INSERT INTO `sistema` (`id`, `descripcion`) VALUES
(1, 'D.O.G.O Depósitos -. Operativo y Gestión Online'),
(2, 'Nomenclador 1078/19'),
(3, 'CRUDA FLOW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(250) COLLATE utf8_bin NOT NULL,
  `mail` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `whatsapp` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(1000) COLLATE utf8_bin NOT NULL,
  `nombre_completo` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_usuario`, `mail`, `whatsapp`, `password`, `nombre_completo`) VALUES
(4, 'victor_182', 'Valentinvictor@agvp.gob.ar', '2966313352', '$argon2i$v=19$m=65536,t=4,p=1$OU5JWDZvL3RwOHNob201VQ$DE5TFVbJxFom4ZfpFgoOqI8g0ZhCIsy79DWehUAAZVw', 'Victor Hugo Valentin'),
(7, 'esantos', 'eder@eder.com', '2966', '$argon2i$v=19$m=65536,t=4,p=1$Lk45eWR3VjhaTlQwZC5NYw$eIOXTu6Esfjgmj6aA9XE8HKtaXl6eYBzwqgGO0CnG68', 'Eder dos Santos'),
(8, 'fbraca', 'facundo@agvp', '2966', '$argon2i$v=19$m=65536,t=4,p=1$WEVrbHZEVjNWZEJteW9PQw$LLZeaxTZrRhunB3h/yNO4UyRiBH+dWKoVx/oyjgpfDM', 'Facundo Bracamonte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `fk_usuario` int(11) NOT NULL,
  `fk_rol` int(11) NOT NULL,
  `fecha_desde` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`fk_usuario`, `fk_rol`, `fecha_desde`) VALUES
(4, 1, '2022-11-17 15:51:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_PERMISO_SISTEMA1_idx` (`fk_sistema`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ROL_SISTEMA1_idx` (`fk_sistema`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`fk_rol`,`fk_permiso`),
  ADD KEY `fk_ROL_has_PERMISO_PERMISO1_idx` (`fk_permiso`),
  ADD KEY `fk_ROL_has_PERMISO_ROL_idx` (`fk_rol`);

--
-- Indices de la tabla `sistema`
--
ALTER TABLE `sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`fk_usuario`,`fk_rol`),
  ADD KEY `fk_USUARIO_has_ROL_ROL1_idx` (`fk_rol`),
  ADD KEY `fk_USUARIO_has_ROL_USUARIO1_idx` (`fk_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sistema`
--
ALTER TABLE `sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_PERMISO_SISTEMA1` FOREIGN KEY (`fk_sistema`) REFERENCES `sistema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `fk_ROL_SISTEMA1` FOREIGN KEY (`fk_sistema`) REFERENCES `sistema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `fk_ROL_PERMISO_PERMISO1` FOREIGN KEY (`fk_permiso`) REFERENCES `permiso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ROL_PERMISO_ROL` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `fk_USUARIO_ROL_ROL1` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_USUARIO_ROL_USUARIO1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
