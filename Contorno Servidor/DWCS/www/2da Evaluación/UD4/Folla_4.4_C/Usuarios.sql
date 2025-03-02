-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: dbXDebug
-- Generation Time: Jan 18, 2025 at 12:08 PM
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
-- Database: `Usuarios`
--

-- --------------------------------------------------------

--
-- Table structure for table `datos`
--

CREATE TABLE `datos` (
  `nome` varchar(255) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `datos`
--

INSERT INTO `datos` (`nome`, `pass`) VALUES
('Bea', '$2y$10$4jk7wNF/UKM62JefHS1TuuQIflXg.nFRS135HV68qikNx87fVU2s.'),
('Pablo', '$2y$10$EtXTmh3TAmqk8k4ohDUeduyedupGGTzn.iasynAVKeay2GjjJKZyS');

-- --------------------------------------------------------

--
-- Table structure for table `usuariosTempo`
--

CREATE TABLE `usuariosTempo` (
  `nome` varchar(40) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `ultimaconexion` datetime NOT NULL,
  `rol` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuariosTempo`
--

INSERT INTO `usuariosTempo` (`nome`, `passwd`, `ultimaconexion`, `rol`) VALUES
('Akira', '$2y$10$RUX.xzbKKNG9OncmaQwNzuPtiTOAQOCVQr7EU9WVpXkKBrKMfdg0i', '1970-01-01 00:00:00', 'admin'),
('Apolo', '$2y$10$Jl3G/Qo/WtTqcQfB9rHJmuuEouP4U0GZ9rd9wrvbwR18s2LtS9XFy', '1970-01-01 00:00:00', 'admin'),
('Bea', '$2y$10$GzK/ff4w4BJEdSlQFLh.GeQaTP8k9NDwyYOloL8exYstCd9E9VF32', '1970-01-01 00:00:00', 'admin'),
('Brais', '$2y$10$NoI0OwHmzrocftrZWkRds.ZbYoJD69s0hrhCmNnWFbzsCCH9tlHdS', '2025-01-18 12:07:54', 'usuario'),
('Freya', '$2y$10$T7exv6NB8C7Ynfeni4RhnO/1.1CXZezPAKz.UXrF3xGmZE93zgBoG', '1970-01-01 00:00:00', 'usuario'),
('Hera', '$2y$10$vKsGO07IrmEGdq3GsyyRW.NmDBqXSL2Oat.s34wp/VHoHHT5MVBt6', '1970-01-01 00:00:00', 'admin'),
('Iris', '$2y$10$rAVLzKPtZ0KKB5NaAEu9POo7WYt4TINtxY6aqZ9yZwmqz4MyNFcf2', '1970-01-01 00:00:00', 'admin'),
('Lilith', '$2y$10$gyXameCO.1fDztX5s1yySuxfJVPQRzEf/pAqc2uAGXcEicX0pNj1O', '1970-01-01 00:00:00', 'admin'),
('Luna', '$2y$10$PdHaekS50DFbR46lXwqHkeJQGDaKwivzg897CMqpb6yIloozbRtjq', '1970-01-01 00:00:00', 'usuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`nome`);

--
-- Indexes for table `usuariosTempo`
--
ALTER TABLE `usuariosTempo`
  ADD PRIMARY KEY (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
