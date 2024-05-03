-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2024 at 08:54 PM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `productes`
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
-- Dumping data for table `productes`
--

INSERT INTO `productes` (`Id`, `Nom`, `Preu`, `Stock`, `Mides`, `Descripció`, `Imatge`) VALUES
(2, 'Apple iPhone 15 Pro Max 256GB Titanio Negro Libre', 1295, 18, ', \'Alt: 15,99 cm, Ample: 7,67 cm, Gruix: 0,93', 'Forjat en titani i amb el revolucionari xip A17 Pro, un botó Acció personalitzable i el sistema de càmeres més potent que hagi tingut un iPhone.', 'https://m.media-amazon.com/images/I/81fYvFvX-8L._AC_UF1000,1000_QL80_.jpg'),
(13, 'Fanatec ClubSport WRC Bundle', 1239, 100, 'Alt: 70 cm, Ample: 50 cm, Gruix: 30 cm', 'Oficialment llicenciat pel Campionat del Món de Ral·lis (WRC), el volant CSL Elite WRC és perfecte per dominar les etapes de ral·li més exigents.', 'https://fanatec.com/media/image/d8/73/ec/Product_thumbnail_Clubsport_WRC_Bundle.jpg'),
(22, 'Xiaomi Redmi Note 13 Pro 5G 12/512GB Negro Libre', 356.95, 7, 'Alt: 16,115 cm, Ample: 7,424 cm, Gruix: 0,79 cm', 'Redmi Note 13 Pro 5G no és només un smartphone, és una autèntica revolució en disseny que no passarà desapercebuda. El seu acabat, que només es troba en terminals premium, captivarà totes les mirades. Amb una pantalla corbada, aquest dispositiu es sent com una joia a les teves mans, i el seu estil és innegable. No content de ser simplement elegant, el Redmi Note 13 Pro 5G també juga amb els seus colors perquè trobis l\\\'estil perfecte per a tu. A més, els seus vores plans faciliten una adherència precisa i còmoda.', 'https://thumb.pccomponentes.com/w-530-530/articles/1080/10804900/1929-xiaomi-redmi-note-13-pro-5g-12-512gb-negro-libre.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuaris`
--

CREATE TABLE `usuaris` (
  `Id` int(11) NOT NULL,
  `Usuari` varchar(50) NOT NULL,
  `Contrasenya` varchar(255) NOT NULL,
  `Administrador` tinyint(1) NOT NULL DEFAULT 0,
  `Editor` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuaris`
--

INSERT INTO `usuaris` (`Id`, `Usuari`, `Contrasenya`, `Administrador`, `Editor`) VALUES
(1, 'fran', '$2y$10$4t.XRZ.rMk16zTr.Z5fdhuP1q7HdL1G8NORmJl4oNmYqLs8qkbKcy', 1, 1),
(7, 'omar', '$2y$10$2slVxRtcwmLPfjfuzdpdmO99Y87pSOzZtUaS8u90TFZhrQzxeNT/m', 1, 1),
(8, 'usuari', '$2y$10$Zk80aiCMtKFT01/TmDaCS.Zcs2/7u5a9Sfgeia7A5Rr0ULkpDv39.', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productes`
--
ALTER TABLE `productes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
