-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2024 a las 20:36:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `botigacrud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE `productes` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Preu` float NOT NULL,
  `Stock` int(11) NOT NULL,
  `Mides` varchar(100) NOT NULL,
  `Descripció` text DEFAULT NULL,
  `Imatge` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`Id`, `Nom`, `Preu`, `Stock`, `Mides`, `Descripció`, `Imatge`) VALUES
(2, 'Xiaomi Redmi Note 13 Pro 5G 12/512GB Negro Libre', 356.95, 12, 'Alto: 16,115 cm, Ample: 7,424 cm, Gruix: 0,79 cm', 'Redmi Note 13 Pro 5G no és només un smartphone, és una autèntica revolució en disseny que no passarà desapercebuda. El seu acabat, que només es troba en terminals premium, captivarà totes les mirades. Amb una pantalla corbada, aquest dispositiu es sent com una joia a les teves mans, i el seu estil és innegable. No content de ser simplement elegant, el Redmi Note 13 Pro 5G també juga amb els seus colors perquè trobis l\'estil perfecte per a tu. A més, els seus vores plans faciliten una adherència precisa i còmoda.', 'https://thumb.pccomponentes.com/w-530-530/articles/1080/10804900/1929-xiaomi-redmi-note-13-pro-5g-12-512gb-negro-libre.jpg'),
(13, 'Fanatec ClubSport WRC Bundle', 1239, 5, 'Alt: 70 cm, Ample: 50 cm, Gruix: 30 cm', 'Oficialment llicenciat pel Campionat del Món de Ral·lis (WRC), el volant CSL Elite WRC és perfecte per dominar les etapes de ral·li més exigents.', 'https://fanatec.com/media/image/d8/73/ec/Product_thumbnail_Clubsport_WRC_Bundle.jpg'),
(15, '1', 1, 1, '1', '1', 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202309/11/00197578530764____18__640x640.jpg'),
(16, '3', 3, 3, '3', '3', 'https://http2.mlstatic.com/D_NQ_NP_890564-MLA54008978956_022023-O.webp'),
(17, '5', 5, 5, '5', '5', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzJeFR2EBer0dKTgaUcO0cccZPxscfkpcb8vENUcUimw&s'),
(20, '7', 7, 7, '7', '7', 'https://thumb.pccomponentes.com/w-530-530/articles/1002/10025796/1563-horizon-forbidden-west-ps4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuari` varchar(50) NOT NULL,
  `contrasenya` varchar(255) NOT NULL,
  `user_type` enum('user','admin','editor') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuari`, `contrasenya`, `user_type`) VALUES
(1, 'fran', '$2y$10$VnRDQRIy14VPh940LohQG.JUTGJeNvZMLpPsHLKUYiEeOui4ooYF2', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productes`
--
ALTER TABLE `productes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
