-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 17-10-2024 a las 07:48:53
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `folla1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xogador`
--

CREATE TABLE `xogador` (
  `id` int NOT NULL,
  `dni` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `nome` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apelidos` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `xogador`
--

INSERT INTO `xogador` (`id`, `dni`, `nome`, `apelidos`, `idade`) VALUES
(1, '3547854P', 'Manuel', 'Pérez', 20),
(2, '14574857U', 'Paco', 'Fernández', 22),
(3, '12345678P', 'Alejandro', 'Azul', 44),
(4, '24574857K', 'Lucía', 'Verde', 22),
(5, '85474125J', 'Julio', 'Amarillo', 52),
(6, '14785424K', 'Carlos', 'Azul Oscuro', 47),
(7, '8747454L', 'Manuela', 'Marrón', 74);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `xogador`
--
ALTER TABLE `xogador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `xogador`
--
ALTER TABLE `xogador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
