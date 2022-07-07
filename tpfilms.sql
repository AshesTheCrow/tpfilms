-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2022 at 06:13 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpfilms`
--

-- --------------------------------------------------------

--
-- Table structure for table `acteurs`
--

CREATE TABLE `acteurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acteurs`
--

INSERT INTO `acteurs` (`id`, `nom`) VALUES
(1, 'Christian Bale'),
(2, 'Samuel L. Jackson'),
(3, 'Jensen Ackles');

-- --------------------------------------------------------

--
-- Table structure for table `animes`
--

CREATE TABLE `animes` (
  `id` int(255) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descript` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dates` date NOT NULL,
  `saison` int(255) NOT NULL,
  `idepisodesuivant` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animes`
--

INSERT INTO `animes` (`id`, `titre`, `descript`, `dates`, `saison`, `idepisodesuivant`) VALUES
(1, 'Death Note', 'LE CAHIER DE LA MORT', '2004-07-14', 1, NULL),
(2, 'Death Note', 'LE CAHIER DE LA MORT', '2006-07-06', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(255) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descript` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `titre`, `descript`, `dates`) VALUES
(1, 'Pulp Fiction', 'The Big Mac', '1994-10-24'),
(2, 'Batman Begins', 'Batman\'s debut', '2005-07-05'),
(3, 'Hots Shots!', 'Une analyse trÃ¨s fine', '1992-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `realisateurs`
--

CREATE TABLE `realisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `realisateurs`
--

INSERT INTO `realisateurs` (`id`, `nom`) VALUES
(1, 'Tarantino');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(255) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descript` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dates` date NOT NULL,
  `saison` int(255) NOT NULL,
  `idepisodesuivant` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `titre`, `descript`, `dates`, `saison`, `idepisodesuivant`) VALUES
(1, 'Supernatural', 'CARRY ON MY WAYWARD SON', '2005-04-19', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realisateurs`
--
ALTER TABLE `realisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `animes`
--
ALTER TABLE `animes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `realisateurs`
--
ALTER TABLE `realisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`id`) REFERENCES `acteurs` (`id`);

--
-- Constraints for table `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`id`) REFERENCES `acteurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
