-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 01, 2019 at 08:36 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cc_logistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `id` int(11) NOT NULL,
  `logistics_id` varchar(12) NOT NULL,
  `product_id` varchar(12) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `weight` float(6,2) NOT NULL,
  `qty` int(6) NOT NULL,
  `origin_address` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `invoice_id` varchar(12) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dummy_2`
--

CREATE TABLE `dummy_2` (
  `id` int(11) NOT NULL,
  `logistics_id` varchar(12) NOT NULL,
  `product_list` text NOT NULL,
  `origin_address` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `invoice_id` varchar(12) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dummy_2`
--

INSERT INTO `dummy_2` (`id`, `logistics_id`, `product_list`, `origin_address`, `shipping_address`, `invoice_id`, `order_date`, `user_id`, `customer_info`) VALUES
(1, '1', '\"[{\'product_id\':\'1\',\'product_name\':\'玉泉\',\'qty\':\'12\',\'description\':\'CreamSoda330ml\',\'weight\':\'330g\'},{\'product_id\':\'1\',\'product_name\':\'玉泉\',\'qty\':\'12\',\'description\':\'CreamSoda330ml\',\'weight\':\'330g\'}]\"', 'cityu,kln', 'cityu,ac2,kln', '2', '2019-01-17 00:00:00', 1, '\"{\'customer_name\':\'玉泉\',\'contact\':\'59883943\',\'description\':\'CreamSoda330ml\',\'address\':\'cityu,ac2,kln\'}\"');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `invoice_id` int(11) NOT NULL,
  `retailer_id` varchar(12) NOT NULL,
  `warehouse` varchar(255) DEFAULT NULL,
  `sent_datetime` datetime DEFAULT NULL,
  `arrived_datetime` datetime DEFAULT NULL,
  `received_datetime` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived_status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`invoice_id`, `retailer_id`, `warehouse`, `sent_datetime`, `arrived_datetime`, `received_datetime`, `updated_at`, `created_at`, `archived_status`) VALUES
(1, 'uslzdf28454', 'abc', '2019-01-18 17:12:08', '2019-01-19 17:12:08', '2019-01-18 17:15:21', '2019-01-31 22:05:52', '2019-01-24 17:12:08', '0'),
(2, 'tyhsjb23564', 'Warehouse A', '2019-01-31 11:06:03', '2019-01-31 11:19:38', '2019-02-04 10:16:13', '2019-01-31 21:09:12', '2019-01-31 16:35:38', '0');

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `id` int(11) NOT NULL,
  `retailer_id` varchar(12) NOT NULL,
  `retailer_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`id`, `retailer_id`, `retailer_name`, `user_id`, `description`, `url`) VALUES
(1, 'uslzdf28454', 'Apple Inc. ', 1, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'www.apple.com'),
(2, 'tyhsjb23564', 'Amazon', 1, '', 'www.amazon.com'),
(3, '', 'Microsoft', 1, '2a1235ada', 'www.microsoft.com'),
(4, '', 'Huawei', 2, '', 'www.huawei.com'),
(5, '', 'JD.com', 2, '', 'www.jd.com'),
(6, '', 'Taobao', 1, '', 'www.taobao.com');

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
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'test', 'test@test.com', '$2y$10$aS8tUrA2qpNLLt7Fw.CvoOH6hOxScBl9.MVXBcVnP.kieOZiZkm2q', '2019-01-18 08:48:51', '2019-01-18 16:48:51', 'YgqDnhQUzdhJ4zf5bZOpsVM1dEikkR6I1hM2kwXFmVnr9f33y7QjOdJFL6BB'),
(2, 'Ann', 'ann@gmail.com', '$2y$10$iXWlexNMy.6AAAZpii9smOFv77vtpv/dHl09796lCKU0opdk9AMCi', '2019-01-18 09:02:19', '2019-01-18 17:02:19', 'rAXEKFNN4ntXi3cNMLqDXqXLBpO9E3YRjbJ4H26CS0SS5Ss034mKKdtcL1H6'),
(3, 'kk', 'k@k.com', '$2y$10$3rFdrLEdQ6wZ9X3gt6evy.7PFDXRuy3tvU69Ub60JCgVHRD0x7thu', '2019-01-30 03:12:28', '2019-01-29 00:31:42', '6pt0kqWD0lBC4DNRrI6NF3GsARsS6leIg58tAnBSSdpdmv5TwLFPD5w0yWTm'),
(4, '1', '1@1.com', '$2y$10$35IOHUaqpnQNqEaF4u4jI.zwqCf.b1SPB63VMzaAFhpa2WEpXVbEG', '2019-01-30 19:07:48', '2019-01-31 02:41:33', 'ZuLcYbRaT5pSXz6oW1xYCPyzvp7UP9xJdvie0NqRW5ALhyq1nTW3iL2mWhTp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dummy_2`
--
ALTER TABLE `dummy_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`invoice_id`);

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
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dummy_2`
--
ALTER TABLE `dummy_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
