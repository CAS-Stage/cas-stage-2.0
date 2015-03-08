-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2015 a las 03:27:22
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

--
-- Truncar tablas antes de insertar `comuna`
--

TRUNCATE TABLE `comuna`;
--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `nombre`) VALUES
(1, 'Cerrillos'),
(2, 'Cerro Navia'),
(3, 'Conchalí'),
(4, 'El Bosque'),
(5, 'Estación Central'),
(6, 'Huechuraba'),
(7, 'Independencia'),
(8, 'La Cisterna'),
(9, 'La Florida'),
(10, 'La Granja'),
(11, 'La Pintana'),
(12, 'La Reina'),
(13, 'Las Condes'),
(14, 'Lo Barnechea'),
(15, 'Lo Espejo'),
(16, 'Lo Prado'),
(17, 'Macul'),
(18, 'Maipú'),
(19, 'Ñuñoa'),
(20, 'Padre Hurtado'),
(21, 'Pedro Aguirre Cerda'),
(22, 'Peñalolén'),
(23, 'Pirque'),
(24, 'Providencia'),
(25, 'Pudahuel'),
(26, 'Puente Alto'),
(27, 'Quilicura'),
(28, 'Quinta Normal'),
(29, 'Recoleta'),
(30, 'Renca'),
(31, 'San Bernardo'),
(32, 'San Joaquín'),
(33, 'San José De Maipo'),
(34, 'San Miguel'),
(35, 'San Ramón'),
(36, 'Santiago'),
(37, 'Vitacura');

--
-- Truncar tablas antes de insertar `contrato`
--

TRUNCATE TABLE `contrato`;
--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `rut_empleado`, `fecha_inicio`, `fecha_termino`, `id_tipo_contrato`, `id_prevision`) VALUES
(1, 6556889, '2014-03-01', NULL, 3, 7),
(2, 6862553, '2014-03-01', NULL, 1, 4),
(3, 18463462, '2014-03-01', NULL, 4, 5),
(4, 16624533, '2014-03-01', NULL, 4, 4),
(5, 17286878, '2014-03-01', NULL, 4, 5),
(6, 7986524, '2014-03-01', NULL, 1, 4),
(7, 9388248, '2014-03-01', NULL, 2, 2),
(8, 6874719, '2014-03-01', NULL, 1, 2),
(9, 12633285, '2014-03-01', NULL, 2, 4),
(10, 17837805, '2014-03-01', NULL, 4, 7),
(11, 18122356, '2014-03-01', NULL, 4, 5),
(12, 18365594, '2014-03-01', NULL, 4, 4),
(13, 11627747, '2014-03-01', NULL, 4, 7),
(14, 5200634, '2014-03-01', NULL, 3, 8),
(15, 6553524, '2014-03-01', NULL, 2, 1),
(16, 16791290, '2014-03-01', NULL, 2, 2),
(17, 18909044, '2014-03-01', NULL, 4, 5),
(18, 18221887, '2014-03-01', NULL, 4, 4),
(19, 5894235, '2014-03-01', NULL, 1, 7),
(20, 18530076, '2014-03-01', NULL, 4, 2),
(21, 16561452, '2015-03-07', '2015-05-01', 1, 5);

--
-- Truncar tablas antes de insertar `descuento_prevision`
--

TRUNCATE TABLE `descuento_prevision`;
--
-- Volcado de datos para la tabla `descuento_prevision`
--

INSERT INTO `descuento_prevision` (`id`, `id_prevision`, `fecha_periodo`, `descuento`) VALUES
(1, 1, '2014-01-01', '0.0000'),
(2, 2, '2014-01-01', '0.1144'),
(3, 3, '2014-01-01', '0.1148'),
(4, 4, '2014-01-01', '0.1127'),
(6, 5, '2014-01-01', '0.1077'),
(8, 6, '2014-01-01', '0.1047'),
(9, 7, '2014-01-01', '0.1154'),
(10, 8, '2014-01-01', '0.1884');

--
-- Truncar tablas antes de insertar `empleado`
--

TRUNCATE TABLE `empleado`;
--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`rut`, `apellidos`, `nombres`, `fecha_nacimiento`, `direccion`, `fono`, `id_comuna`) VALUES
(5200634, 'Jofré Maldonado', 'José Nelson Williams', '1947-08-07', 'Pedro Onca 768 Villa Polaris', '96535807', 31),
(5894235, 'Soto Perez', 'Jorge Segundo', '1951-01-10', 'Pasaje Los Araucanos 840', '71098565', 18),
(6553524, 'Muñóz Alegría', 'Víctor', '1954-06-15', 'Diego De Almagro 1352 Villa Tijerales', '76928281', 27),
(6556889, 'Alarcón Muñoz', 'Carlos Cirilio', '1955-08-29', 'Pasaje San Ignacio 8095 Jardín Alto', '76266278', 9),
(6862553, 'Arias Fortunatti', 'Luis Juan De Dios', '1952-02-20', 'Río Claro 3914 Villa Las Cumbres', '71098531', 26),
(6874719, 'Castillo Araya', 'Hugo', '1955-10-12', 'Pantaleón Velez Silva 1292', '71098566', 7),
(7986524, 'Caro Torres', 'José Alejandro', '1960-04-23', 'Pasaje Santa Carolina 1600', '71098567', 18),
(9388248, 'Caro Torres', 'David Alberto', '1964-07-03', 'Quebec 8047', '96162139', 16),
(11627747, 'Jofré Costa', 'Marco Antonio', '1970-05-06', 'Pedro Onca 768 Villa Polaris', '96535807', 31),
(12633285, 'Concha Hernández', 'José Otalicio', '1974-06-30', 'Nueva San Martín 1248', '', 18),
(16561452, 'Guitard Torres', 'Jorge Valentino', '1987-02-14', 'Mi casa 123', '12345678', 37),
(16624533, 'Arriaran Toledo', 'Felipe Alberto', '1987-07-03', 'Pasaje Winipeg 3124 Villa Canadá', '82137840', 18),
(16791290, 'Recabarren Mancilla', 'Oriel Iván', '1988-08-16', 'Pasaje Santa Carolina 1600', '84259109', 18),
(17286878, 'Caro Luna', 'Nicolás Dario', '1990-03-28', 'Mallendo 645 Villa Arturo Prat', '95858443', 16),
(17837805, 'Díaz Álvarez', 'Claudio Patricio', '1991-06-11', 'Talcón 5622', '73680703', 5),
(18122356, 'García Soto', 'José Cristobal', '1992-08-17', 'Pasaje Canadá 3075 Villa Mancai', '76663737', 18),
(18221887, 'Rubio Reyes', 'José Daniel', '1992-09-03', 'Los Coihues 11008', '75976648', 4),
(18365594, 'Gonzalez Ulloa', 'Víctor Alfonso', '1993-02-04', 'Alcalde Hernán Prieto 29B', '68541266', 23),
(18463462, 'Arias Quiroga', 'Piero Sebastián', '1993-08-09', 'Río Claro 3914 Villa Las Cumbres', '84809852', 26),
(18530076, 'Zúñiga Acosta', 'Mauricio Esteban', '1992-12-12', 'Sargento Menadier 2563 Depto. 108', '92074350', 26),
(18909044, 'Romero Gonzalez', 'Samuel Ignacio', '1995-02-02', 'Vicente Yañez Pinzon 3677 Barrio Las Rosas', '78518942', 18);

--
-- Truncar tablas antes de insertar `pacto_salud`
--

TRUNCATE TABLE `pacto_salud`;
--
-- Volcado de datos para la tabla `pacto_salud`
--

INSERT INTO `pacto_salud` (`id`, `id_sistema_salud`, `id_contrato`, `fecha_periodo`, `pacto`) VALUES
(1, 1, 1, '2014-03-01', '0.000'),
(2, 2, 2, '2014-03-01', '4.973'),
(3, 2, 7, '2014-03-01', '2.804'),
(4, 2, 8, '2014-03-01', '4.082'),
(5, 2, 16, '2014-03-01', '2.238'),
(6, 2, 19, '2014-03-01', '4.852'),
(7, 4, 9, '2014-03-01', '6.064'),
(40, 1, 3, '2014-03-01', '0.000'),
(41, 1, 4, '2014-03-01', '0.000'),
(42, 1, 5, '2014-03-01', '0.000'),
(43, 1, 6, '2014-03-01', '0.000'),
(44, 1, 10, '2014-03-01', '0.000'),
(45, 1, 11, '2014-03-01', '0.000'),
(46, 1, 12, '2014-03-01', '0.000'),
(47, 1, 13, '2014-03-01', '0.000'),
(48, 1, 14, '2014-03-01', '0.000'),
(49, 1, 15, '2014-03-01', '0.000'),
(50, 1, 17, '2014-03-01', '0.000'),
(51, 1, 18, '2014-03-01', '0.000'),
(52, 1, 20, '2014-03-01', '0.000'),
(53, 2, 21, '2015-03-01', '6.300');

--
-- Truncar tablas antes de insertar `parametro_externo`
--

TRUNCATE TABLE `parametro_externo`;
--
-- Volcado de datos para la tabla `parametro_externo`
--

INSERT INTO `parametro_externo` (`id`, `codigo`, `fecha_vigencia`, `valor`) VALUES
(8, 'FACTOR_GRATIFICACION', '2014-03-01', 4.75),
(9, 'DESCUENTO_SALUD', '2014-03-01', 0.07),
(10, 'FACTOR_HORA_EXTRA', '2014-03-01', 0.0077777),
(11, 'SUELDO_MINIMO', '2014-07-01', 225000),
(12, 'SUELDO_MINIMO', '2015-07-01', 241000),
(13, 'SUELDO_MINIMO', '2016-01-01', 250000),
(14, 'VALOR_UF', '2014-01-31', 23435.87),
(15, 'VALOR_UF', '2014-02-28', 23508.46),
(16, 'SUELDO_MINIMO', '2013-07-01', 210000),
(17, 'VALOR_UF', '2014-03-31', 23606.97),
(18, 'VALOR_UF', '2014-04-30', 23773.41),
(19, 'VALOR_UF', '2014-05-31', 23931.69),
(20, 'VALOR_UF', '2014-06-30', 24023.61),
(21, 'VALOR_UF', '2014-07-31', 24062.27),
(22, 'VALOR_UF', '2014-08-31', 24103.41),
(23, 'VALOR_UF', '2014-09-30', 24168.02),
(24, 'VALOR_UF', '2014-10-31', 24326.93),
(25, 'VALOR_UF', '2014-11-30', 24553.7),
(26, 'VALOR_UF', '2014-12-31', 24627.1),
(27, 'VALOR_UF', '2015-01-31', 24557.15),
(28, 'VALOR_UF', '2015-02-28', 24545.23),
(29, 'DIFERENCIA_HORA_EXTRA_F', '2014-03-01', 1500),
(30, 'VALOR_UF', '2015-03-31', 24845.23);

--
-- Truncar tablas antes de insertar `prevision`
--

TRUNCATE TABLE `prevision`;
--
-- Volcado de datos para la tabla `prevision`
--

INSERT INTO `prevision` (`id`, `nombre`) VALUES
(1, 'Jubilado'),
(2, 'Capital'),
(3, 'Cuprum'),
(4, 'Habitat'),
(5, 'Modelo'),
(6, 'Planvital'),
(7, 'Provida'),
(8, 'IPS (EX-INP)');

--
-- Truncar tablas antes de insertar `registro_mensual`
--

TRUNCATE TABLE `registro_mensual`;
--
-- Volcado de datos para la tabla `registro_mensual`
--

INSERT INTO `registro_mensual` (`id`, `id_contrato`, `cantidad_horas_extras`, `cantidad_horas_extras_f`, `monto_anticipo`, `bono_movilizacion`, `bono_colacion`, `bono_produccion`, `otros_bonos`, `fecha_periodo`) VALUES
(3, 10, '15.00', '0.00', '10000', '10000', '1000', NULL, NULL, '2014-03-01'),
(13, 16, '15.00', '0.00', '10000', '50000', '50000', NULL, NULL, '2014-03-01'),
(20, 2, NULL, '0.00', NULL, '50000', '50000', '150000', NULL, '2014-03-01'),
(25, 3, '33.50', '0.00', '60000', '8000', NULL, NULL, NULL, '2014-03-01'),
(30, 6, NULL, '0.00', '300000', '50000', '50000', '100000', NULL, '2014-03-01'),
(31, 19, NULL, '0.00', '150000', '50000', '50000', '150000', NULL, '2014-03-01'),
(33, 8, NULL, '0.00', NULL, '50000', '50000', '150000', NULL, '2014-03-01'),
(41, 17, '21.00', '0.00', '80000', '15000', NULL, NULL, NULL, '2014-03-01'),
(43, 5, NULL, '0.00', '90000', '15000', NULL, NULL, NULL, '2014-03-01'),
(45, 13, '17.00', '0.00', '130000', '15000', NULL, NULL, NULL, '2014-03-01'),
(47, 9, '28.00', '0.00', '100000', '15000', NULL, NULL, NULL, '2014-03-01'),
(49, 14, '28.00', '0.00', NULL, '15000', NULL, NULL, NULL, '2014-03-01'),
(50, 12, '59.50', '0.00', '100000', '15000', NULL, NULL, NULL, '2014-03-01'),
(53, 7, '40.50', '0.00', '200000', '15000', NULL, NULL, NULL, '2014-03-01'),
(56, 15, '21.00', '0.00', '250000', '15000', NULL, NULL, NULL, '2014-03-01'),
(57, 11, '54.00', '0.00', '120000', '14500', NULL, NULL, NULL, '2014-03-01'),
(59, 18, '60.00', '0.00', '105000', '15000', NULL, NULL, NULL, '2014-03-01'),
(62, 20, '6.00', '0.00', '100000', '15000', NULL, NULL, NULL, '2014-03-01'),
(64, 4, '17.00', '15.50', '30000', '15000', '0', '0', '100000', '2014-03-01'),
(65, 1, '66.50', '0.00', '100000', '15000', NULL, NULL, NULL, '2014-03-01'),
(67, 1, '0.00', '1.00', '0', '0', '0', '0', '0', '2015-03-01'),
(68, 2, '1.00', '0.00', '0', '0', '0', '0', '0', '2015-03-01'),
(69, 8, '0.00', '1.00', '0', '0', '0', '0', '0', '2015-03-01'),
(70, 21, '10.00', '20.00', '300000', '999999', '999999', '1000000', '10000', '2015-03-01');

--
-- Truncar tablas antes de insertar `renta_contrato`
--

TRUNCATE TABLE `renta_contrato`;
--
-- Volcado de datos para la tabla `renta_contrato`
--

INSERT INTO `renta_contrato` (`id`, `id_tipo_contrato`, `fecha_periodo`, `renta_bruta`, `gratificacion`) VALUES
(2, 1, '2014-03-01', '700000', 0),
(3, 2, '2014-03-01', '513958', 1),
(4, 3, '2014-03-01', '441958', 1),
(5, 4, '2014-03-01', '359200', 1);

--
-- Truncar tablas antes de insertar `sistema_salud`
--

TRUNCATE TABLE `sistema_salud`;
--
-- Volcado de datos para la tabla `sistema_salud`
--

INSERT INTO `sistema_salud` (`id`, `nombre`, `tiene_pacto`) VALUES
(1, 'Fonasa', 0),
(2, 'Consalud', 1),
(3, 'Banmédica', 1),
(4, 'Cruz Blanca', 1),
(5, 'Colmena Golden Cross', 1),
(6, 'Masvida', 1);

--
-- Truncar tablas antes de insertar `tipo_contrato`
--

TRUNCATE TABLE `tipo_contrato`;
--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id`, `cargo`) VALUES
(1, 'Socio'),
(2, 'Primera'),
(3, 'Segunda'),
(4, 'Ayudante');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
