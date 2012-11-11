-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2012 a las 23:51:48
-- Versión del servidor: 5.5.27-log
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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

DROP TABLE IF EXISTS `comuna`;
CREATE TABLE IF NOT EXISTS `comuna` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

DROP TABLE IF EXISTS `contrato`;
CREATE TABLE IF NOT EXISTS `contrato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rut_empleado` int(10) unsigned NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date DEFAULT NULL,
  `id_tipo_contrato` int(10) unsigned NOT NULL,
  `id_prevision` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entrada` (`rut_empleado`,`fecha_inicio`,`fecha_termino`),
  KEY `fk_contrato_tipo_contrato` (`id_tipo_contrato`),
  KEY `fk_contrato_prevision` (`id_prevision`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento_prevision`
--

DROP TABLE IF EXISTS `descuento_prevision`;
CREATE TABLE IF NOT EXISTS `descuento_prevision` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_prevision` int(10) unsigned NOT NULL,
  `fecha_periodo` date NOT NULL,
  `descuento` decimal(5,4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entrada` (`id_prevision`,`fecha_periodo`),
  KEY `fk_descuento_prevision_prevision` (`id_prevision`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `rut` int(10) unsigned NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_comuna` int(10) unsigned NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `fk_empleado_comuna` (`id_comuna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacto_salud`
--

DROP TABLE IF EXISTS `pacto_salud`;
CREATE TABLE IF NOT EXISTS `pacto_salud` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sistema_salud` int(10) unsigned NOT NULL,
  `id_contrato` int(10) unsigned NOT NULL,
  `fecha_periodo` date NOT NULL,
  `pacto` decimal(4,3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entrada` (`id_contrato`,`fecha_periodo`),
  KEY `fk_pacto_salud_sistema_salud` (`id_sistema_salud`),
  KEY `fk_pacto_salud_contrato` (`id_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=53 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro_externo`
--

DROP TABLE IF EXISTS `parametro_externo`;
CREATE TABLE IF NOT EXISTS `parametro_externo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` enum('VALOR_UF','FACTOR_GRATIFICACION','DESCUENTO_SALUD','FACTOR_HORA_EXTRA','SUELDO_MINIMO') COLLATE utf8_spanish_ci NOT NULL,
  `fecha_vigencia` date NOT NULL,
  `valor` double unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entrada` (`codigo`,`fecha_vigencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prevision`
--

DROP TABLE IF EXISTS `prevision`;
CREATE TABLE IF NOT EXISTS `prevision` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_mensual`
--

DROP TABLE IF EXISTS `registro_mensual`;
CREATE TABLE IF NOT EXISTS `registro_mensual` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_contrato` int(10) unsigned NOT NULL,
  `cantidad_horas_extras` decimal(4,2) unsigned DEFAULT NULL,
  `monto_anticipo` decimal(7,0) unsigned DEFAULT NULL,
  `bono_movilizacion` decimal(6,0) unsigned DEFAULT NULL,
  `bono_colacion` decimal(6,0) unsigned DEFAULT NULL,
  `bono_produccion` decimal(7,0) unsigned DEFAULT NULL,
  `fecha_periodo` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entrada` (`id_contrato`,`fecha_periodo`),
  KEY `fk_registro_mensual_contrato` (`id_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renta_contrato`
--

DROP TABLE IF EXISTS `renta_contrato`;
CREATE TABLE IF NOT EXISTS `renta_contrato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_contrato` int(10) unsigned NOT NULL,
  `fecha_periodo` date NOT NULL,
  `renta_bruta` decimal(7,0) NOT NULL,
  `gratificacion` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `entrada` (`id_tipo_contrato`,`fecha_periodo`),
  KEY `fk_renta_contrato_tipo_contrato` (`id_tipo_contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_salud`
--

DROP TABLE IF EXISTS `sistema_salud`;
CREATE TABLE IF NOT EXISTS `sistema_salud` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tiene_pacto` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

DROP TABLE IF EXISTS `tipo_contrato`;
CREATE TABLE IF NOT EXISTS `tipo_contrato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
