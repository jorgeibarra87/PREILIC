-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2012 a las 20:28:47
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `plico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nom_evento` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_propuesta` date DEFAULT NULL,
  `Hora_propuesta` varchar(200) DEFAULT '',
  `id_lugar` int(11) DEFAULT NULL,
  `id_solicitante` int(11) DEFAULT NULL,
  `id_usuario_reg` int(11) DEFAULT NULL,
  `estado` enum('pendiente','aprobado','no aprobado','realizado','no realizado') DEFAULT NULL,
  `fecha_apr` date DEFAULT NULL,
  `comentario_apr` varchar(200) DEFAULT '',
  `id_usuario_apr` int(11) DEFAULT NULL,
  `fecha_resultado` date DEFAULT NULL,
  `comentario_res` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_usuario_res` int(11) DEFAULT NULL,
  `costo` double(22,0) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `eventos_fk` (`id_lugar`),
  KEY `eventos_fk1` (`id_solicitante`),
  KEY `eventos_fk2` (`id_usuario_reg`),
  KEY `eventos_fk3` (`id_usuario_apr`),
  KEY `eventos_fk4` (`id_usuario_res`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nom_evento`, `fecha_registro`, `fecha_propuesta`, `Hora_propuesta`, `id_lugar`, `id_solicitante`, `id_usuario_reg`, `estado`, `fecha_apr`, `comentario_apr`, `id_usuario_apr`, `fecha_resultado`, `comentario_res`, `id_usuario_res`, `costo`) VALUES
(2, 'prueba uno', '2012-11-25', '2012-11-02', '09:00: am', 1, 1, 1, 'aprobado', '2012-11-27', 'comentario', 1, NULL, NULL, NULL, 2500000),
(4, 'prueba 3', '2012-11-26', '2012-11-03', '05:00:00 pm', 1, 1, 1, 'aprobado', '2012-11-27', '', 1, NULL, NULL, NULL, 2000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE IF NOT EXISTS `lugar` (
  `id_lugar` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(200) DEFAULT '',
  `tipo_lugar` varchar(200) DEFAULT '',
  PRIMARY KEY (`id_lugar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id_lugar`, `lugar`, `tipo_lugar`) VALUES
(1, 'Popayan', 'Municipio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nom_perfil` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nom_perfil`) VALUES
(1, 'administrador'),
(6, 'prueba'),
(7, 'digitador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `nom_permiso` varchar(200) DEFAULT '',
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nom_permiso`) VALUES
(1, 'todos los permisos'),
(2, 'crear usuarios'),
(3, 'ver usuarios'),
(4, 'editar usuarios'),
(5, 'datos basicos crear '),
(6, 'datos basicos ver'),
(7, 'datos basicos editar'),
(8, 'crear evento'),
(9, 'editar evento'),
(10, 'aprobar evento'),
(11, 'asignar recurso ver'),
(12, 'asignar recurso editar'),
(13, 'asignar recurso ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_perfil`
--

CREATE TABLE IF NOT EXISTS `permisos_perfil` (
  `id_permisoperfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_permisoperfil`),
  KEY `permisos_perfil_fk` (`id_perfil`),
  KEY `permisos_perfil_fk1` (`id_permiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `permisos_perfil`
--

INSERT INTO `permisos_perfil` (`id_permisoperfil`, `id_perfil`, `id_permiso`) VALUES
(3, 1, 1),
(4, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE IF NOT EXISTS `recurso` (
  `id_recurso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_recurso` varchar(200) DEFAULT '',
  `tipo_recurso` varchar(200) DEFAULT '',
  PRIMARY KEY (`id_recurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `nombre_recurso`, `tipo_recurso`) VALUES
(1, 'impulsadora', 'Recurso Humano'),
(2, 'vehiculo', 'Transporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursoasignado`
--

CREATE TABLE IF NOT EXISTS `recursoasignado` (
  `id_recursoasignado` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) DEFAULT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `cantidad` double(22,0) DEFAULT NULL,
  `valor` double(22,0) DEFAULT NULL,
  `subtotal` double(22,0) DEFAULT NULL,
  PRIMARY KEY (`id_recursoasignado`),
  KEY `recursoasignado_fk1` (`id_recurso`),
  KEY `recursoasignado_fk` (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `recursoasignado`
--

INSERT INTO `recursoasignado` (`id_recursoasignado`, `id_evento`, `id_recurso`, `cantidad`, `valor`, `subtotal`) VALUES
(2, 4, 1, 2, 1000000, 2000000),
(3, 2, 1, 5, 500000, 2500000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitante`
--

CREATE TABLE IF NOT EXISTS `solicitante` (
  `id_solicitante` int(11) NOT NULL AUTO_INCREMENT,
  `solicitante` varchar(200) DEFAULT '',
  `direccion` varchar(200) DEFAULT '',
  `telefono` varchar(200) DEFAULT '',
  `email` varchar(200) DEFAULT '',
  `tipo_solicitante` varchar(200) DEFAULT '',
  PRIMARY KEY (`id_solicitante`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `solicitante`
--

INSERT INTO `solicitante` (`id_solicitante`, `solicitante`, `direccion`, `telefono`, `email`, `tipo_solicitante`) VALUES
(1, 'Solicitante editado', '1234', '123', 'andrescar05@hotmail.com', 'Alcaldia'),
(2, 'Pepito Perez', '111', '222', 'johansebastian_91@hotmail.com', 'Estanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) DEFAULT '',
  `pass` varchar(200) DEFAULT '',
  `id_perfil` int(11) DEFAULT NULL,
  `funcionario` varchar(200) DEFAULT '',
  PRIMARY KEY (`id_usuario`),
  KEY `id_perfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `login`, `pass`, `id_perfil`, `funcionario`) VALUES
(1, 'administrador', 'admin', 1, 'administrador de sistemas'),
(2, 'juan', 'juan', 6, 'ppp');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_fk` FOREIGN KEY (`id_lugar`) REFERENCES `lugar` (`id_lugar`),
  ADD CONSTRAINT `eventos_fk1` FOREIGN KEY (`id_solicitante`) REFERENCES `solicitante` (`id_solicitante`),
  ADD CONSTRAINT `eventos_fk2` FOREIGN KEY (`id_usuario_reg`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `eventos_fk3` FOREIGN KEY (`id_usuario_apr`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `eventos_fk4` FOREIGN KEY (`id_usuario_res`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `permisos_perfil`
--
ALTER TABLE `permisos_perfil`
  ADD CONSTRAINT `permisos_perfil_fk` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`),
  ADD CONSTRAINT `permisos_perfil_fk1` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`);

--
-- Filtros para la tabla `recursoasignado`
--
ALTER TABLE `recursoasignado`
  ADD CONSTRAINT `recursoasignado_fk` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`),
  ADD CONSTRAINT `recursoasignado_fk1` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
