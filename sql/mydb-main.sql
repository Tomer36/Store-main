-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 12:32 AM
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
('Tamer@gmail.com', 'Tamer', '0548927813', '1122'),
('Tamer8@live.com', 'tam', '0546762760', '123');

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
(9, 'san', 22);

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
  `exp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Nickname`, `Email`, `Phone`, `pass_word`, `reset_link_token`, `exp_date`) VALUES
(1, 'tam', 'Tamer8@live.com', '0546762760', '123', '', '0000-00-00 00:00:00'),
(2, 'test', 'battlefrogontherun@gmail.com', '0546762760', 'malek', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD UNIQUE KEY `unique` (`Email`) USING HASH;

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
  ADD UNIQUE KEY `Nickname` (`Nickname`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
