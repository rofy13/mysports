-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2021 at 06:33 AM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
CREATE TABLE IF NOT EXISTS `adminlogin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`) VALUES
('test', 'test123');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` varchar(200) NOT NULL,
  `eventdate` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `eventdate`, `image`, `category`, `status`, `featured`) VALUES
(2, 'swimming competetion', 'swimming compettion to be held at margao at 10am', '2020-12-21', 'swiming.jpg', 'swimming', 1, 1),
(4, 'super tie breaker', '6 a side tie breaker to be held at assolna at 9:30pm', '2020-12-19', 'football.jpg', 'football', 0, 1),
(5, 'Hockey exhibition match', 'This exhibition match will start at 2pm at the margao sports complex indoor stadium', '2020-12-22', 'hockey.jpg', 'hockey', 1, 1),
(6, 'Badminton Tournament', 'This event will be a one day doubles badminton tournament which will be held at verna. 7am will be the registration.', '2020-12-20', 'badminton.jpg', 'badminton', 1, 0),
(7, 'Cricket match exhibition', 'This cricket match will be held at panjim at 3:30pm', '2020-12-23', 'cricket.jpg', 'cricket', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
