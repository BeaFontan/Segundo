-- Base de datos: `musica`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--
DROP TABLE IF EXISTS `tema`;

CREATE TABLE `tema` (
  `Titulo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Autor` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Ano` int(11) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `Imaxe` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES
('A Hard Day\'s Night', 'The Beatles', 1964, 214, 'Hard Day'),
('Born to run', 'Bruce Springsteen', 1975, 270, 'Born to run'),
('Confortable numb', 'Pink Floyd', 1979, 413, 'Confortable numb'),
('Good Vibrations', 'The Beach Boys', 1966, 215, 'Good Vibrations'),
('Hey Jude', 'The Beatles', 1968, 431, 'Hey Jude'),
('Hotel California', 'Eagles', 1976, 390, 'Hotel California'),
('Imagine', 'John Lennon', 1971, 183, 'Imagine'),
('It\'s Only Rock\'n Roll', 'The Rolling Stones', 1974, 307, 'Rockn Roll'),
('Light My Fire', 'The Doors', 1967, 428, 'Light My Fire'),
('Like a rolling stone', 'Bob Dylan', 1965, 369, 'Like a rolling stone'),
('Satisfaction', 'The Rolling Stones', 1965, 225, 'Satisfaction'),
('Stairway to heaven', 'Led Zeppelin', 1970, 482, 'Stairway to heaven');



--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`Titulo`,`Autor`);
COMMIT;

