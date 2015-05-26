-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 08:00 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `razvitak`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vijest` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mail` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vijest` (`vijest`),
  KEY `vijest_2` (`vijest`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `vijest`, `tekst`, `autor`, `vrijeme`, `mail`) VALUES
(1, 1, 'Ovo je komentar 1.', 'almin', '2015-05-25 11:09:26', 'almin.halilovic@hotmail.com'),
(2, 2, 'Ovo je komentar 2.', 'almin', '2015-05-25 11:09:42', 'ahalilovic5@etf.unsa.ba'),
(3, 1, 'Novi tekst', 'Almin Halilovic', '2015-05-22 08:27:19', ''),
(37, 1, 'cxvxcvxc ', 'Almin H.', '2015-05-26 17:43:08', 'almin@gmail.com'),
(38, 2, ' dfdsf', 'Almin H.', '2015-05-26 17:46:16', 'almin@gmail.com'),
(39, 1, 'cvxv ', 'Almin H.', '2015-05-26 17:47:34', 'almin@gmail.com'),
(40, 2, ' fghfgh', 'Komentator', '2015-05-26 17:49:27', 'almin@gmail.com'),
(41, 2, ' sdfsdf', 'Almin H.', '2015-05-26 17:53:45', 'almin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `varchar` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`varchar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE IF NOT EXISTS `vijest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `vrijeme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imaDetalja` tinyint(1) NOT NULL,
  `detalji` text COLLATE utf8_slovenian_ci,
  `slika` varchar(250) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `naslov`, `tekst`, `autor`, `vrijeme`, `imaDetalja`, `detalji`, `slika`) VALUES
(1, 'Vijest 1', 'Ovo je vijest 1', 'Almin Halilovic', '2015-05-22 08:27:07', 0, NULL, NULL),
(2, 'Vijest 2', 'Sada ću napisati neki osnovni tekst.\r\nOvaj osnovni tekst se nalazi u više redova.\r\nLorem ipsum dolor sit amet i tako dalje mrsko mi je da kopiram.', 'Almin Halilović', '2015-05-25 10:45:57', 1, 'Ovdje sada slijedi detaljniji tekst novosti. \r\nLorem ipsum dolor sit amet i tako dalje mrsko mi je da kopiram.\r\nLorem ipsum dolor sit amet i tako dalje mrsko mi je da kopiram.', 'https://zamger.etf.unsa.ba/images/16x16/zad_ok.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`vijest`) REFERENCES `komentar` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
