-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 06:46 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journalsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `note` longtext NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`ID`, `name`, `created_at`, `updated_at`, `deleted_at`, `note`, `user_id`) VALUES
(5, 'New Note 2', '2018-12-08 23:30:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'd9c1c1a4686303e30d7261df12bd30af6a84fb8a', 0),
(6, 'New Note 6', '2018-12-08 23:35:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '6af7752e7246860502d24ae2eb86c2cfa8197f86', 0),
(7, 'New Note', '2018-12-09 00:03:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '6af7752e7246860502d24ae2eb86c2cfa8197f86', 1),
(8, 'New Note 7', '2018-12-09 00:03:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '6af7752e7246860502d24ae2eb86c2cfa8197f86', 1),
(13, ' New Note', '2018-12-09 10:43:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0c9fe5356da97daac1b724f2f8edcb33b3e44eb2', 1),
(14, 'first journal', '2018-12-09 17:27:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'so today i was really trying to beat the deadline and i might not be able to testt all features lol\r\n                            ', 1),
(15, 'South Africa', '2018-12-09 17:20:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '                          i decided to travel to sount africa not because of the hype but because life........................\r\n                            ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `backup` tinyint(1) NOT NULL DEFAULT '0',
  `profile_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `Username`, `Password`, `backup`, `profile_image`) VALUES
(1, 'damilola@sankore.com', '', '1f3c53ae14626035383b39c207564d32d083e8fd', 0, ''),
(4, 'damiakintomide@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
