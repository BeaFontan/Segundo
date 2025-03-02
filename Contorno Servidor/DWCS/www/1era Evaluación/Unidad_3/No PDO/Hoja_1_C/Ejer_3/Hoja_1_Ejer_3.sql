-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: dbXDebug
-- Generation Time: Nov 06, 2024 at 11:49 AM
-- Server version: 9.1.0
-- PHP Version: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hoja 1 Ejer 3`
--

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `titulo` varchar(200) NOT NULL,
  `director` varchar(200) NOT NULL,
  `anho` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`titulo`, `director`, `anho`) VALUES
('Inception', 'Christopher Nolan', 2010),
('The Godfather', 'Francis Ford Coppola', 1972),
('Pulp Fiction', 'Quentin Tarantino', 1994),
('Parasite', 'Bong Joon-ho', 2019),
('The Shawshank Redemption', 'Frank Darabont', 1994),
('The Dark Knight', 'Christopher Nolan', 2008);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
