-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 08:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `title`, `email`, `balance`) VALUES
(1, 'Mary Patterson', 'mpatterso@sparksbank.com', '21800'),
(2, 'Jeff Firrelli', 'jfirrelli@sparksbank.com', '10000'),
(3, 'Leslie Thompson', 'lthompson@sparksbank.com', '5000'),
(4, 'Julie Firrelli', 'jfirrelli@sparksbank.com', '10000'),
(5, 'Anthony Bow', 'abow@sparksbank.com', '9000'),
(6, 'Leslie Jennings', 'ljennings@sparksbank.com', '5000'),
(7, 'Steve Patterson', 'spatterson@sparksbank.com', '10000'),
(8, 'Foon Yue Tseng', 'ftseng@sparksbank.com', '2000'),
(9, 'George Vanauf', 'gvanauf@sparksbank.com', '30000'),
(10, 'Pamela Castillo', 'pcastillo@sparksbank.com', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tid` int(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tid`, `sender`, `receiver`, `amount`, `timestamp`) VALUES
(1, 'Mary Patterson', 'Pamela Castillo', 2000, '2021-04-16 16:42:58'),
(2, 'Leslie Thompson', 'Anthony Bow', 2500, '2021-04-16 16:43:22'),
(3, 'Pamela Castillo', 'Foon Yue Tseng', 200, '2021-04-16 16:45:17'),
(5, 'Steve Patterson', 'George Vanauf', 5000, '2021-04-16 17:36:12'),
(6, 'Leslie Jennings', 'Julie Firrelli', 500, '2021-04-16 17:36:26'),
(7, 'Pamela Castillo', 'Mary Patterson', 800, '2021-04-16 17:37:48'),
(8, 'Julie Firrelli', 'Mary Patterson', 3000, '2021-04-16 17:38:07'),
(9, 'Pamela Castillo', 'Anthony Bow', 4000, '2021-04-16 17:39:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
