-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 03:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb-main`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Email` text NOT NULL,
  `Nickname` text NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Email`, `Nickname`, `Phone`, `Password`) VALUES
('Louai@Hotmail.com', 'Louai', '0546101420', 'L123'),
('Tamer8@live.com', 'tam', '0546762760', '123');

-- --------------------------------------------------------

--
-- Table structure for table `family_list`
--

CREATE TABLE `family_list` (
  `title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_list`
--

INSERT INTO `family_list` (`title`, `qty`) VALUES
('asd', 1),
('dod', 1),
('mnikeeeee', 1),
('ssss', 1),
('zomba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `final_list`
--

CREATE TABLE `final_list` (
  `title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final_list`
--

INSERT INTO `final_list` (`title`, `qty`) VALUES
('Chips', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `qty`) VALUES
(5, 'Milk', 1),
(7, 'Banana', 2),
(8, 'Doretos', 22),
(14, 'asd', 1),
(16, 'aweha', 1),
(17, 'aweha', 1),
(18, 'izi', 1),
(19, 'mozika', 1),
(20, 'mozez', 1),
(21, 'bolamone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`title`, `qty`) VALUES
('chocolate', 1),
('HotDogs', 1),
('Milk', 1),
('Nescafi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list2`
--

CREATE TABLE `list2` (
  `title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list2`
--

INSERT INTO `list2` (`title`, `qty`) VALUES
('Apple', 1),
('Carrot', 1),
('Gum', 1),
('IceCream', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `pass_word` varchar(11) NOT NULL,
  `reset_link_token` varchar(90) NOT NULL,
  `exp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email_verification_link` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `family_list` varchar(11) DEFAULT '0',
  `Admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Nickname`, `Email`, `Phone`, `pass_word`, `reset_link_token`, `exp_date`, `email_verification_link`, `email_verified_at`, `family_list`, `Admin`) VALUES
(1, 'tam', 'Tamer8@live.com', '0546762760', '123', '', '2021-08-07 22:36:50', '', NULL, '33', 1),
(2, 'test', 'battlefrogontherun@gmail.com', '0546762760', 'malek', '', '2021-08-08 01:27:46', '53b89c97de0788d005fad79f67a304e65195', '2021-08-08 00:27:46', '33', 0),
(3, 'tam', 'test@gmail.com', '123123123', '123', '', '2021-08-08 00:57:35', '', NULL, '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD UNIQUE KEY `unique` (`Email`) USING HASH;

--
-- Indexes for table `family_list`
--
ALTER TABLE `family_list`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `final_list`
--
ALTER TABLE `final_list`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `list2`
--
ALTER TABLE `list2`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
