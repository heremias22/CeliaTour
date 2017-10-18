-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2017 a las 20:46:47
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
  `imagen2` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen3` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desBreve` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `desLarga` varchar(10000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `titulo`, `imagen`, `imagen2`, `imagen3`, `desBreve`, `desLarga`) VALUES
('id01', 'oveja', 'objeto1.jpg', NULL, NULL, 'Una oveja particular', 'Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja '),
('id02', 'objeto', 'objeto2.jpg', NULL, NULL, 'un objeto particular', 'Una oveja particular Una oveja particularUna oveja particular Una oveja particularUna oveja '),
('id03', 'Escudo de armas', 'escudo.jpg', 'escudo1.jpg', NULL, '', 'Gran escudo de armas de grandes dimensiones, finalmente modelado, que constituye el blason de Alfonso XIII, en esencia, el mismo escudo que para su dinastia organizo su cuarto abuelo el rey Carlos III: los cinco cuarteles pertenecientes a la Nacion, uno a su linaje de Borbon-Anjou, y diez a sus demas antepasados.\r\nEn 1931 el ferbor republicano le cambia la corona real cerrada por la mural de la Republica que, muda, se presta acoger alrededor del de Castilla y Leon, los escudos de las principales casas reinantes de Europa, ancestros de nuestros reyes.Las iras contra el "Sr.Borbon" - que asi nombraba la prensa de la epoca al exiliado Alfonso XIII- se dirigen al primero de sus linajes y por eso caen del escuson las tres lises borbonicas, tambien las mismas florecillas de los cuarteles de las casas de Borgoa (IV), de Parma (V),y Medicis- Toscana (VI), mientras deja intactos los palos de Aragon (I), los palos y Aguilas de Aragon-Sicilia (II), la faja de Austria (III), el bandeado de Borgoa viejo (VII)Gran escudo de armas de grandes dimensiones, finalmente modelado, que constituye el blason de Alfonso XIII, en esencia, el mismo escudo que para su dinastia organizo su cuarto abuelo el rey Carlos III: los cinco cuarteles pertenecientes a la Nacion, uno a su linaje de Borbon-Anjou, y diez a sus demas antepasados.\r\nEn 1931 el ferbor republicano le cambia la corona real cerrada por la mural de la Republica que, muda, se presta acoger alrededor del de Castilla y Leon, los escudos de las principales casas reinantes de Europa, ancestros de nuestros reyes.Las iras contra el "Sr.Borbon" - que asi nombraba la prensa de la epoca al exiliado Alfonso XIII- se dirigen al primero de sus linajes y por eso caen del escuson las tres lises borbonicas, tambien las mismas florecillas de los cuarteles de las casas de Borgoa (IV), de Parma (V),y Medicis- Toscana (VI), mientras deja intactos los palos de Aragon (I), los palos y Aguilas de Aragon-Sicilia (II), la faja de Austria (III), el bandeado de Borgoa viejo (VII)');

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
