-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-12-2017 a las 16:36:32
-- Versión del servidor: 5.5.57
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tucan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `cve_adm` varchar(15) NOT NULL,
  `nom_adm` varchar(30) NOT NULL,
  `tel_adm` varchar(10) NOT NULL,
  `mail_adm` varchar(40) NOT NULL,
  PRIMARY KEY (`cve_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseguradora`
--

DROP TABLE IF EXISTS `aseguradora`;
CREATE TABLE IF NOT EXISTS `aseguradora` (
  `cve_ase` int(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_ase` varchar(30) NOT NULL,
  `tel_ase` varchar(10) NOT NULL,
  `mail_ase` varchar(40) DEFAULT NULL,
  `ncuenta_ase` varchar(20) NOT NULL,
  `infoextra_ase` text NOT NULL,
  PRIMARY KEY (`cve_ase`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aseguradora`
--

INSERT INTO `aseguradora` (`cve_ase`, `nom_ase`, `tel_ase`, `mail_ase`, `ncuenta_ase`, `infoextra_ase`) VALUES
(1, 'MetLife', '0180099980', 'metlife@hotmail.com', '156503321234', 'MetLife es una empresa socialmente responsable con grandes ofertas de seguro.'),
(2, 'SureSure', '0445657829', 'sure-li@hotmail.com', '1565033241', 'Responsabilidad y confianza.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `cve_ciu` int(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_est` varchar(30) NOT NULL,
  `cve_est` int(2) UNSIGNED NOT NULL,
  PRIMARY KEY (`cve_ciu`),
  KEY `cve_est` (`cve_est`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`cve_ciu`, `nom_est`, `cve_est`) VALUES
(1, 'Zitacuaro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cve_cli` int(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_cli` varchar(30) NOT NULL,
  `fechareg_cli` date NOT NULL,
  `clasif_cli` varchar(30) NOT NULL,
  `nombreusu_cli` varchar(40) NOT NULL,
  `apellidos_usu` varchar(50) NOT NULL,
  `pass_cli` varchar(45) NOT NULL,
  `telefono_cli` varchar(15) NOT NULL,
  `correo_cli` varchar(50) NOT NULL,
  PRIMARY KEY (`cve_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cve_cli`, `nom_cli`, `fechareg_cli`, `clasif_cli`, `nombreusu_cli`, `apellidos_usu`, `pass_cli`, `telefono_cli`, `correo_cli`) VALUES
(1, 'Raunel', '2017-12-10', 'cliente', 'raunel', 'Perez', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '4321121691', 'raunel_95@live.com.mx'),
(8, '7', '2017-12-10', 'cliente', '7', '7', '902ba3cda1883801594b6e1b452790cc53948fda', '7', '7'),
(9, '9', '2017-12-10', 'cliente', '9', '9', '0ade7c2cf97f75d009975f4d720d1fa6c19f4897', '9', '9'),
(11, '1', '2017-12-12', 'cliente', '1', '1', '356a192b7913b04c54574d18c28d46e6395428ab', '1', '1'),
(12, 'peter', '2017-12-18', 'cliente', 'peter', 'parker', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '11111', 'peter@gmail.com'),
(13, 'soge', '2017-12-18', 'cliente', 'sogekingo', 'king', '5e9145c5c002e2b6a0b058a2905e327ee9b5901c', '5325352', 'hsdghs@90');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

DROP TABLE IF EXISTS `conductor`;
CREATE TABLE IF NOT EXISTS `conductor` (
  `cve_con` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_con` varchar(15) NOT NULL,
  `fechareg_con` date NOT NULL,
  `status_con` varchar(20) NOT NULL,
  `tipo_con` varchar(20) NOT NULL,
  `turno_con` varchar(50) NOT NULL,
  `password_con` varchar(40) NOT NULL,
  `telefono_con` varchar(15) NOT NULL,
  `correo_con` varchar(50) NOT NULL,
  `apellidos_con` varchar(50) NOT NULL,
  PRIMARY KEY (`cve_con`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`cve_con`, `nom_con`, `fechareg_con`, `status_con`, `tipo_con`, `turno_con`, `password_con`, `telefono_con`, `correo_con`, `apellidos_con`) VALUES
(7, 'Juan', '2017-12-17', 'Activo', 'Fijo', 'Matutino de 7:00AM a 3:00PM', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '7153214561', 'juanroj_97@hotmail.com', 'Rojas'),
(8, 'Ezequiel', '2017-12-18', 'Activo', 'Fijo', 'Matutino de 7:00AM a 3:00PM', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '71512012322', 'chequeg@gmail.com', 'Garza'),
(9, 'Alfredo', '2017-12-18', 'Activo', 'Fijo', 'Matutino de 7:00AM a 3:00PM', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '7151028675', 'alfredo_@gmail.com', 'Olivas'),
(10, 'Moy', '2017-12-18', 'Activo', 'Fijo', 'Matutino de 7:00AM a 3:00PM', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '71210297345', 'moy@gmail.com', 'Rivas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductorvehiculo`
--

DROP TABLE IF EXISTS `conductorvehiculo`;
CREATE TABLE IF NOT EXISTS `conductorvehiculo` (
  `cve_convehi` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fechareg_convehi` date NOT NULL,
  `cve_con` int(6) UNSIGNED NOT NULL,
  `cve_veh` int(5) UNSIGNED NOT NULL,
  `latLong_convehi` varchar(100) DEFAULT NULL,
  `status_convehi` varchar(30) DEFAULT NULL,
  `ciudad_convehi` varchar(300) NOT NULL,
  PRIMARY KEY (`cve_convehi`),
  KEY `cve_con` (`cve_con`),
  KEY `cve_veh` (`cve_veh`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conductorvehiculo`
--

INSERT INTO `conductorvehiculo` (`cve_convehi`, `fechareg_convehi`, `cve_con`, `cve_veh`, `latLong_convehi`, `status_convehi`, `ciudad_convehi`) VALUES
(15, '2017-12-17', 7, 5, '19.4428802,-100.3517785', 'disponible', 'Av. RevoluciÃ³n Nte., Moctezuma, 61505 ZitÃ¡cuaro, Mich., Mexico'),
(16, '2017-12-18', 8, 6, '19.4432501,-100.35146390000001', 'disponible', 'Av. RevoluciÃ³n Nte., Moctezuma, 61505 ZitÃ¡cuaro, Mich., Mexico'),
(17, '2017-12-18', 9, 7, '19.437561199999998,-100.3291455', 'disponible', 'De Los MecÃ¡nicos 11, 1ro. de Mayo, 61509 ZitÃ¡cuaro, Mich., Mexico'),
(18, '2017-12-18', 10, 8, '19.437561199999998,-100.3291455', 'disponible', 'De Los MecÃ¡nicos 11, 1ro. de Mayo, 61509 ZitÃ¡cuaro, Mich., Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duenio`
--

DROP TABLE IF EXISTS `duenio`;
CREATE TABLE IF NOT EXISTS `duenio` (
  `cve_due` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_due` varchar(30) NOT NULL,
  `mail_due` varchar(40) NOT NULL,
  `ncuenta_due` varchar(20) NOT NULL,
  `fechareg_due` date NOT NULL,
  `password_due` varchar(40) NOT NULL,
  PRIMARY KEY (`cve_due`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `duenio`
--

INSERT INTO `duenio` (`cve_due`, `nom_due`, `mail_due`, `ncuenta_due`, `fechareg_due`, `password_due`) VALUES
(5, 'Raunel Perez', 'raunel_95@live.com.mx', '123456789', '2017-12-11', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(6, 'Carlos Slim', 'charlesSl_65@hotmail.com', '9999999999', '2017-12-11', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(8, 'Peter bread', 'peter_00@wonder.com', '32444088', '2017-12-18', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(9, 'jhon', 'jhon@hotmail.com', '1565', '2017-12-18', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(10, 'pepe', 'pepe@gmail.com', '1092', '2017-12-18', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `cve_est` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_est` varchar(30) NOT NULL,
  PRIMARY KEY (`cve_est`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`cve_est`, `nom_est`) VALUES
(1, 'Michoacan');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listarviaje`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `listarviaje`;
CREATE TABLE IF NOT EXISTS `listarviaje` (
`cve_via` int(7) unsigned
,`tiposerv_via` varchar(15)
,`fecha_via` date
,`horaini_via` datetime
,`horafin_via` datetime
,`puntoini_via` text
,`puntofin_via` text
,`cantkm_via` varchar(20)
,`nom_cli` varchar(30)
,`apellidos_usu` varchar(50)
,`nom_con` varchar(15)
,`apellidos_con` varchar(50)
,`tiempoest_via` varchar(25)
,`status_via` varchar(40)
,`matricula_veh` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoaseguradora`
--

DROP TABLE IF EXISTS `pagoaseguradora`;
CREATE TABLE IF NOT EXISTS `pagoaseguradora` (
  `cve_pagase` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_pagase` date NOT NULL,
  `monto_pagase` varchar(4) NOT NULL,
  `cve_ase` int(3) UNSIGNED NOT NULL,
  `cve_adm` varchar(15) NOT NULL,
  PRIMARY KEY (`cve_pagase`),
  KEY `cve_ase` (`cve_ase`),
  KEY `cve_adm` (`cve_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoduenio`
--

DROP TABLE IF EXISTS `pagoduenio`;
CREATE TABLE IF NOT EXISTS `pagoduenio` (
  `cve_pagdue` int(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_pagdue` date NOT NULL,
  `monto_pagtar` varchar(4) NOT NULL,
  `cve_due` int(6) UNSIGNED NOT NULL,
  `cve_adm` varchar(15) NOT NULL,
  PRIMARY KEY (`cve_pagdue`),
  KEY `cve_due` (`cve_due`),
  KEY `cve_adm` (`cve_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagotarjeta`
--

DROP TABLE IF EXISTS `pagotarjeta`;
CREATE TABLE IF NOT EXISTS `pagotarjeta` (
  `cve_pagtar` int(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_pagtar` date NOT NULL,
  `monto_pagtar` varchar(4) NOT NULL,
  `num_tar` varchar(20) NOT NULL,
  `cve_via` int(7) UNSIGNED NOT NULL,
  PRIMARY KEY (`cve_pagtar`),
  KEY `num_tar` (`num_tar`),
  KEY `cve_via` (`cve_via`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poliza`
--

DROP TABLE IF EXISTS `poliza`;
CREATE TABLE IF NOT EXISTS `poliza` (
  `cve_pol` int(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tiposeg_pol` varchar(15) NOT NULL,
  `desc_pol` text NOT NULL,
  `periodopag_pol` varchar(30) NOT NULL,
  `monto_pol` varchar(15) NOT NULL,
  `cve_ase` int(3) UNSIGNED NOT NULL,
  `fechareg_pol` date NOT NULL,
  PRIMARY KEY (`cve_pol`),
  KEY `cve_ase` (`cve_ase`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `poliza`
--

INSERT INTO `poliza` (`cve_pol`, `tiposeg_pol`, `desc_pol`, `periodopag_pol`, `monto_pol`, `cve_ase`, `fechareg_pol`) VALUES
(1, 'vehiculo', 'Esta poliza ofrece un seguro total para vehiculo y sus pasajeros', 'anual', '60,000', 1, '0000-00-00'),
(5, 'MultivehÃ­culo', 'Cubre varios vehÃ­culos.', 'Anual', '90000', 2, '2017-12-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problema`
--

DROP TABLE IF EXISTS `problema`;
CREATE TABLE IF NOT EXISTS `problema` (
  `cve_prob` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_prob` varchar(30) NOT NULL,
  `desc_prob` text NOT NULL,
  PRIMARY KEY (`cve_prob`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problemaviaje`
--

DROP TABLE IF EXISTS `problemaviaje`;
CREATE TABLE IF NOT EXISTS `problemaviaje` (
  `cve_provia` int(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cve_prob` int(2) NOT NULL,
  `cve_via` int(7) UNSIGNED NOT NULL,
  PRIMARY KEY (`cve_provia`),
  KEY `cve_via` (`cve_via`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

DROP TABLE IF EXISTS `ruta`;
CREATE TABLE IF NOT EXISTS `ruta` (
  `cve_rut` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lat1` varchar(60) NOT NULL,
  `lon1` varchar(60) NOT NULL,
  `lat2` varchar(60) NOT NULL,
  `lon2` varchar(60) NOT NULL,
  `cve_via` int(7) UNSIGNED NOT NULL,
  PRIMARY KEY (`cve_rut`),
  KEY `cve_via` (`cve_via`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`cve_rut`, `lat1`, `lon1`, `lat2`, `lon2`, `cve_via`) VALUES
(3, '19.4324566', '-100.3553251', '19.4324566', '-99.6556591', 14),
(4, '19.4324566', '-100.3553251', '19.4324566', '-101.1949578', 15),
(5, '', '', '', '', 16),
(6, '19.4324566', '-100.3553251', '19.4324566', '-101.1949578', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

DROP TABLE IF EXISTS `tarifa`;
CREATE TABLE IF NOT EXISTS `tarifa` (
  `cve_tari` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `preciokm_tari` double NOT NULL,
  `precio5min_tari` double NOT NULL,
  `fecha_tari` datetime NOT NULL,
  `tipo_tari` varchar(25) NOT NULL,
  PRIMARY KEY (`cve_tari`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`cve_tari`, `preciokm_tari`, `precio5min_tari`, `fecha_tari`, `tipo_tari`) VALUES
(10, 30, 0.5, '2017-12-13 02:22:08', 'Lujo'),
(11, 20, 0.3, '2017-12-13 02:22:31', 'Semi-Lujo'),
(12, 35, 0.8, '2017-12-13 02:22:58', 'Lujo'),
(13, 40, 1, '2017-12-14 10:10:09', 'Lujo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

DROP TABLE IF EXISTS `tarjeta`;
CREATE TABLE IF NOT EXISTS `tarjeta` (
  `num_tar` varchar(20) NOT NULL,
  `instit_tar` varchar(30) NOT NULL,
  `pin_tar` varchar(20) NOT NULL,
  `vigencia_tar` date NOT NULL,
  `titular_tar` varchar(40) NOT NULL,
  `cve_cli` int(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`num_tar`),
  KEY `cve_cli` (`cve_cli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`num_tar`, `instit_tar`, `pin_tar`, `vigencia_tar`, `titular_tar`, `cve_cli`) VALUES
('01800', 'Bancomer', '1234', '2017-12-12', 'Yo meroOtravez', 1),
('1', '1', '1', '2017-07-01', '1', 11),
('1234', 'Banamex', '1234', '2020-12-12', 'pedro parker', 12),
('15650332', 'Banamex', '1234', '2017-07-01', 'Yo mero', 1),
('6543', 'Bancomer', '123678', '2018-12-12', 'pos el soge', 13),
('7', '7', '7', '2017-07-01', '7', 8),
('9', '9', '9', '2017-07-01', '9', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `cve_veh` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matricula_veh` varchar(15) NOT NULL,
  `modelo_veh` varchar(20) NOT NULL,
  `marca_veh` varchar(15) NOT NULL,
  `vigencia_veh` date NOT NULL,
  `desc_veh` text NOT NULL,
  `tiposerv_veh` varchar(15) NOT NULL,
  `cve_due` int(6) UNSIGNED NOT NULL,
  `cve_pol` int(3) UNSIGNED NOT NULL,
  `ciudad_veh` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`cve_veh`),
  KEY `cve_due` (`cve_due`),
  KEY `cve_pol` (`cve_pol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`cve_veh`, `matricula_veh`, `modelo_veh`, `marca_veh`, `vigencia_veh`, `desc_veh`, `tiposerv_veh`, `cve_due`, `cve_pol`, `ciudad_veh`) VALUES
(5, 'RBN-07-HCC', 'Platina', 'Ford', '2019-12-12', 'Vehiculo compacto de 4 puertas, maletero pequeño, asientos reclinables de piel.', 'Lujo', 6, 1, 'zitacuaro'),
(6, 'AJA-X3-44M', 'Aveo', 'Nissan', '2020-12-12', 'Muy comodo', 'Lujo', 8, 1, 'Toluca'),
(7, 'HCC-23-NL', 'Altima', 'Toyota', '2020-12-31', 'esta cool', 'Lujo', 9, 1, 'Zitacuaro'),
(8, 'JKL-MN-123', 'Aveo', 'Ford', '2020-12-31', 'tambien esta cool', 'Lujo', 10, 1, 'Zitacuaro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

DROP TABLE IF EXISTS `viaje`;
CREATE TABLE IF NOT EXISTS `viaje` (
  `cve_via` int(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tiposerv_via` varchar(15) NOT NULL,
  `fecha_via` date NOT NULL,
  `horaini_via` datetime DEFAULT NULL,
  `horafin_via` datetime DEFAULT NULL,
  `puntoini_via` text NOT NULL,
  `puntofin_via` text NOT NULL,
  `cantkm_via` varchar(20) DEFAULT NULL,
  `cve_convehi` int(6) UNSIGNED NOT NULL,
  `cve_cli` int(3) UNSIGNED NOT NULL,
  `monto_via` double DEFAULT NULL,
  `tiempoest_via` varchar(25) NOT NULL,
  `status_via` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cve_via`),
  KEY `cve_convehi` (`cve_convehi`),
  KEY `cve_cli` (`cve_cli`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`cve_via`, `tiposerv_via`, `fecha_via`, `horaini_via`, `horafin_via`, `puntoini_via`, `puntofin_via`, `cantkm_via`, `cve_convehi`, `cve_cli`, `monto_via`, `tiempoest_via`, `status_via`) VALUES
(14, 'Lujo', '2017-12-18', '2017-12-18 09:23:12', NULL, 'zitacuaro', 'toluca', '95.6 km', 15, 1, NULL, '1 hour 32 mins', 'en proceso'),
(15, 'Lujo', '2017-12-18', '2017-12-18 11:12:48', NULL, 'zitacuaro', 'morelia', '146 km', 17, 12, NULL, '2 hours 53 mins', 'en espera'),
(16, 'Lujo', '2017-12-18', '2017-12-18 11:32:54', NULL, 'zitacuaro', 'toluca', '', 18, 12, NULL, '', 'en espera'),
(17, 'Lujo', '2017-12-18', '2017-12-18 11:33:10', NULL, 'zitacuaro', 'morelia', '146 km', 18, 12, NULL, '2 hours 53 mins', 'en proceso');

-- --------------------------------------------------------

--
-- Estructura para la vista `listarviaje`
--
DROP TABLE IF EXISTS `listarviaje`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listarviaje`  AS  select `viaje`.`cve_via` AS `cve_via`,`viaje`.`tiposerv_via` AS `tiposerv_via`,`viaje`.`fecha_via` AS `fecha_via`,`viaje`.`horaini_via` AS `horaini_via`,`viaje`.`horafin_via` AS `horafin_via`,`viaje`.`puntoini_via` AS `puntoini_via`,`viaje`.`puntofin_via` AS `puntofin_via`,`viaje`.`cantkm_via` AS `cantkm_via`,`cliente`.`nom_cli` AS `nom_cli`,`cliente`.`apellidos_usu` AS `apellidos_usu`,`conductor`.`nom_con` AS `nom_con`,`conductor`.`apellidos_con` AS `apellidos_con`,`viaje`.`tiempoest_via` AS `tiempoest_via`,`viaje`.`status_via` AS `status_via`,`vehiculo`.`matricula_veh` AS `matricula_veh` from ((((`viaje` join `conductorvehiculo` on((`viaje`.`cve_convehi` = `conductorvehiculo`.`cve_convehi`))) join `conductor` on((`conductorvehiculo`.`cve_con` = `conductor`.`cve_con`))) join `cliente` on((`viaje`.`cve_cli` = `cliente`.`cve_cli`))) join `vehiculo` on((`conductorvehiculo`.`cve_veh` = `vehiculo`.`cve_veh`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`cve_est`) REFERENCES `estado` (`cve_est`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `conductorvehiculo`
--
ALTER TABLE `conductorvehiculo`
  ADD CONSTRAINT `conductorvehiculo_ibfk_1` FOREIGN KEY (`cve_con`) REFERENCES `conductor` (`cve_con`),
  ADD CONSTRAINT `conductorvehiculo_ibfk_2` FOREIGN KEY (`cve_veh`) REFERENCES `vehiculo` (`cve_veh`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagoaseguradora`
--
ALTER TABLE `pagoaseguradora`
  ADD CONSTRAINT `pagoaseguradora_ibfk_1` FOREIGN KEY (`cve_ase`) REFERENCES `aseguradora` (`cve_ase`),
  ADD CONSTRAINT `pagoaseguradora_ibfk_2` FOREIGN KEY (`cve_adm`) REFERENCES `administrador` (`cve_adm`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagoduenio`
--
ALTER TABLE `pagoduenio`
  ADD CONSTRAINT `pagoduenio_ibfk_1` FOREIGN KEY (`cve_due`) REFERENCES `duenio` (`cve_due`),
  ADD CONSTRAINT `pagoduenio_ibfk_2` FOREIGN KEY (`cve_adm`) REFERENCES `administrador` (`cve_adm`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagotarjeta`
--
ALTER TABLE `pagotarjeta`
  ADD CONSTRAINT `pagotarjeta_ibfk_1` FOREIGN KEY (`num_tar`) REFERENCES `tarjeta` (`num_tar`),
  ADD CONSTRAINT `pagotarjeta_ibfk_2` FOREIGN KEY (`cve_via`) REFERENCES `viaje` (`cve_via`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `poliza`
--
ALTER TABLE `poliza`
  ADD CONSTRAINT `poliza_ibfk_1` FOREIGN KEY (`cve_ase`) REFERENCES `aseguradora` (`cve_ase`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `problemaviaje`
--
ALTER TABLE `problemaviaje`
  ADD CONSTRAINT `problemaviaje_ibfk_1` FOREIGN KEY (`cve_via`) REFERENCES `viaje` (`cve_via`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`cve_via`) REFERENCES `viaje` (`cve_via`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `tarjeta_ibfk_1` FOREIGN KEY (`cve_cli`) REFERENCES `cliente` (`cve_cli`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`cve_due`) REFERENCES `duenio` (`cve_due`),
  ADD CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`cve_pol`) REFERENCES `poliza` (`cve_pol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`cve_convehi`) REFERENCES `conductorvehiculo` (`cve_convehi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`cve_cli`) REFERENCES `cliente` (`cve_cli`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
