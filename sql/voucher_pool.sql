-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 09:57 PM
-- Server version: 5.6.17
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voucher_pool`
--

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(105) DEFAULT NULL,
  `description` text,
  `discount` float(4,2) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `deleted` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `description`, `discount`, `date_created`, `date_modified`, `status`, `deleted`) VALUES
(1, 'ABC', NULL, 10.50, '2018-02-17 10:48:05', NULL, NULL, NULL),
(2, 'XYZ', 'XYZ', 7.40, '2018-02-17 10:51:25', NULL, 1, NULL),
(3, 'Sample P', 'sample P ofer', 10.00, '2018-07-27 11:06:07', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(4) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `deleted` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `date_created`, `date_modified`, `status`, `deleted`) VALUES
(1, 'Admin', 'Admin Users', '2018-02-16 00:00:00', NULL, 1, 0),
(2, 'Recipient', 'Recipiect or Customer', '2018-02-16 00:00:00', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(165) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `roles_id` int(4) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `deleted` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `roles_id`, `date_created`, `date_modified`, `status`, `deleted`) VALUES
(1, 'Temidayo Uji', 'solomond6@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2018-02-16 00:00:00', NULL, 1, 0),
(2, 'Temidayo Uji', 'temisolo17@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `code` varchar(105) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `expiry_date` datetime DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `date_used` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `date_created`, `expiry_date`, `status`, `date_used`) VALUES
(1, '5a893357696ac', '2018-02-18 09:03:35', NULL, 1, NULL),
(2, '5a8935b768be7', '2018-02-18 09:13:43', '2018-02-22 00:00:00', 1, NULL),
(3, '5a8936f08c672', '2018-02-18 09:18:56', '2018-02-22 00:00:00', 1, NULL),
(4, '5a8938c6ed516', '2018-02-18 09:26:46', '2018-02-22 00:00:00', 1, NULL),
(5, '5a8938dfc6612', '2018-02-18 09:27:11', '2018-02-22 00:00:00', 1, NULL),
(6, '5a893ba4156e4', '2018-02-18 09:39:00', '2018-02-22 00:00:00', 1, NULL),
(7, '5a893bdb28653', '2018-02-18 09:39:55', '2018-02-22 00:00:00', 1, NULL),
(8, '5a893d0e80659', '2018-02-18 09:45:02', '2018-02-22 00:00:00', 1, NULL),
(9, '5a893d43c7165', '2018-02-18 09:45:55', '2018-02-22 00:00:00', 1, NULL),
(10, '5a893d555f612', '2018-02-18 09:46:13', '2018-02-22 00:00:00', 1, NULL),
(11, '5a893d6fe8ca7', '2018-02-18 09:46:39', '2018-02-22 00:00:00', 1, NULL),
(12, '5a893db10ffd7', '2018-02-18 09:47:45', '2018-02-22 00:00:00', 1, NULL),
(13, '5a893dd4aaaaf', '2018-02-18 09:48:20', '2018-02-22 00:00:00', 1, NULL),
(14, '5a89439776b78', '2018-02-18 10:12:55', '2018-02-22 00:00:00', 1, NULL),
(15, '5a894413566aa', '2018-02-18 10:14:59', '2018-02-22 00:00:00', 1, NULL),
(16, '5a8944cd47df7', '2018-02-18 10:18:05', '2018-02-22 00:00:00', 1, NULL),
(17, '5a89461923558', '2018-02-18 10:23:37', '2018-02-22 00:00:00', 1, NULL),
(18, '5a89467e7af56', '2018-02-18 10:25:18', '2018-02-22 00:00:00', 1, NULL),
(19, '5a894cc32dba3', '2018-02-18 10:52:03', '2018-02-22 00:00:00', 1, NULL),
(20, '5a895d9b35d76', '2018-02-18 12:03:55', '2018-02-22 00:00:00', 1, NULL),
(21, '5b5ad7d653623', '2018-07-27 09:29:10', '2018-07-31 00:00:00', 1, NULL),
(22, '5b5aeef69003e', '2018-07-27 11:07:50', '2018-07-31 00:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_offer`
--

CREATE TABLE `voucher_offer` (
  `id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  `vouchers_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voucher_offer`
--

INSERT INTO `voucher_offer` (`id`, `offers_id`, `vouchers_id`, `date_created`) VALUES
(1, 1, 5, NULL),
(2, 1, 6, NULL),
(3, 1, 7, NULL),
(4, 1, 8, NULL),
(5, 1, 9, NULL),
(6, 1, 10, NULL),
(7, 1, 11, NULL),
(8, 1, 12, NULL),
(9, 1, 13, NULL),
(10, 2, 18, NULL),
(11, 1, 19, NULL),
(12, 1, 21, NULL),
(13, 3, 22, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_offer_recipient`
--

CREATE TABLE `voucher_offer_recipient` (
  `id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  `vouchers_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voucher_offer_recipient`
--

INSERT INTO `voucher_offer_recipient` (`id`, `offers_id`, `vouchers_id`, `users_id`, `date_created`) VALUES
(4, 1, 19, 2, '2018-02-18 10:52:03'),
(5, 3, 22, 2, '2018-07-27 11:07:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_roles_idx` (`roles_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_offer`
--
ALTER TABLE `voucher_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_voucher_offer_offers1_idx` (`offers_id`),
  ADD KEY `fk_voucher_offer_vouchers1_idx` (`vouchers_id`);

--
-- Indexes for table `voucher_offer_recipient`
--
ALTER TABLE `voucher_offer_recipient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_voucher_offer_offers1_idx` (`offers_id`),
  ADD KEY `fk_voucher_offer_vouchers1_idx` (`vouchers_id`),
  ADD KEY `fk_voucher_offer_recipient_users1_idx` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `voucher_offer`
--
ALTER TABLE `voucher_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `voucher_offer_recipient`
--
ALTER TABLE `voucher_offer_recipient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `voucher_offer`
--
ALTER TABLE `voucher_offer`
  ADD CONSTRAINT `fk_voucher_offer_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_voucher_offer_vouchers1` FOREIGN KEY (`vouchers_id`) REFERENCES `vouchers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `voucher_offer_recipient`
--
ALTER TABLE `voucher_offer_recipient`
  ADD CONSTRAINT `fk_voucher_offer_offers10` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_voucher_offer_recipient_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_voucher_offer_vouchers10` FOREIGN KEY (`vouchers_id`) REFERENCES `vouchers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
