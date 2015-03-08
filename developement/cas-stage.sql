-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2015 a las 03:24:47
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cas-stage`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE IF NOT EXISTS `comuna` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE IF NOT EXISTS `contrato` (
`id` int(10) unsigned NOT NULL,
  `rut_empleado` int(10) unsigned NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date DEFAULT NULL,
  `id_tipo_contrato` int(10) unsigned NOT NULL,
  `id_prevision` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento_prevision`
--

CREATE TABLE IF NOT EXISTS `descuento_prevision` (
`id` int(10) unsigned NOT NULL,
  `id_prevision` int(10) unsigned NOT NULL,
  `fecha_periodo` date NOT NULL,
  `descuento` decimal(5,4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `rut` int(10) unsigned NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_comuna` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacto_salud`
--

CREATE TABLE IF NOT EXISTS `pacto_salud` (
`id` int(10) unsigned NOT NULL,
  `id_sistema_salud` int(10) unsigned NOT NULL,
  `id_contrato` int(10) unsigned NOT NULL,
  `fecha_periodo` date NOT NULL,
  `pacto` decimal(4,3) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro_externo`
--

CREATE TABLE IF NOT EXISTS `parametro_externo` (
`id` int(10) unsigned NOT NULL,
  `codigo` enum('VALOR_UF','FACTOR_GRATIFICACION','DESCUENTO_SALUD','FACTOR_HORA_EXTRA','SUELDO_MINIMO','DIFERENCIA_HORA_EXTRA_F') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_vigencia` date NOT NULL,
  `valor` double unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prevision`
--

CREATE TABLE IF NOT EXISTS `prevision` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_mensual`
--

CREATE TABLE IF NOT EXISTS `registro_mensual` (
`id` int(10) unsigned NOT NULL,
  `id_contrato` int(10) unsigned NOT NULL,
  `cantidad_horas_extras` decimal(4,2) unsigned DEFAULT NULL,
  `cantidad_horas_extras_f` decimal(4,2) unsigned DEFAULT NULL,
  `monto_anticipo` decimal(7,0) unsigned DEFAULT NULL,
  `bono_movilizacion` decimal(6,0) unsigned DEFAULT NULL,
  `bono_colacion` decimal(6,0) unsigned DEFAULT NULL,
  `bono_produccion` decimal(7,0) unsigned DEFAULT NULL,
  `otros_bonos` decimal(7,0) unsigned DEFAULT NULL,
  `fecha_periodo` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=71 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renta_contrato`
--

CREATE TABLE IF NOT EXISTS `renta_contrato` (
`id` int(10) unsigned NOT NULL,
  `id_tipo_contrato` int(10) unsigned NOT NULL,
  `fecha_periodo` date NOT NULL,
  `renta_bruta` decimal(7,0) NOT NULL,
  `gratificacion` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_salud`
--

CREATE TABLE IF NOT EXISTS `sistema_salud` (
`id` int(10) unsigned NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tiene_pacto` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE IF NOT EXISTS `tipo_contrato` (
`id` int(10) unsigned NOT NULL,
  `cargo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` binary(20) NOT NULL,
  `perfil` enum('Lectura','Lectura y escritura') COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `entrada` (`rut_empleado`,`fecha_inicio`,`fecha_termino`), ADD KEY `fk_contrato_tipo_contrato` (`id_tipo_contrato`), ADD KEY `fk_contrato_prevision` (`id_prevision`);

--
-- Indices de la tabla `descuento_prevision`
--
ALTER TABLE `descuento_prevision`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `entrada` (`id_prevision`,`fecha_periodo`), ADD KEY `fk_descuento_prevision_prevision` (`id_prevision`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`rut`), ADD KEY `fk_empleado_comuna` (`id_comuna`);

--
-- Indices de la tabla `pacto_salud`
--
ALTER TABLE `pacto_salud`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `entrada` (`id_contrato`,`fecha_periodo`), ADD KEY `fk_pacto_salud_sistema_salud` (`id_sistema_salud`), ADD KEY `fk_pacto_salud_contrato` (`id_contrato`);

--
-- Indices de la tabla `parametro_externo`
--
ALTER TABLE `parametro_externo`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `entrada` (`codigo`,`fecha_vigencia`);

--
-- Indices de la tabla `prevision`
--
ALTER TABLE `prevision`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_mensual`
--
ALTER TABLE `registro_mensual`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `entrada` (`id_contrato`,`fecha_periodo`), ADD KEY `fk_registro_mensual_contrato` (`id_contrato`);

--
-- Indices de la tabla `renta_contrato`
--
ALTER TABLE `renta_contrato`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `entrada` (`id_tipo_contrato`,`fecha_periodo`), ADD KEY `fk_renta_contrato_tipo_contrato` (`id_tipo_contrato`);

--
-- Indices de la tabla `sistema_salud`
--
ALTER TABLE `sistema_salud`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `descuento_prevision`
--
ALTER TABLE `descuento_prevision`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `pacto_salud`
--
ALTER TABLE `pacto_salud`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `parametro_externo`
--
ALTER TABLE `parametro_externo`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `prevision`
--
ALTER TABLE `prevision`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `registro_mensual`
--
ALTER TABLE `registro_mensual`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `renta_contrato`
--
ALTER TABLE `renta_contrato`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sistema_salud`
--
ALTER TABLE `sistema_salud`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
ADD CONSTRAINT `fk_contrato_empleado` FOREIGN KEY (`rut_empleado`) REFERENCES `empleado` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_contrato_prevision` FOREIGN KEY (`id_prevision`) REFERENCES `prevision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_contrato_tipo_contrato` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tipo_contrato` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descuento_prevision`
--
ALTER TABLE `descuento_prevision`
ADD CONSTRAINT `fk_descuento_prevision_prevision` FOREIGN KEY (`id_prevision`) REFERENCES `prevision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
ADD CONSTRAINT `fk_empleado_comuna` FOREIGN KEY (`id_comuna`) REFERENCES `comuna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacto_salud`
--
ALTER TABLE `pacto_salud`
ADD CONSTRAINT `fk_pacto_salud_contrato` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pacto_salud_sistema_salud` FOREIGN KEY (`id_sistema_salud`) REFERENCES `sistema_salud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro_mensual`
--
ALTER TABLE `registro_mensual`
ADD CONSTRAINT `fk_registro_mensual_contrato` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `renta_contrato`
--
ALTER TABLE `renta_contrato`
ADD CONSTRAINT `fk_renta_contrato_tipo_contrato` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tipo_contrato` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
