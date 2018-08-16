-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2018 a las 19:03:04
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `uaed`
--
CREATE DATABASE IF NOT EXISTS `uaed` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uaed`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE IF NOT EXISTS `articulo` (
  `a_codigo` int(5) NOT NULL,
  `a_nombre` varchar(25) NOT NULL,
  `a_descrp` varchar(255) NOT NULL,
  `a_cantidad` int(2) unsigned zerofill NOT NULL,
  `a_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

DROP TABLE IF EXISTS `certificado`;
CREATE TABLE IF NOT EXISTS `certificado` (
  `c_codigo` int(5) NOT NULL,
  `c_emision` date NOT NULL,
  `c_vencimiento` date NOT NULL,
  `c_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `address`) VALUES
(14, 'panchito', 'panchito_tester@mail.com', 'libertad'),
(16, 'ulises', 'ulises@mail.com', 'independencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapacidad`
--

DROP TABLE IF EXISTS `discapacidad`;
CREATE TABLE IF NOT EXISTS `discapacidad` (
  `e_cedula` int(8) NOT NULL,
  `td_codigo` int(5) NOT NULL,
  `g_codigo` int(5) NOT NULL,
  `rg_codigo` int(5) NOT NULL,
  `d_duracion` date DEFAULT NULL,
  `d_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `discapacidad`:
--   `e_cedula`
--       `estudiante_discapacidad` -> `e_cedula`
--   `g_codigo`
--       `grado` -> `g_codigo`
--   `td_codigo`
--       `tipo_discapacidad` -> `td_codigo`
--   `rg_codigo`
--       `regimen` -> `rg_codigo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `e_cedula` int(8) NOT NULL,
  `e_nombre` varchar(25) NOT NULL,
  `e_decanato` int(5) NOT NULL,
  `e_carrera` int(5) NOT NULL,
  `e_semestre` int(2) NOT NULL,
  `e_estado` char(1) NOT NULL,
  `e_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_discapacidad`
--

DROP TABLE IF EXISTS `estudiante_discapacidad`;
CREATE TABLE IF NOT EXISTS `estudiante_discapacidad` (
  `e_cedula` int(8) NOT NULL,
  `c_codigo` int(5) NOT NULL,
  `ed_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `estudiante_discapacidad`:
--   `e_cedula`
--       `estudiante` -> `e_cedula`
--   `c_codigo`
--       `certificado` -> `c_codigo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_requerimiento`
--

DROP TABLE IF EXISTS `estudiante_requerimiento`;
CREATE TABLE IF NOT EXISTS `estudiante_requerimiento` (
  `e_cedula` int(8) NOT NULL,
  `r_codigo` int(5) NOT NULL,
  `er_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `estudiante_requerimiento`:
--   `e_cedula`
--       `estudiante_discapacidad` -> `e_cedula`
--   `r_codigo`
--       `requerimiento` -> `r_codigo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE IF NOT EXISTS `grado` (
`g_codigo` int(2) NOT NULL,
  `g_nombre` varchar(25) NOT NULL,
  `g_descrp` varchar(255) NOT NULL,
  `g_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE IF NOT EXISTS `prestamo` (
  `e_cedula` int(8) NOT NULL,
  `a_codigo` int(5) NOT NULL,
  `p_prestamo` date NOT NULL,
  `p_vencimiento` date NOT NULL,
  `p_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELACIONES PARA LA TABLA `prestamo`:
--   `a_codigo`
--       `articulo` -> `a_codigo`
--   `e_cedula`
--       `estudiante_discapacidad` -> `e_cedula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regimen`
--

DROP TABLE IF EXISTS `regimen`;
CREATE TABLE IF NOT EXISTS `regimen` (
`rg_codigo` int(5) NOT NULL,
  `rg_nombre` varchar(25) NOT NULL,
  `rg_descrp` varchar(255) NOT NULL,
  `rg_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requerimiento`
--

DROP TABLE IF EXISTS `requerimiento`;
CREATE TABLE IF NOT EXISTS `requerimiento` (
`r_codigo` int(5) NOT NULL,
  `r_nombre` varchar(25) NOT NULL,
  `r_descrp` varchar(255) NOT NULL,
  `r_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_discapacidad`
--

DROP TABLE IF EXISTS `tipo_discapacidad`;
CREATE TABLE IF NOT EXISTS `tipo_discapacidad` (
`td_codigo` int(5) NOT NULL,
  `td_nombre` varchar(25) NOT NULL,
  `td_descrp` varchar(255) NOT NULL,
  `td_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `u_cedula` int(8) NOT NULL,
  `u_nombre` varchar(25) NOT NULL,
  `u_tipo` varchar(25) NOT NULL,
  `u_username` varchar(25) NOT NULL,
  `u_password` varchar(60) NOT NULL,
  `u_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`u_cedula`, `u_nombre`, `u_tipo`, `u_username`, `u_password`, `u_status`) VALUES
(11223344, 'admin2', 'administrador', 'administrador2', '$2y$10$PsF5WKdlSgokXRY4llGMC.NStH5gLgSdiJH.gX1zYhMqCKIXaRKzy', 'a'),
(12345678, 'admin', 'administrador', 'administrador', '$2y$10$j76HXXxjtQrigpTrJipP/.Z9YSuQy6DvXGvlqO69g0SSeagnzCjXa', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'test@dev.com', '$2y$10$/IKYMpshIx8rPOtDIEnkReKb2x4WIrAUgQxJSxZc6cOd.I5cIHYeS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
 ADD PRIMARY KEY (`a_codigo`);

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
 ADD PRIMARY KEY (`c_codigo`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
 ADD PRIMARY KEY (`e_cedula`,`td_codigo`,`g_codigo`,`rg_codigo`), ADD KEY `e_cedula` (`e_cedula`), ADD KEY `td_codigo` (`td_codigo`), ADD KEY `g_codigo` (`g_codigo`), ADD KEY `rg_codigo` (`rg_codigo`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
 ADD PRIMARY KEY (`e_cedula`);

--
-- Indices de la tabla `estudiante_discapacidad`
--
ALTER TABLE `estudiante_discapacidad`
 ADD PRIMARY KEY (`e_cedula`,`c_codigo`), ADD KEY `e_cedula` (`e_cedula`), ADD KEY `c_codigo` (`c_codigo`);

--
-- Indices de la tabla `estudiante_requerimiento`
--
ALTER TABLE `estudiante_requerimiento`
 ADD PRIMARY KEY (`e_cedula`,`r_codigo`), ADD KEY `e_cedula` (`e_cedula`), ADD KEY `r_codigo` (`r_codigo`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
 ADD PRIMARY KEY (`g_codigo`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
 ADD PRIMARY KEY (`e_cedula`,`a_codigo`), ADD KEY `e_cedula` (`e_cedula`), ADD KEY `a_codigo` (`a_codigo`);

--
-- Indices de la tabla `regimen`
--
ALTER TABLE `regimen`
 ADD PRIMARY KEY (`rg_codigo`);

--
-- Indices de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
 ADD PRIMARY KEY (`r_codigo`);

--
-- Indices de la tabla `tipo_discapacidad`
--
ALTER TABLE `tipo_discapacidad`
 ADD PRIMARY KEY (`td_codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`u_cedula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
MODIFY `g_codigo` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `regimen`
--
ALTER TABLE `regimen`
MODIFY `rg_codigo` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `requerimiento`
--
ALTER TABLE `requerimiento`
MODIFY `r_codigo` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_discapacidad`
--
ALTER TABLE `tipo_discapacidad`
MODIFY `td_codigo` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
ADD CONSTRAINT `d_estudiante` FOREIGN KEY (`e_cedula`) REFERENCES `estudiante_discapacidad` (`e_cedula`),
ADD CONSTRAINT `d_grado` FOREIGN KEY (`g_codigo`) REFERENCES `grado` (`g_codigo`),
ADD CONSTRAINT `d_tipo` FOREIGN KEY (`td_codigo`) REFERENCES `tipo_discapacidad` (`td_codigo`),
ADD CONSTRAINT `rg_regimen` FOREIGN KEY (`rg_codigo`) REFERENCES `regimen` (`rg_codigo`);

--
-- Filtros para la tabla `estudiante_discapacidad`
--
ALTER TABLE `estudiante_discapacidad`
ADD CONSTRAINT `ed_cedula` FOREIGN KEY (`e_cedula`) REFERENCES `estudiante` (`e_cedula`),
ADD CONSTRAINT `ed_certificado` FOREIGN KEY (`c_codigo`) REFERENCES `certificado` (`c_codigo`);

--
-- Filtros para la tabla `estudiante_requerimiento`
--
ALTER TABLE `estudiante_requerimiento`
ADD CONSTRAINT `er_estudiante` FOREIGN KEY (`e_cedula`) REFERENCES `estudiante_discapacidad` (`e_cedula`),
ADD CONSTRAINT `er_requerimiento` FOREIGN KEY (`r_codigo`) REFERENCES `requerimiento` (`r_codigo`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
ADD CONSTRAINT `p_articulo` FOREIGN KEY (`a_codigo`) REFERENCES `articulo` (`a_codigo`),
ADD CONSTRAINT `p_estudiante` FOREIGN KEY (`e_cedula`) REFERENCES `estudiante_discapacidad` (`e_cedula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
