-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-11-2013 a las 23:41:03
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `talentum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articulo` varchar(200) NOT NULL,
  `descripcion` text,
  `categoria` int(11) NOT NULL,
  `subCategoria` int(11) NOT NULL,
  `peso` double DEFAULT NULL,
  `joya1` text NOT NULL,
  `foto1` text NOT NULL,
  `joya2` text,
  `foto2` text,
  `joya3` text,
  `foto3` text,
  `joya4` text,
  `foto4` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `articulo`, `descripcion`, `categoria`, `subCategoria`, `peso`, `joya1`, `foto1`, `joya2`, `foto2`, `joya3`, `foto3`, `joya4`, `foto4`) VALUES
(3, 'graduacion1', 'anillo especial para graduaciones', 17, 4, 5, '1670_picture.png', 'shutup-and-take-my-money-meme-template-150x150.jpg', '', '', '', '', '', ''),
(4, 'e2', 'anillo ideal de e2sistems!!', 17, 4, 6, '+logito.jpg', '65006_10152988191625716_399232161_a.jpg', 'FlechaArriba.png', '1004649_10201712509313634_68448403_n.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `img`) VALUES
(1, 'Graduacion', 'a3.jpg'),
(4, 'Compromisos', 'a2.jpg'),
(5, 'Matrimonios', 'a4.jpg'),
(6, 'Cruzados', 'a1.jpg'),
(7, 'magicos', 'a5.jpg'),
(8, 'grande', 'img360_2.jpg'),
(9, 'oro', 'oro.png'),
(10, 'otros', 'a1.jpg'),
(11, 'grandes', 'a3.jpg'),
(17, 'e2sistems', '+logito.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` text NOT NULL,
  `clave` text NOT NULL,
  `rif` varchar(20) DEFAULT NULL,
  `nombre` text NOT NULL,
  `direccion` text,
  `telefono` varchar(25) DEFAULT NULL,
  `celular` int(25) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE IF NOT EXISTS `precios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `monto` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id`, `descripcion`, `monto`) VALUES
(1, '18Kilates', 1500),
(2, '10Kilates', 1200),
(3, 'Livianos', 600),
(4, 'Pesado', 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subnombre` varchar(200) NOT NULL,
  `img` text NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `subnombre`, `img`, `idCategoria`) VALUES
(1, 'Dama', 'PANO_20130711_174143.jpg', 1),
(2, 'Dama', 'PANO_20130711_172837.jpg', 4),
(3, 'caballero', 'PANO_20130711_172837.jpg', 4),
(4, 'like sir', '1840_picture.png', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
