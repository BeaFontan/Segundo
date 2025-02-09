-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: dbXDebug
-- Generation Time: Feb 09, 2025 at 05:35 PM
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
-- Database: `tarefa4.7`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `producto_id` int NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `moderado` tinyint(1) NOT NULL,
  `data_moderacion` datetime DEFAULT NULL,
  `data_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario_id`, `producto_id`, `comentario`, `moderado`, `data_moderacion`, `data_creacion`) VALUES
(1, 2, 1, 'Bonita Camiseta', 0, NULL, '2025-02-09 17:00:40'),
(2, 2, 6, 'Este vestido me encanta', 1, '2025-02-09 17:32:24', '2025-02-09 17:00:49'),
(3, 2, 10, 'Unas botas excelentes', 1, '2025-02-09 17:32:43', '2025-02-09 17:01:11'),
(4, 2, 8, 'Estúpido!', 0, NULL, '2025-02-09 17:01:19'),
(6, 2, 1, '&lt;script&gt;alert(&quot;Soy Hacker”)&lt;/script&gt;', 0, NULL, '2025-02-09 17:01:34'),
(7, 2, 4, 'Me encantan estas zapatillas', 1, '2025-02-09 17:32:17', '2025-02-09 17:06:21'),
(8, 2, 1, 'En verde era mejor', 0, NULL, '2025-02-09 17:15:11'),
(9, 2, 6, 'Muy chulo', 0, NULL, '2025-02-09 17:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `familia` varchar(100) NOT NULL,
  `imaxe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nome`, `descripcion`, `familia`, `imaxe`) VALUES
(1, 'Camiseta Negra', 'Camiseta de algodón 100% color negro, manga corta.', 'Camisetas', 'imaxes/camiseta_negra.jpg'),
(2, 'Pantalón Vaquero', 'Pantalón jeans azul de corte recto, estilo clásico.', 'Pantalones', 'imaxes/pantalon_vaquero.jpg'),
(3, 'Sudadera con Capucha', 'Sudadera azul con capucha y bolsillo frontal.', 'Sudaderas', 'imaxes/sudadera_capucha.jpg'),
(4, 'Zapatillas Deportivas', 'Zapatillas blancas con suela de goma antideslizante.', 'Calzado', 'imaxes/zapatillas_deportivas.jpg'),
(5, 'Chaqueta de Cuero', 'Chaqueta de cuero sintético negro, corte moderno.', 'Chaquetas', 'imaxes/chaqueta_cuero.jpg'),
(6, 'Vestido Rojo', 'Vestido corto rojo con tirantes y tela ligera.', 'Vestidos', 'imaxes/vestido_rojo.jpg'),
(7, 'Bufanda de Lana', 'Bufanda de lana gruesa en color gris.', 'Accesorios', 'imaxes/bufanda_lana.jpg'),
(8, 'Gorra de Béisbol', 'Gorra azul ajustable.', 'Accesorios', 'imaxes/gorra_beisbol.jpg'),
(9, 'Pantalón Deportivo', 'Pantalón de chándal negro con elástico en la cintura.', 'Pantalones', 'imaxes/pantalon_deportivo.jpg'),
(10, 'Botas de Invierno', 'Botas beige impermeables con forro de borrego.', 'Calzado', 'imaxes/botas_invierno.jpg'),
(11, 'Chaleco Acolchado', 'Chaleco acolchado azul con cremallera y bolsillos.', 'Chaquetas', 'imaxes/chaleco_acolchado.jpg'),
(12, 'Zapatillas Running', 'Zapatillas ligeras con suela amortiguada para correr.', 'Calzado', 'imaxes/zapatillas_running.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `email` varchar(150) NOT NULL,
  `contrasinal` varchar(255) NOT NULL,
  `rol` enum('usuario','moderador','administrador') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apelido1` varchar(100) NOT NULL,
  `apelido2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ultima_conexion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contrasinal`, `rol`, `nome`, `apelido1`, `apelido2`, `ultima_conexion`) VALUES
(1, 'admin@admin.com', '$2y$10$FMdMUtSkZE38sLBf/X3L7uGu/Qd7yaHggo2Ct/nR8GcLTmMu/.XSS', 'administrador', 'admin', 'admin', NULL, '2025-02-09 17:24:18'),
(2, 'bea@bea.com', '$2y$10$jHXxb3kkPhYtcagfS0KrJ.FOVxdLG.CQaTy.NhA/zlEr2d.V4krdy', 'usuario', 'Bea', 'Fontán', 'Padín', '2025-02-09 17:23:54'),
(3, 'brais@brais.es', '$2y$10$L22h7BMhbeyt7tlgHD7nNes08PSuv.xsGqDlSxp/qDWpI3E2IKlCO', 'moderador', 'Brais', 'Loureiro', 'Duarte', '2025-02-09 17:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto` (`producto_id`),
  ADD KEY `fk_user` (`usuario_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
