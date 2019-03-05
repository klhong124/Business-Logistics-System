-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 03:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc_logistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `invoice_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`invoice_id`, `quantity`, `weight`, `size`) VALUES
(60, 3, '5kg', 'normal'),
(69, 3, '5kg', 'normal'),
(73, 33, '50kg', 'normal'),
(74, 33, '50kg', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_process`
--

CREATE TABLE `invoice_process` (
  `invoice_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dropoff_time` datetime DEFAULT NULL,
  `pickup_time` datetime DEFAULT NULL,
  `complete_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_process`
--

INSERT INTO `invoice_process` (`invoice_id`, `order_time`, `dropoff_time`, `pickup_time`, `complete_time`, `update_time`) VALUES
(60, '2019-03-03 18:09:30', NULL, NULL, '2019-03-05 05:12:36', '2019-03-05 02:13:59'),
(69, '2019-03-03 18:20:12', NULL, NULL, NULL, '2019-03-03 18:20:12'),
(73, '2019-03-03 18:30:45', NULL, NULL, NULL, '2019-03-03 18:30:45'),
(74, '2019-03-03 18:31:14', NULL, NULL, '2019-03-05 02:14:50', '2019-03-05 02:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_receiver`
--

CREATE TABLE `invoice_receiver` (
  `invoice_id` int(11) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_receiver`
--

INSERT INTO `invoice_receiver` (`invoice_id`, `receiver_name`, `address`, `contact`) VALUES
(60, 'SCOPE', 'City University of Hong Kong, 83 Tat Chee Ave, Kowloon Tong', '(852) 3442 7654'),
(69, 'SCOPE', 'City University of Hong Kong, 83 Tat Chee Ave, Kowloon Tong', '(852) 3442 7654'),
(73, 'ALVIN', 'MUST ENGLISH', '(852) 2180 0000'),
(74, 'ALVIN', 'MUST ENGLISH', '(852) 2180 0000');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_table`
--

CREATE TABLE `invoice_table` (
  `invoice_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_table`
--

INSERT INTO `invoice_table` (`invoice_id`, `shipper_id`) VALUES
(60, 9),
(69, 9),
(73, 13),
(74, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`, `role`) VALUES
(9, 'ABC Ltd.', 'abc@www', '$2y$10$iXWlexNMy.6AAAZpii9smOFv77vtpv/dHl09796lCKU0opdk9AMCi', '2019-03-05 10:40:03', '2019-03-04 02:09:30', 'lXxA1qXKJBgbPTNG2QtzlWQ58rDMiitnwkh1jgsbygyt3CodcviEl4eamYtW', 1),
(13, 'KENNY LTD', 'KB@www', '$2y$10$iXWlexNMy.6AAAZpii9smOFv77vtpv/dHl09796lCKU0opdk9AMCi', '2019-03-05 09:45:44', '2019-03-04 02:30:45', 'HG2pjC1EPqZ9P0x3gXuzUMzZ6KS6DwQ92gAFzNFTI8Cks8ouZvZCv9pAgrqP', 1),
(14, '1', '1@1.com', '$2y$10$o4Q4zGMQ4GwhRBN5ViBOvOkixYF5mATn5Ukf/80WEmxENNTQSu4kC', '2019-03-05 09:45:41', '2019-03-05 08:27:02', NULL, 0),
(15, 'Kwan Lok Hong', 'klhong124@gmail.com', '$2y$10$l1SyZz1d91KhDxrlYNlVsO6aCwSduOKL8LPB72WCBha/bfoHAxbTq', '2019-03-05 05:13:38', '2019-03-05 13:13:38', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contact` int(8) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_detail`
--

INSERT INTO `users_detail` (`id`, `description`, `contact`, `url`) VALUES
(9, 'good hio', 12345676, 'www.google.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD UNIQUE KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `invoice_process`
--
ALTER TABLE `invoice_process`
  ADD UNIQUE KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `invoice_receiver`
--
ALTER TABLE `invoice_receiver`
  ADD UNIQUE KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `invoice_table`
--
ALTER TABLE `invoice_table`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `shipper_id` (`shipper_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_table`
--
ALTER TABLE `invoice_table`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice_table` (`invoice_id`);

--
-- Constraints for table `invoice_process`
--
ALTER TABLE `invoice_process`
  ADD CONSTRAINT `invoice_process_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice_table` (`invoice_id`);

--
-- Constraints for table `invoice_receiver`
--
ALTER TABLE `invoice_receiver`
  ADD CONSTRAINT `invoice_receiver_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice_table` (`invoice_id`);

--
-- Constraints for table `invoice_table`
--
ALTER TABLE `invoice_table`
  ADD CONSTRAINT `invoice_table_ibfk_1` FOREIGN KEY (`shipper_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD CONSTRAINT `users_detail_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
