-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2021 at 03:26 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rezervacijadvorana`
--

-- --------------------------------------------------------

--
-- Table structure for table `dvorane`
--

DROP TABLE IF EXISTS `dvorane`;
CREATE TABLE IF NOT EXISTS `dvorane` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE latin2_croatian_ci NOT NULL,
  `kapacitet` int(11) NOT NULL,
  `odjel_id` int(11) NOT NULL,
  `vrsta_dvorane` varchar(255) COLLATE latin2_croatian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `odjel_id` (`odjel_id`),
  KEY `created_by` (`created_by`),
  KEY `deleted_by` (`deleted_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `dvorane`
--

INSERT INTO `dvorane` (`ID`, `naziv`, `kapacitet`, `odjel_id`, `vrsta_dvorane`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Dvorana B01', 55, 1, 'RaÄunalni labos', '2021-12-28 20:17:51', 1, '2021-12-28 23:54:56', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nastavnici`
--

DROP TABLE IF EXISTS `nastavnici`;
CREATE TABLE IF NOT EXISTS `nastavnici` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) COLLATE latin2_croatian_ci NOT NULL,
  `prezime` varchar(255) COLLATE latin2_croatian_ci NOT NULL,
  `e_mail` varchar(255) COLLATE latin2_croatian_ci NOT NULL,
  `tel` varchar(50) COLLATE latin2_croatian_ci NOT NULL,
  `adresa` varchar(255) COLLATE latin2_croatian_ci NOT NULL,
  `lozinka` text COLLATE latin2_croatian_ci NOT NULL,
  `administrator` tinyint(1) NOT NULL,
  `odjel_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `odjel_id` (`odjel_id`),
  KEY `deleted_by` (`deleted_by`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `nastavnici`
--

INSERT INTO `nastavnici` (`ID`, `ime`, `prezime`, `e_mail`, `tel`, `adresa`, `lozinka`, `administrator`, `odjel_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Mario', 'Curavic', 'mcuravic1@unidu.hr', '+38522350050', 'Obala Milutin Roka 32', '$2y$10$h.ZkoxsQURDxQ3JHdi9kaOzgwrXu4OaDv3Xx3RdL7uvgdtJJ8pMMK', 1, 1, '2021-12-28 13:37:50', 1, NULL, NULL, NULL, NULL),
(2, 'Marko', 'Markov', 'markomaric@gmail.com', '+385907456325', 'Ulica Partizana 5', '$2y$10$Z1r0WNvUiIXhVkicMVX17uIB4.I4coIKIjZtswFakmXUqEL3Ufon2', 0, 66, '2021-12-28 19:54:41', 1, '2021-12-28 23:28:35', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `odjel`
--

DROP TABLE IF EXISTS `odjel`;
CREATE TABLE IF NOT EXISTS `odjel` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE latin2_croatian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `deleted_by` (`deleted_by`),
  KEY `updated_by` (`updated_by`),
  KEY `created_by` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

DROP TABLE IF EXISTS `predmet`;
CREATE TABLE IF NOT EXISTS `predmet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) CHARACTER SET latin1 NOT NULL,
  `nastavnik_id` int(11) NOT NULL,
  `odjel_id` int(11) NOT NULL,
  `br_ucenika` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `odjel_id` (`odjel_id`),
  KEY `nastavnik_id` (`nastavnik_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `deleted_by` (`deleted_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

DROP TABLE IF EXISTS `rezervacije`;
CREATE TABLE IF NOT EXISTS `rezervacije` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `dvorana_id` int(11) NOT NULL,
  `nastavnik_id` int(11) NOT NULL,
  `aktivnost_id` int(11) NOT NULL,
  `pocetak` timestamp NOT NULL,
  `trajanje` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `dvorana_id` (`dvorana_id`),
  KEY `nastavnik_id` (`nastavnik_id`),
  KEY `predmet_id` (`aktivnost_id`),
  KEY `deleted_by` (`deleted_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
