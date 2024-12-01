-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Xerado en: 17 de Nov de 2022 ás 19:20
-- Versión do servidor: 8.0.31
-- Versión do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proba`
--

-- --------------------------------------------------------

--
-- Estrutura da táboa `material`
--

CREATE TABLE `material` (
  `Nome` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Marca` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Tipo` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Prezo` int NOT NULL,
  `Imaxe` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- A extraer os datos da táboa `material`
--

INSERT INTO `material` (`Nome`, `Marca`, `Tipo`, `Prezo`, `Imaxe`) VALUES
('BoulderX', 'La sportiva', 'Zapatilla', 114, 'SportivaBoulderX.png'),
('Cares', 'Chiruca', 'Bota', 113, 'ChirucaCares.jpg'),
('Everest', 'Trango', 'Pantalón', 98, 'TrangoEverest.jpg'),
('Expedition', 'Lorpen', 'Calcetín', 33, 'LorpenExpedition.jpg'),
('FaceFire', 'North Face', 'Chaqueta', 354, 'NorthFaceFire.jpg'),
('FaceResolve', 'North Face', 'Chaqueta', 100, 'NorthFaceResolve.jpg'),
('Ishinca', 'Izas', 'Pantalón', 83, 'IzasIshinca.png'),
('Pointer', 'Boreal', 'Bota', 124, 'BorealPointer.jpg'),
('Quente', 'Altus', 'Calcetín', 37, 'AltusQuente.jpg'),
('Rilton', 'Trango', 'Chaqueta', 123, 'TrangoRilton.jpg'),
('TrenvincaAltus', 'Altus', 'Pantalón', 98, 'AltusTrevinca.jpg'),
('Ultra 3GTX', 'Salomon', 'Zapatilla', 130, 'SalomonUltra3GTX.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`Nome`,`Marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
