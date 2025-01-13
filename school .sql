-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 07:36 PM
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
  `QF` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `QF` decimal(11,0) NOT NULL,
  `ds` decimal(11,0) NOT NULL,
  `exmen` decimal(11,0) NOT NULL,
  `cc` decimal(11,0) DEFAULT NULL,
  `NM` varchar(11) NOT NULL,
  `NF` decimal(11,0) NOT NULL,
  `idn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9, 'Etudiant', 'Chahin Fhima', 'chahinfhima@gmail.com', '56493702', 'Msakin 4070', 'Msakin', '4070', 'Tunisie', '0', '2005-11-03', '1', '2025-01-13', NULL, NULL, '2025-01-13 12:00:00', 'azerty01', '101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matier`
--
ALTER TABLE `matier`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
