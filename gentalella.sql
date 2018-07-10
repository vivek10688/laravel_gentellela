-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2017 at 10:25 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gentalella`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `user_role` int(11) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `created_on`, `last_updated`, `user_role`, `remember_token`, `is_active`) VALUES
(1, 'Admin', 'Admin', 'admin', 'admin@gmail.com', '$2y$10$I8iwycOdKRYn36QbpqoZ/.v.EyJ21ngfMT1vaobFbjuadCL6UPq2u', '2017-11-10 16:47:35', '2017-11-10 16:47:35', 1, 'AATtFOsnP7mNS9ogPTLLIkx8ySd8QuV0RChItzlf2pY14R6TYJzjX0qSLODr', 1),
(3, 'vivek', 'singh', 'viveksingh123', 'vivek@gmail.com', '$2y$10$Y8d750l5sZOLo7Ikcs38PuV32RTpdsGfH5Uo7UBPynpvVaU31PAJm', '2017-11-11 00:00:00', '2017-11-11 00:00:00', 2, '', 1),
(4, 'jaydeep', 'kushwaha', 'jaydeep', 'jaydeep@gmail.com', '$2y$10$fcHiU8p/.SC4lc6vwjkfR.UfUzZr31cF5nfczi3mPEdWMSA1eaC4i', '2017-11-11 00:00:00', '2017-11-11 09:23:05', 2, '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
