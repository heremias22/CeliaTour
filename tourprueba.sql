-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2017 a las 14:26:02
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tourprueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE IF NOT EXISTS `datos` (
  `id` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desBreve` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desLarga` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `titulo`, `imagen`, `desBreve`, `desLarga`) VALUES
('id01', 'oveja', 'objeto1.jpg', 'Una oveja particular', 'Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja '),
('id02', 'objeto', 'objeto2.jpg', 'un objeto particular', 'Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE IF NOT EXISTS `informacion` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `desBreve` varchar(160) COLLATE utf8_spanish_ci NOT NULL,
  `desLarga` varchar(600) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`id`, `titulo`, `desBreve`, `desLarga`) VALUES
('id01', 'Objeto Valioso', 'Un objeto cuyo valor es imposible de saber pero segun las leyendas es un monton.', 'Se dice que aquel que posea el poder del anillo sera capaz de doblegar a los 7 reinos.'),
('id02', 'Anillo de Sauron', 'tiene un texto incrustado', 'un anillo para dominarlos a TODOS'),
('id03', 'Un iphone X', 'No importa lo que lleva', 'Solo necesitas saber que tiene logo de manzanita');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
