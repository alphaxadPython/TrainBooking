-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 01:31 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `train`
--
CREATE DATABASE IF NOT EXISTS `train` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `train`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `placeFrom` varchar(100) NOT NULL,
  `PlaceTo` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Departure` varchar(100) NOT NULL,
  `TrainClass` varchar(100) NOT NULL,
  `SeatNo` varchar(100) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `BookingId` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `fullname`, `phone`, `receipt`, `placeFrom`, `PlaceTo`, `Date`, `Departure`, `TrainClass`, `SeatNo`, `Email`, `BookingId`) VALUES
(1, 'alpha', '0743183433', 'QTY123', 'morogoro', 'Dar-es-salaam', '2021-03-10', '14:00', 'B', '002', 'alpha@gmail.com', '15129'),
(2, 'alpha', '0743196599', '1000', 'morogoro', 'Dar-es-salaam', '2021-03-09', '06:00', 'A', '001', 'alpha@gmail.com', '9246'),
(3, 'alpha jozee', '0643196523', '1000', 'Tabora', 'Dar-es-salaam', '2021-03-13', '06:00', 'A', '001', 'juma@gmail.com', '27215'),
(4, 'juma', '0743196599', '1000', 'Dodoma', 'Dar-es-salaam', '2021-03-18', '06:00', 'A', '001', 'hamis@gmail.com', '23624'),
(5, 'alex', '0743196599', '1000', 'Dodoma', 'morogoro', '2021-03-19', '06:00', 'A', '001', 'alex@gmail.com', '8731');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receiptNO` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`id`, `receiptNO`) VALUES
(1, 1000),
(2, 2000),
(3, 3000),
(4, 4000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
