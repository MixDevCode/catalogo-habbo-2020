-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2020 a las 03:12:17
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rareshl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `fecha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `ID` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Accion` text NOT NULL,
  `Horario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rares`
--

CREATE TABLE `rares` (
  `ID` int(11) NOT NULL,
  `Imagen` text NOT NULL,
  `Nombre` text NOT NULL,
  `Valor` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rares`
--

INSERT INTO `rares` (`ID`, `Imagen`, `Nombre`, `Valor`, `Descripcion`, `Categoria`) VALUES
(10, 'https://static.habbo-happy.net/img/furni/big/669911685865372.gif', 'Bola de Nieve', '140', 'Hehehehehe', 'Rares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Rango` text NOT NULL,
  `Keko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `Nombre`, `Contrasena`, `Rango`, `Keko`) VALUES
(5, 'Esteban', '$2y$10$6/IzXcBT45Xd8WtGAPaUquaOjLySmUw5.UKJh1NcgR6x.aXwD6BaW', 'Administrador', 'https://www.habbo.es/habbo-imaging/avatarimage?figure=hd-3092-1.ea-7108747-63.sh-7110639-1408.ch-3059-1413.hr-828-42.lg-3058-64&direction=3&head_direction=3&gesture=sml&action=&size=2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `rares`
--
ALTER TABLE `rares`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `rares`
--
ALTER TABLE `rares`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
