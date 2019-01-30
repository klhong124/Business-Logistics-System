-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 30, 2019 at 03:16 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cc_logistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `warehouse` varchar(255) DEFAULT NULL,
  `sent_datetime` datetime DEFAULT NULL,
  `arrived_datetime` datetime DEFAULT NULL,
  `received_datetime` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `warehouse`, `sent_datetime`, `arrived_datetime`, `received_datetime`, `updated_at`, `created_at`) VALUES
(1, 'Warehouse A', '2019-01-18 17:12:08', '2019-01-19 17:12:08', NULL, '2019-01-24 01:12:08', '2019-01-24 17:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `id` int(11) NOT NULL,
  `retailer_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`id`, `retailer_name`, `user_id`, `description`, `url`) VALUES
(1, 'Apple Inc.', 1, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'www.apple.com'),
(2, 'Amazon', 1, '', 'www.amazon.com'),
(3, 'Microsoft', 1, '2a1235ada', 'www.microsoft.com'),
(4, 'Huawei', 2, '', 'www.huawei.com'),
(5, 'JD.com', 2, '', 'www.jd.com'),
(6, 'Taobao', 1, '', 'www.taobao.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remember_token` varchar(255) DEFAULT NULL,
  `roles` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`, `roles`) VALUES
(1, 'test', 'test@test.com', '$2y$10$aS8tUrA2qpNLLt7Fw.CvoOH6hOxScBl9.MVXBcVnP.kieOZiZkm2q', '2019-01-18 08:48:51', '2019-01-18 16:48:51', 'YgqDnhQUzdhJ4zf5bZOpsVM1dEikkR6I1hM2kwXFmVnr9f33y7QjOdJFL6BB', '0'),
(2, 'Ann', 'ann@gmail.com', '$2y$10$iXWlexNMy.6AAAZpii9smOFv77vtpv/dHl09796lCKU0opdk9AMCi', '2019-01-18 09:02:19', '2019-01-18 17:02:19', 'EV1lCdEptleeD1oW8gWgraGNo7Sp452pGMAPcVzdDWAZji4IuTxHQh2j78Wj', '0'),
(3, 'anna', 'anna@gmail.com', '$2y$10$g3qBqst2u8xOCCF9yMh/1O4DAwiZzZOEzIOIaWoiooMAvSZ5wN49i', '2019-01-19 02:07:34', '2019-01-19 10:07:34', 'JgfAM5PlmgN92XQ4qrQvaU16Sxj2Y55WKWnK0a4uPzomjppOQQqrI8bkgrkb', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
