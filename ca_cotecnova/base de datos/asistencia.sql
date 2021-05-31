-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2021 a las 00:22:59
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL COMMENT 'Identificador del administrador',
  `documento` varchar(45) NOT NULL COMMENT 'Documento del administrador',
  `nombres` varchar(45) NOT NULL COMMENT 'Nombres del administrador',
  `apellidos` varchar(45) NOT NULL COMMENT 'Apellidos del administrador',
  `clave` varchar(45) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `documento`, `nombres`, `apellidos`, `clave`, `tipo_usuario_id_tipo_usuario`, `estado`) VALUES
(4, '123', 'Juan', 'Rios', '123', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL COMMENT 'Id del aula',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del aula'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL COMMENT 'Id de la clase',
  `dia` date NOT NULL COMMENT 'Dia de la clase',
  `horario_id_horario` int(11) NOT NULL COMMENT 'Identificador del horario',
  `Docente_id_docente` int(11) NOT NULL,
  `Estudiante_id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL COMMENT 'Identificador del docente',
  `documento` varchar(45) NOT NULL,
  `nombres` varchar(45) NOT NULL COMMENT 'Nombres del docente\n\n',
  `apellidos` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `documento`, `nombres`, `apellidos`, `clave`, `tipo_usuario_id_tipo_usuario`, `estado`) VALUES
(1, '123', 'Juan', 'Rios', '123', 2, 1),
(2, '123', 'Juan', 'Rios', '123', 2, 1),
(3, '321', 'juan', 'david', '321', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL COMMENT 'Identificador del estudiante',
  `documento` varchar(45) NOT NULL COMMENT 'Documento del estudiante',
  `nombres` varchar(45) NOT NULL COMMENT 'Nombres del estudiante',
  `apellidos` varchar(45) NOT NULL COMMENT 'Apellidos del estudiante',
  `jornada` varchar(45) NOT NULL COMMENT 'Jornada del estudiante',
  `semestre` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `horario_id_horario` int(11) NOT NULL COMMENT 'Identificador del horario',
  `Carrera_id_carrera` int(11) NOT NULL,
  `tipo_usuario_id_tipo_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL COMMENT 'Id del horario',
  `hora` time NOT NULL COMMENT 'Fecha del horario',
  `materia_id_materia` int(11) NOT NULL,
  `aula_id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL COMMENT 'Id de la materia',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre de la materia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL COMMENT 'Id del usuario',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre (Administrador, Estudiante o Docente)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`) VALUES
(1, 'Estudiante'),
(2, 'Docente'),
(3, 'Aministrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`,`tipo_usuario_id_tipo_usuario`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_administrador`),
  ADD KEY `fk_administrador_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_aula`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`),
  ADD UNIQUE KEY `id_carrera_UNIQUE` (`id_carrera`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`,`horario_id_horario`,`Docente_id_docente`,`Estudiante_id_estudiante`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_clase`),
  ADD KEY `fk_clase_horario1_idx` (`horario_id_horario`),
  ADD KEY `fk_Clase_Docente1_idx` (`Docente_id_docente`),
  ADD KEY `fk_Clase_Estudiante1_idx` (`Estudiante_id_estudiante`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`,`tipo_usuario_id_tipo_usuario`),
  ADD UNIQUE KEY `id_docente_UNIQUE` (`id_docente`),
  ADD KEY `fk_docente_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`,`horario_id_horario`,`Carrera_id_carrera`,`tipo_usuario_id_tipo_usuario`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_estudiante`),
  ADD KEY `fk_estudiante_horario1_idx` (`horario_id_horario`),
  ADD KEY `fk_estudiante_Carrera1_idx` (`Carrera_id_carrera`),
  ADD KEY `fk_estudiante_tipo_usuario1_idx` (`tipo_usuario_id_tipo_usuario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`,`materia_id_materia`,`aula_id_aula`),
  ADD KEY `fk_horario_materia1_idx` (`materia_id_materia`),
  ADD KEY `fk_horario_aula1_idx` (`aula_id_aula`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_materia`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`),
  ADD UNIQUE KEY `id_UNIQUE` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del aula', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la clase', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del docente', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del estudiante', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del horario';

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la materia', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del usuario', AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `fk_Clase_Docente1` FOREIGN KEY (`Docente_id_docente`) REFERENCES `docente` (`id_docente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Clase_Estudiante1` FOREIGN KEY (`Estudiante_id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clase_horario1` FOREIGN KEY (`horario_id_horario`) REFERENCES `horario` (`id_horario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `fk_docente_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_Carrera1` FOREIGN KEY (`Carrera_id_carrera`) REFERENCES `carrera` (`id_carrera`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estudiante_horario1` FOREIGN KEY (`horario_id_horario`) REFERENCES `horario` (`id_horario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estudiante_tipo_usuario1` FOREIGN KEY (`tipo_usuario_id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_aula1` FOREIGN KEY (`aula_id_aula`) REFERENCES `aula` (`id_aula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_horario_materia1` FOREIGN KEY (`materia_id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
