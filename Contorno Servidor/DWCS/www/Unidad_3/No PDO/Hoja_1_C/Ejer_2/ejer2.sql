-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 18-10-2024 a las 09:02:15
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
-- Base de datos: `ejer2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traxectos`
--

CREATE TABLE `traxectos` (
  `orixe` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `destino` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `distancia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `traxectos`
--

INSERT INTO `traxectos` (`orixe`, `destino`, `distancia`) VALUES
('Madrid', 'Segovia', 90201),
('Madrid', 'A Coruña', 596887),
('Barcelona', 'Cádiz', 1152670),
('Bilbao', 'Valencia', 622233),
('Sevilla', 'Santander', 832067),
('Oviedo', 'Badajoz', 682429);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
