-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 06:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'London Heathrow', 2),
(31, 'Tokyo Narita', 2),
(32, 'Dubai International', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(36, 'Necklace', 'ww', '30', '03 May, 2020', 35, 'necklace_PNG43.png'),
(41, 'Earring', 'At Dubai', '32', '04 May, 2020', 35, '211-2112014_earring-transparent-circle-transparent-hoop-earring-png.png'),
(40, 'Gold plate', 'at narita', '31', '04 May, 2020', 35, 'decorative-gold-plate-pino-vismara-3d-model-max-obj-3ds-fbx.jpg'),
(42, 'Note 8', 'found at heathrow', '30', '04 May, 2020', 35, '64780.jpg'),
(44, 'Cat', 'Horror Cat', '31', '05 May, 2020', 35, '0_V5FUtyHQUHdX5_OW.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `role`) VALUES
(32, 'dummy', 'user', 'dumdumb', '', 'a9aedc6c39f654e55275ad8e65e316b3', 0),
(31, 'Anurag', 'prasad', 'dualcorebrain1', '', '3e8ca7d3524e0000b40c1bc6cdecc032', 0),
(29, 'Anurag', 'prasad', 'dualcorebrain', '', '3e8ca7d3524e0000b40c1bc6cdecc032', 1),
(33, 'dumy2', 'rivia', 'geralt', '', 'd657df502c252d44305af95bff189410', 0),
(34, 'Anurag', 'prasad', 'qwerty1', '', '6dbd0fe19c9a301c4708287780df41a2', 1),
(35, 'Ajay', 'both q1', 'q1', '', 'ff33f1b12213e021c2c4a888141953ba', 1),
(36, 'q2', 'q2', 'q2', '', '74d502a7131cdac90eecdfb0531c4e87', 0),
(37, 'Anurag', 'prasad', 'test3', '', '8ad8757baa8564dc136c1e07507f4a98', 0),
(38, 'Anurag', 'prasad', 'dualcorebrain5', 'prasadanurag336@gmail.com', '3e8ca7d3524e0000b40c1bc6cdecc032', 0),
(39, 'test', 'test', 'test4', 'test', '86985e105f79b95d6bc918fb45ec7727', 0),
(40, 'username', 'username', 'username', 'username@test.com', '14c4b06b824ec593239362517f538b29', 0),
(41, 'asd', 'asd', 'dualcorebrain15', 'asd', '9615061b10d1b60a373ef1aaa014aedc', 0),
(42, 'Anurag', 'prasad', 'dualcorebrain333', 'prasadanurag33333336@gmail.com', '8805c6625e53076cb49ec61759a2a08a', 1),
(43, 'Anurag', 'prasad', 'email test', 'test validation', '0c83f57c786a0b4a39efab23731c7ebc', 0),
(44, 'Anurag', 'prasad', 'asd', 'prasadanurag336', '5f039b4ef0058a1d652f13d612375a5b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
