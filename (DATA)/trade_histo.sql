-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 05:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test6`
--

-- --------------------------------------------------------

--
-- Table structure for table `trade_histo`
--

CREATE TABLE `trade_histo` (
  `id` int(11) NOT NULL,
  `usdt1` varchar(50) NOT NULL,
  `matic1` varchar(50) NOT NULL,
  `amount1` varchar(50) NOT NULL,
  `usdt2` varchar(50) NOT NULL,
  `matic2` varchar(50) NOT NULL,
  `amount2` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_histo`
--

INSERT INTO `trade_histo` (`id`, `usdt1`, `matic1`, `amount1`, `usdt2`, `matic2`, `amount2`, `time`) VALUES
(1, '2', '0.765292', '0.765292', '1', '1.28', '2.56', '2022-04-26 23:05:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trade_histo`
--
ALTER TABLE `trade_histo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trade_histo`
--
ALTER TABLE `trade_histo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
