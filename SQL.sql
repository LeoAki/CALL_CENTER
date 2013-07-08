-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-07-2013 a las 13:20:05
-- Versión del servidor: 5.1.63
-- Versión de PHP: 5.3.5-1ubuntu7.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `CALL_CENTER`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE IF NOT EXISTS `Persona` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `dni` char(8) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`codigo`, `paterno`, `materno`, `nombres`, `dni`, `sexo`, `email`, `inicio`, `fin`) VALUES
(1, 'AQUINO', 'AQUINO', 'Leonardo', '70756255', 'M', 'leoaki19@gmail.com', '2013-07-01', '2015-07-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_history`
--

CREATE TABLE IF NOT EXISTS `User_history` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idpersona` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `User_history`
--

INSERT INTO `User_history` (`codigo`, `usuario`, `accion`, `descripcion`, `idpersona`) VALUES
(1, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-07 20:37:37', 1),
(2, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-07 20:46:10', 1),
(3, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-07 20:46:45', 1),
(4, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-07 20:47:18', 1),
(5, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-07 20:48:13', 1),
(6, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-07 21:32:44', 1),
(7, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-07 21:46:34', 1),
(8, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-07 23:09:56', 1),
(9, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-08 08:33:29', 1),
(10, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-08 08:55:22', 1),
(11, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-08 08:58:22', 1),
(12, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-08 09:50:53', 1),
(13, 'ADMIN', 'INGRESO AL SISTEMA DEL USUARIO: ADMIN CON CODIGO: 1 Y PASS: admin123', '2013-07-08 10:40:28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `idperfil` int(4) NOT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `idpersona` int(11) NOT NULL,
  `nivel` int(1) DEFAULT NULL,
  `inscripcion` date DEFAULT NULL,
  `ultimasesion` datetime DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `idpersona` (`idpersona`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`codigo`, `usuario`, `contrasena`, `idperfil`, `estado`, `idpersona`, `nivel`, `inscripcion`, `ultimasesion`) VALUES
(1, 'ADMIN', 'admin123', 1, 'activo', 1, 1, '2013-07-01', '2013-07-08 10:40:28');

--
-- (Evento) desencadenante `Usuario`
--
DROP TRIGGER IF EXISTS `history_user`;
DELIMITER //
CREATE TRIGGER `history_user` AFTER UPDATE ON `Usuario`
 FOR EACH ROW BEGIN

insert into User_history
(accion,usuario,descripcion,idpersona)
values(
CONCAT('INGRESO AL SISTEMA DEL USUARIO: ',OLD.usuario,' CON CODIGO: ',OLD.idpersona,' Y PASS: ',OLD.contrasena),
NEW.usuario,
NEW.ultimasesion,
OLD.idpersona
);

END
//
DELIMITER ;
