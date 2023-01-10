-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2022 a las 20:33:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE DATABASE videojuegos;

USE videojuegos;

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `nombre`, `contraseña`) VALUES
(32, 'pedro@gmail.com', 'Pedro', '$2y$10$yF03JcFmHPA8dLsYq3gKhebhYoDw7kRxYYbWtWeBU4YPLStPw9tlu'),
(33, 'manuel@gmail.com', 'Manuel', '$2y$10$4epxNfLfmXhlaxKb8mANMuBdzc8.1N3T5qjps4G2h3LiYgDcZ0k/G'),
(34, 'borja@gmail.com', 'Borja', '$2y$10$iIrlZ.eP7INEN95hA7eK1.Y1JeYqUkjp/12CXM0aK4btMrE8QuUJi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariovideojuego`
--

CREATE TABLE `usuariovideojuego` (
  `idUsuario` int(11) NOT NULL,
  `idVideojuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuariovideojuego`
--

INSERT INTO `usuariovideojuego` (`idUsuario`, `idVideojuego`) VALUES
(32, 31),
(32, 34),
(32, 36),
(32, 37),
(32, 38),
(32, 41),
(32, 43),
(32, 44),
(32, 45),
(33, 35),
(33, 36),
(33, 38),
(33, 42),
(33, 46),
(34, 30),
(34, 31),
(34, 32),
(34, 36),
(34, 37),
(34, 44),
(34, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuego`
--

CREATE TABLE `videojuego` (
  `idVideojuego` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `desarrollador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videojuego`
--

INSERT INTO `videojuego` (`idVideojuego`, `nombre`, `desarrollador`) VALUES
(30, 'Elden Ring', 'FromSoftware'),
(31, 'Valorant', 'Riot Games'),
(32, 'League of Legends', 'Riot Games'),
(33, 'Garrys Mod', 'Facepunch Studios'),
(34, 'GTAV', 'Rockstar'),
(35, 'Red Dead Redemption', 'Rockstar'),
(36, 'Minecraft', 'Mojang'),
(37, 'Subnautica', 'Unknown Worlds'),
(38, 'Subnautica: Below Zero', 'Unknown Worlds'),
(40, 'Mario Party 8', 'Nintendo'),
(41, 'Spore', 'EA'),
(42, 'FIFA22', 'EA'),
(43, 'Los Sims', 'EA'),
(44, 'FarCry 6', 'Ubisoft'),
(45, 'Counter-Strike: Global Ofensive', 'Valve'),
(46, 'Cities: Skyline', 'Paradox Interactive');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuariovideojuego`
--
ALTER TABLE `usuariovideojuego`
  ADD PRIMARY KEY (`idUsuario`,`idVideojuego`),
  ADD KEY `idVideojuego` (`idVideojuego`);

--
-- Indices de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  ADD PRIMARY KEY (`idVideojuego`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  MODIFY `idVideojuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuariovideojuego`
--
ALTER TABLE `usuariovideojuego`
  ADD CONSTRAINT `usuariovideojuego_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `usuariovideojuego_ibfk_2` FOREIGN KEY (`idVideojuego`) REFERENCES `videojuego` (`idVideojuego`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
