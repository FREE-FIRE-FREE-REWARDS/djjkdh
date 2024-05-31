-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2024 at 04:50 PM
-- Server version: 5.7.34
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geekmods_uid`
--

-- --------------------------------------------------------

--
-- Table structure for table `uids`
--

CREATE TABLE `uids` (
  `id` varchar(120) DEFAULT NULL,
  `uid` varchar(500) DEFAULT NULL,
  `nickname` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uids`
--

INSERT INTO `uids` (`id`, `uid`, `nickname`) VALUES
('2167a4c7b0eaa3f0f2b0', '1273732289', 'incorrect_player_id'),
(NULL, '1111111111', 'Scarlet2926V'),
('31cac075508872c011a0', '111111111', 'incorrect_player_id'),
(NULL, '11111111', 'FB:@GMRemyXㅤ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
