-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2020 at 01:46 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `personsinfo`
--

DROP TABLE IF EXISTS `personsinfo`;
CREATE TABLE IF NOT EXISTS `personsinfo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `occupation` varchar(250) NOT NULL,
  `expertise` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personsinfo`
--

INSERT INTO `personsinfo` (`id`, `fullName`, `gender`, `phoneNumber`, `address`, `email`, `country`, `city`, `occupation`, `expertise`) VALUES
(1, 'Tijani Mutaru', 'Male', 241864311, 'Zb10', 'tj@gmail.com', 'Ghana', 'Accra', 'Teacher', 'IT'),
(2, 'Tijani Mutaru', 'Male', 241864311, 'ZB10', 'tj@gmail.com', 'Ghana', 'Accra', 'Teacher', 'IT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
