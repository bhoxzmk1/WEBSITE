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
-- Table structure for table `trade_his`
--

CREATE TABLE `trade_his` (
  `id` int(11) NOT NULL,
  `usdt1` varchar(50) NOT NULL,
  `btc1` varchar(50) NOT NULL,
  `amount1` varchar(50) NOT NULL,
  `usdt2` varchar(50) NOT NULL,
  `btc2` varchar(50) NOT NULL,
  `amount2` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_his`
--

INSERT INTO `trade_his` (`id`, `usdt1`, `btc1`, `amount1`, `usdt2`, `btc2`, `amount2`, `time`) VALUES
(32, '1', '0.0000253802', '0.0000507604', '2', '39226.28', '39226.28', '2022-04-26 23:07:58'),
(33, '1', '0.0000253802', '0.0000761406', '3', '39275.39', '39275.39', '2022-04-26 23:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `trade_hist`
--

CREATE TABLE `trade_hist` (
  `id` int(11) NOT NULL,
  `usdt1` varchar(50) NOT NULL,
  `eth1` varchar(50) NOT NULL,
  `amount1` varchar(50) NOT NULL,
  `usdt2` varchar(50) NOT NULL,
  `eth2` varchar(50) NOT NULL,
  `amount2` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trade_hist`
--

INSERT INTO `trade_hist` (`id`, `usdt1`, `eth1`, `amount1`, `usdt2`, `eth2`, `amount2`, `time`) VALUES
(1, '1', '0.000333', '0.000333', '1', '2887.44', '2887.44', '2022-04-26 23:05:17'),
(2, '1', '0.000333', '0.000666', '2', '2886.52', '2886.52', '2022-04-26 23:06:26');

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

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `bal_php` varchar(50) NOT NULL,
  `bal_usd` varchar(50) NOT NULL,
  `bal_btc` varchar(50) NOT NULL,
  `bal_eth` varchar(50) NOT NULL,
  `bal_matic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`, `bal_php`, `bal_usd`, `bal_btc`, `bal_eth`, `bal_matic`) VALUES
(39, 'wallet', 'krispybaltazar@gmail.com', '$2y$10$eehiy/ZAP1HrmzYqkLwYueqENGhMg0YTY6QySS9IFKE309I1NsdUi', 0, 'verified', '99398', '95929.8757615200005', '47.000333', '45.0000000000000000', '45'),
(40, 'test2', 'jhaykhobaltazar01@gmail.com', '$2y$10$KYuKViLYWIhmYmiMwDoUdengfcLTQ03j8PwUh/2NiAOATx.7ItKmS', 0, 'verified', '150', '5', '0', '', ''),
(41, 'test4', 'bhoxz246@gmail.com', '$2y$10$HbR8X7tfaEszXlO3h/HHneBHNdZG0JUE5QseLkiKQovn5rU9JefVK', 0, 'verified', '127', '5', '0', '', ''),
(42, 'test5', 'bhoxz369@gmail.com', '$2y$10$ImA/zbmEsbHKTkxyBtX0wOu8j8hjbhORCB.NlUsYd.053H61de2Na', 0, 'verified', '200', '3.0057375625300002', '0', '', ''),
(43, 'dons', 'donnaflorendo0@gmail.com', '$2y$10$DrA2jSCF4BtRkQZQTxdBAOFDE8kDt.XEAZHqhuwkPkXwcGIgLc652', 0, 'verified', '200', '0', '0.0001522812', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trade_his`
--
ALTER TABLE `trade_his`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_hist`
--
ALTER TABLE `trade_hist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trade_histo`
--
ALTER TABLE `trade_histo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trade_his`
--
ALTER TABLE `trade_his`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `trade_hist`
--
ALTER TABLE `trade_hist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trade_histo`
--
ALTER TABLE `trade_histo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
