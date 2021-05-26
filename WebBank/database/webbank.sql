-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2020 a las 03:27:31
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
-- Base de datos: `webbank`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuario2` int(11) DEFAULT NULL,
  `id_transacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_transacion`
--

CREATE TABLE `tipo_transacion` (
  `id_transacion` int(11) NOT NULL,
  `nombre_transacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_transacion`
--

INSERT INTO `tipo_transacion` (`id_transacion`, `nombre_transacion`) VALUES
(1, 'Transferir'),
(2, 'Depositar'),
(3, 'Retirar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `numero_cedula` varbinary(50) NOT NULL,
  `contrasena` varbinary(50) NOT NULL,
  `primer_nombre` varbinary(50) NOT NULL,
  `segundo_nombre` varbinary(50) DEFAULT NULL,
  `primer_apellido` varbinary(50) NOT NULL,
  `segundo_apellido` varbinary(50) DEFAULT NULL,
  `saldo` varbinary(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `numero_cedula`, `contrasena`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `saldo`) VALUES
(1, 0x4d5441774e6a49304e6a63794f513d3d, 0x52474675615756734d54497a, 0x5247467561575673, 0x5157356b636d567a, 0x51327868646d6c7162773d3d, 0x52326c795957786b62773d3d, 0x32303030),
(2, 0x4d54497a4e4455324e7a6735, 0x536d6876626b52765a5445794d773d3d, 0x536d687662673d3d, NULL, 0x5247396c, NULL, 0x353030);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`,`id_usuario`,`id_transacion`),
  ADD UNIQUE KEY `id_historial_UNIQUE` (`id_historial`),
  ADD KEY `fk_usuario_has_transacion_transacion1_idx` (`id_transacion`),
  ADD KEY `fk_usuario_has_transacion_usuario1_idx` (`id_usuario`),
  ADD KEY `fk_usuario_has_transacion_usuario2_idx` (`id_usuario2`);

--
-- Indices de la tabla `tipo_transacion`
--
ALTER TABLE `tipo_transacion`
  ADD PRIMARY KEY (`id_transacion`),
  ADD UNIQUE KEY `id_transacion_UNIQUE` (`id_transacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `numero_celular_UNIQUE` (`numero_cedula`),
  ADD UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_transacion`
--
ALTER TABLE `tipo_transacion`
  MODIFY `id_transacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_usuario_has_transacion_transacion1` FOREIGN KEY (`id_transacion`) REFERENCES `tipo_transacion` (`id_transacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_transacion_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_transacion_usuario2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
