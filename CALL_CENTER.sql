-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-07-2013 a las 00:44:51
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `CALL_CENTER`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Cliente`(
in acodigo int(11),
in amensaje varchar(100),
in apaterno varchar(100),
in amaterno varchar(100),
in anombres varchar(100),
in aresponsable int(11),
in adni char(8),
in afecha_nac date,
in acelular varchar(100),
in afijo varchar(100),
in adireccion varchar(100),
in aemail varchar(100),
in adistrito int(11)
)
if exists( select * from Cliente where codigo=acodigo) then
	update Cliente
	set
	mensaje=amensaje,
	paterno=apaterno,
	materno=amaterno,
	nombres=anombres,
	responsable=aresponsable,
	dni=adni,
	fecha_nac=afecha_nac,
	celular=acelular,
    fijo=afijo,
    direccion=adireccion,
    email=aemail,
    distrito=adistrito
	where
	codigo=acodigo;
else
	insert into Cliente
	(mensaje,paterno,materno,nombres,responsable,dni,fecha_nac,celular,fijo,direccion,email,distrito)
	values
	(amensaje,apaterno,amaterno,anombres,aresponsable,adni,afecha_nac,acelular,afijo,adireccion,aemail,adistrito);
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Personas`(
in acodigo int(11),
in apaterno varchar(50),
in amaterno varchar(50),
in anombres varchar(100),
in adni char(8),
in asexo char(1),
in aemail varchar(100),
in ainicio date,
in afin date,
in ausuario varchar(25),
in acontrasena varchar(32),
in anivel int(4),
in aestado int(1),
in aultimasesion datetime
)
if exists( select * from Persona where codigo=acodigo) then
	update Persona
	set
	paterno=apaterno,
	materno=amaterno,
	nombres=anombres,
	dni=adni,
	sexo=asexo,
	email=aemail,
    inicio=ainicio,
    fin=afin,
    usuario=ausuario,
    contrasena=acontrasena,
    nivel=anivel,
    estado=aestado,
    ultimasesion=aultimasesion
	where
	codigo=acodigo;
else
	insert into Persona
	(paterno,materno,nombres,dni,sexo,email,inicio,fin,usuario,contrasena,nivel,estado,ultimasesion)
	values
	(apaterno,amaterno,anombres,adni,asexo,aemail,ainicio,afin,ausuario,acontrasena,anivel,aestado,aultimasesion);
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Sp_Usuario`(
in acodigo int(11),
in ausuario varchar(25),
in acontrasena varchar(32),
in aidperfil int(4),
in aestado varchar(100),
in aidpersona int(11),
in anivel int(1),
in ainscripcion date,
in aultimasesion datetime
)
if exists(select * from Usuario where codigo=acodigo) then 
	update Usuario
	set	
usuario=ausuario,
contrasena=acontrasena,
idperfil=aidperfil,
estado=aestado,
idpersona=aidpersona,
nivel=anivel,
inscripcion=ainscripcion,
ultimasesion=aultimasesion
where
codigo=acodigo;
else
	insert into Usuario
	(usuario,contrasena,idperfil,estado,idpersona,nivel,inscripcion,ultimasesion)
         values
        (ausuario,acontrasena,aidperfil,aestado,aidpersona,anivel,ainscripcion,aultimasesion);
end if$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje` varchar(100) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `responsable` int(11) NOT NULL,
  `dni` char(8) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `fijo` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `distrito` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `distrito` (`distrito`),
  KEY `responsable` (`responsable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos_lima`
--

CREATE TABLE IF NOT EXISTS `distritos_lima` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `distrito` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `distritos_lima`
--

INSERT INTO `distritos_lima` (`codigo`, `distrito`) VALUES
(1, 'Ancon'),
(2, 'Ate'),
(3, 'Barranco'),
(4, 'Bre&ntilde;a'),
(5, 'Carabayllo'),
(6, 'Cercado De Lima'),
(7, 'Chaclacayo'),
(8, 'chorrillos'),
(9, 'Cieneguilla'),
(10, 'Comas'),
(11, 'El Agustino'),
(12, 'Independencia'),
(13, 'Jesus Maria'),
(14, 'La Molina'),
(15, 'La Victoria'),
(16, 'Lince'),
(17, 'Los Olivos'),
(18, 'Lurigancho-chosica'),
(19, 'Lurin'),
(20, 'Magdalena Del Mar'),
(21, 'Pueblo Libre'),
(22, 'Miraflores'),
(23, 'Pachacamac'),
(24, 'Pucusana'),
(25, 'Puente Piedra'),
(26, 'Punta Hermosa'),
(27, 'Punta Negra'),
(28, 'Rimac'),
(29, 'San Bartolo'),
(30, 'San Borja'),
(31, 'San Isidro'),
(32, 'San Juan De Lurigancho'),
(33, 'San juan De Miraflores'),
(34, 'San Luis'),
(35, 'San Martin De Porres'),
(36, 'San miguel'),
(37, 'Santa Anita'),
(38, 'Santa Maria Del Mar'),
(39, 'Santa Rosa'),
(40, 'Santiago De Surco'),
(41, 'Surquillo'),
(42, 'Villa El Salvador'),
(43, 'Villa MAria Del Triunfo');

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
  `inicio` date DEFAULT NULL,
  `fin` date NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `nivel` int(4) NOT NULL,
  `estado` int(1) NOT NULL,
  `ultimasesion` datetime NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`codigo`, `paterno`, `materno`, `nombres`, `dni`, `sexo`, `email`, `inicio`, `fin`, `usuario`, `contrasena`, `nivel`, `estado`, `ultimasesion`) VALUES
(1, 'AQUINO', 'AQUINO', 'Leonardo', '70756255', 'M', 'leoaki19@gmail.com', '2013-07-01', '2015-07-01', 'ADMIN', 'admin123', 1, 1, '2013-07-12 23:56:50'),
(10, 'Aquino', 'Carhuatocto', 'Lucero gabriela', '70756211', 'M', 'leoaki19@chinguel.es', '0000-00-00', '0000-00-00', 'LAquino', '70756211', 3, 0, '0000-00-00 00:00:00'),
(9, 'Aquino', 'Carhuatocto', 'Erick', '70756256', 'M', 'erickakino@gmail.com', '2013-07-01', '2013-07-31', 'EAquino', '70756256', 3, 0, '2013-07-12 22:57:59'),
(11, 'LEO', 'AQUINO', 'AQUINO', '70704122', 'M', 'leoaki19@gmail.com', '2013-07-03', '2013-07-03', '123er', '123er', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `User_history`
--

CREATE TABLE IF NOT EXISTS `User_history` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `User_history`
--

INSERT INTO `User_history` (`codigo`, `usuario`, `descripcion`) VALUES
(1, 1, '2013-07-07 20:37:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
