-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 03:49 AM
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
-- Table structure for table `family_list`
--

CREATE TABLE `family_list` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_list`
--

INSERT INTO `family_list` (`id`, `title`, `qty`) VALUES
(1, 'Tuna', 22),
(2, 'Tomato sauce', 1),
(3, 'Hummus', 1),
(4, 'Sparkling water', 1),
(5, 'Peanut butter', 1);

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
-- Table structure for table `non_family_list`
--

CREATE TABLE `non_family_list` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `non_family_list`
--

INSERT INTO `non_family_list` (`id`, `title`, `qty`) VALUES
(1, 'Meat', 12),
(2, 'Sauces', 1),
(3, 'Cheese', 1),
(4, 'Mustard', 1),
(5, 'Rice', 1);

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
(1, 'tam', 'Tamer8@live.com', '0546762760', '321', '', '0000-00-00 00:00:00', '', NULL, '33', 1),
(2, 'test', 'battlefrogontherun@gmail.com', '0546762760', '321', '', '2021-08-12 01:45:04', '53b89c97de0788d005fad79f67a304e67185', '2021-08-12 00:38:29', '0', 0),
(3, 'tam', 'test@gmail.com', '123123123', '123', '', '2021-08-08 00:57:35', '', NULL, '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `family_list`
--
ALTER TABLE `family_list`
  ADD PRIMARY KEY (`id`,`title`);

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
-- Indexes for table `non_family_list`
--
ALTER TABLE `non_family_list`
  ADD PRIMARY KEY (`id`,`title`);

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
-- AUTO_INCREMENT for table `family_list`
--
ALTER TABLE `family_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `non_family_list`
--
ALTER TABLE `non_family_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
