-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 07:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `matier`
--

CREATE TABLE `matier` (
  `id` int(255) NOT NULL,
  `NM` varchar(255) NOT NULL,
  `QF` float(1,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matier`
--

INSERT INTO `matier` (`id`, `NM`, `QF`) VALUES
(2, 'analyse', 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `QF` float NOT NULL,
  `ds` decimal(11,0) NOT NULL,
  `exmen` decimal(11,0) NOT NULL,
  `cc` decimal(11,0) DEFAULT NULL,
  `NM` varchar(11) NOT NULL,
  `NF` decimal(11,0) NOT NULL,
  `idn` int(11) NOT NULL,
  `nomE` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`QF`, `ds`, `exmen`, `cc`, `NM`, `NF`, `idn`, `nomE`) VALUES
(1.5, 15, 20, 18, 'analyse', 20, 2, 'Chahin Fhima'),
(1.5, 15, 20, 10, 'analyse', 18, 3, 'malek fhima'),
(1.5, 20, 20, 20, 'analyse', 20, 4, 'Chahin Fhima'),
(1.5, 20, 20, 20, 'analyse', 20, 5, 'Chahin Fhima');

-- --------------------------------------------------------

--
-- Table structure for table `personnes`
--

CREATE TABLE `personnes` (
  `id` int(11) NOT NULL,
  `typ` varchar(50) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `num_tell` varchar(8) DEFAULT NULL,
  `adress` text DEFAULT NULL,
  `ville` varchar(100) NOT NULL,
  `code_p` varchar(20) NOT NULL,
  `paye` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date_nais` date DEFAULT NULL,
  `niveau_etud` varchar(100) DEFAULT NULL,
  `date_inscrit` date DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `date_deb` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pass` varchar(255) NOT NULL,
  `classe` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnes`
--

INSERT INTO `personnes` (`id`, `typ`, `nom`, `email`, `num_tell`, `adress`, `ville`, `code_p`, `paye`, `department`, `date_nais`, `niveau_etud`, `date_inscrit`, `titre`, `date_deb`, `created_at`, `pass`, `classe`) VALUES
(10, 'Etudiant', 'Chahin Fhima', 'chahinfhima@gmail.com', '56493702', 'Msakin 4070', 'Msakin', '4070', 'Tunisie', 'LT', '2005-11-03', '1', '2025-01-14', NULL, NULL, '2025-01-14 14:53:20', 'azerty01', '1LT1'),
(15, 'Etudiant', 'malek fhima', 'malekfhima@gmail.com', '99999999', 'Msakin 4070', 'Msakin', '4070', 'Tunisie', 'IOT', '2002-12-12', '2', '2025-01-14', NULL, NULL, '2025-01-14 17:52:09', 'azerty01', '2IOT1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matier`
--
ALTER TABLE `matier`
  ADD PRIMARY KEY (`id`,`NM`,`QF`) USING BTREE;

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idn`);

--
-- Indexes for table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matier`
--
ALTER TABLE `matier`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
