-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 06, 2019 at 12:22 PM
-- Server version: 8.0.18
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyDB`
--
CREATE DATABASE IF NOT EXISTS `MyDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `MyDB`;

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

DROP TABLE IF EXISTS `Students`;
CREATE TABLE IF NOT EXISTS `Students` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `SURNAME` varchar(20) NOT NULL,
  `FATHERNAME` varchar(20) NOT NULL,
  `GRADE` float NOT NULL,
  `MOBILENUMBER` varchar(20) NOT NULL,
  `Birthday` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10036 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`ID`, `NAME`, `SURNAME`, `FATHERNAME`, `GRADE`, `MOBILENUMBER`, `Birthday`) VALUES
(10034, 'Κώστας', 'Βελουδάκης', 'Θέμης', 9, '6977189325', '1994-08-10'),
(10035, 'Sophia', 'Netsiou', 'Apostolis', 5, '1234567890', '1989-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `Teachers`
--

DROP TABLE IF EXISTS `Teachers`;
CREATE TABLE IF NOT EXISTS `Teachers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(20) NOT NULL,
  `SURNAME` varchar(20) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Teachers`
--

INSERT INTO `Teachers` (`ID`, `NAME`, `SURNAME`, `USERNAME`, `PASSWORD`, `EMAIL`) VALUES
(1001, 'Vasso', 'Netsiou', 'vai', '1234', 'vai@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
