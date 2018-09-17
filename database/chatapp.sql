-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 10:02 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `message` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `username`, `message`, `created`) VALUES
(88, 'HoaNguyen', 'Hi', '2018-08-17 03:32:30'),
(89, 'ThaiVni', 'Hello', '2018-08-17 03:32:52'),
(90, 'ThaiVni', 'Chao Mai\r\n', '2018-09-15 04:53:05'),
(91, 'ThaiVni', 'Caho taha', '2018-09-15 04:54:42'),
(92, 'ThaiVni', 'hi', '2018-09-15 04:58:16'),
(93, 'ThaiVni', 'hekko', '2018-09-15 04:58:46'),
(94, 'ThaiVni', 'aaaaaaaaa', '2018-09-15 04:59:45'),
(95, 'ThaiVni', 'hahah', '2018-09-15 03:07:13'),
(96, 'ThaiVni', 'ggggggggggggg', '2018-09-15 10:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `nameuser` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `phone` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL,
  `address` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `nameuser`, `phone`, `address`, `password`, `created`, `modified`) VALUES
(27, 'Thai', 'Nguyen', 'minhnhoban0707@gmail.com', 'ThaiVni', '0976024867', '', 'b507c2d4802971df4d57575a84aad1e4', '0000-00-00 00:00:00', '2018-09-15 02:52:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
