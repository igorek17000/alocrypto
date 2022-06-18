-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2022 at 07:33 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u538836443_alocrypto`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `sn` int(11) NOT NULL,
  `id` varchar(50) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `investment` varchar(50) NOT NULL,
  `earns` varchar(50) NOT NULL,
  `withdraw` varchar(50) NOT NULL,
  `referer` varchar(50) NOT NULL,
  `bonus` double NOT NULL DEFAULT 200
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`sn`, `id`, `balance`, `investment`, `earns`, `withdraw`, `referer`, `bonus`) VALUES
(1, '3461693015', '0.00067897', '0', '0', '0', '0', 200),
(2, '4356751366', '0', '0', '0', '0', '0', 200),
(3, '6373331109', '0', '0', '0', '0', '0', 200),
(4, '6133988267', '0', '0', '0', '0', '0', 200),
(5, '1606031992', '0', '0', '0', '0', '0', 200),
(6, '6276321189', '0', '0', '0', '0', '0', 200),
(7, '1044914622', '0', '0', '0', '0', '0', 200),
(8, '5416631753', '0', '0', '0', '0', '0', 200),
(9, '6114526847', '0', '0', '0', '0', '0', 200),
(10, '5256765145', '0.001', '0', '0', '0', '0', 200);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `sn` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `method` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`sn`, `id`, `address`, `method`) VALUES
(1, '3461693015', '1qnnnsjjj356353652356237725353', 'BCH'),
(2, '1044914622', 'Tonymaks8@gmail.com', 'USDT'),
(3, '6114526847', 'bc1qf96fljtxw436jxy8jkwlw95kfymnz9ld3f7rmn', 'Btc');

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `sn` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `public` varchar(1000) DEFAULT NULL,
  `private` varchar(1000) DEFAULT NULL,
  `redirect` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apis`
--

INSERT INTO `apis` (`sn`, `name`, `public`, `private`, `redirect`) VALUES
(1, 'google', '818881695167-96f0chbv1pctnltdcf2n8kunrkctqei3.apps.googleusercontent.com', 'rdquOpaJHjbW3Qkbs-6tM97G', 'https://erect1.org/app/googleapi.php'),
(2, 'facebook', '2d86a2195bf92a7515065c69d1041221', '174465544659598', 'http://localhost/erect1/app/facebook.php'),
(3, 'stripe', NULL, 'sk_test_51JB7jpG61ITNwdfRCiJ1FMnTBU0wxdddK5tmKoE9oWuMI8AqjdFw0RY15h8Grag5sdNVwGHptd9iQM7dtjzfv0LL00TrMyEhXs', NULL),
(4, 'paystack', 'pk_test_99d69caec3f4f9bcf55f1f96a7c89a5653e2d80c', 'sk_test_98da44136d9c75dc67f3124016fdec282daf82bb', NULL),
(5, 'block', NULL, '2KgicsP3iWhaWBNjtgSmNRK7zMWYT4yeHvDQUKfINqU', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authorization`
--

CREATE TABLE `authorization` (
  `sn` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `exp_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorization`
--

INSERT INTO `authorization` (`sn`, `code`, `email`, `exp_data`) VALUES
(1, 'zSKKDOWC8A3U0XBMFHdneIK90', 'riolandadedamola@gmail.com', '2022-06-18 05:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `btc_transaction`
--

CREATE TABLE `btc_transaction` (
  `sn` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `satoshi` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `xpub` varchar(255) DEFAULT NULL,
  `timestamp` varchar(255) DEFAULT NULL,
  `uuid` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `txid` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `paid_satoshi` varchar(255) DEFAULT NULL,
  `date time` timestamp NOT NULL DEFAULT current_timestamp(),
  `myid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `sn` int(11) NOT NULL,
  `code` varchar(256) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `price` double NOT NULL,
  `status` int(11) NOT NULL,
  `uid` varchar(256) NOT NULL,
  `ip` varchar(256) NOT NULL,
  `txid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `reciverid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `broadcast` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `isPub` tinyint(1) NOT NULL,
  `broadcastdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments_trasact`
--

CREATE TABLE `payments_trasact` (
  `id` int(11) NOT NULL,
  `txid` varchar(256) DEFAULT NULL,
  `addr` varchar(256) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `mid` varchar(255) DEFAULT NULL,
  `uid` varchar(30) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_trasact`
--

INSERT INTO `payments_trasact` (`id`, `txid`, `addr`, `value`, `status`, `mid`, `uid`, `date`) VALUES
(9, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1q85qu8u2qf7y3akremj5gcyh6mss84gzkpnz7kf', '0.0009151', 0, NULL, '5256765145', '2022-06-16 13:07:05'),
(10, 'WarningThisIsAGeneratedTestPaymentAndNotARealBitcoinTransaction', 'bc1q85qu8u2qf7y3akremj5gcyh6mss84gzkpnz7kf', '0.001', 2, NULL, '5256765145', '2022-06-16 13:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `sn` int(11) NOT NULL,
  `mode` varchar(500) DEFAULT NULL,
  `Minimum` varchar(500) DEFAULT NULL,
  `Maximum` varchar(500) DEFAULT NULL,
  `Referral` varchar(500) DEFAULT NULL,
  `Duration` varchar(500) DEFAULT NULL,
  `Profit` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`sn`, `mode`, `Minimum`, `Maximum`, `Referral`, `Duration`, `Profit`) VALUES
(1, 'BEGINNER PLAN', '50', '500', '5', '4hrs', '30% + Investment'),
(2, 'PREMIUM PLAN', '100', '1000', '10', '8hrs', '35% + Investment\r\n\r\n'),
(3, 'SILVER PLAN', '200', '2000', '20', '6hrs', '20% + Investment'),
(4, 'GOLD PLAN', '500', '10000', '50', '4hrs', '30% + Investmen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sn` int(11) NOT NULL,
  `id` varchar(40) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `country` varchar(1000) DEFAULT NULL,
  `auth_token` varchar(1000) DEFAULT NULL,
  `reset_pass_token` varchar(1000) DEFAULT NULL,
  `token_date` varchar(1000) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `gender` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_name` varchar(500) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `poster_code` text DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `referer_code` varchar(500) DEFAULT NULL,
  `ref_by` varchar(255) DEFAULT NULL,
  `is_verify` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `id`, `email`, `password`, `country`, `auth_token`, `reset_pass_token`, `token_date`, `name`, `picture`, `phone`, `gender`, `created_at`, `last_name`, `address1`, `address2`, `poster_code`, `state`, `city`, `referer_code`, `ref_by`, `is_verify`) VALUES
(1, '4356751366', 'johnsonkame@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Nigeria', 'lbk4yqtohm3er609jasi7pw1@zgdvcn25xu#f8', NULL, NULL, NULL, 'IMG-20211005-WA0036.jpg', '08165603926', NULL, '2021-10-06 18:56:20', NULL, NULL, NULL, NULL, NULL, NULL, 'CTG_87437', NULL, 0),
(4, '3886831389', 'zamvla@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Nigeria', '6908537412', NULL, NULL, NULL, 'Screenshot_2021-10-10-18-57-51-52_40deb401b9ffe8e1df2f1cc5ba480b12.jpg', '07039276871', NULL, '2021-10-10 18:00:39', NULL, NULL, NULL, NULL, NULL, NULL, 'CTG_88911', NULL, 0),
(6, '6133988267', 'waynebradford98@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'United States', '7801965324', NULL, NULL, 'Herman', 'AB6CE9A9-A522-4677-9C1B-35512DB885D2.jpeg', '6158219267', 'Male', '2021-11-07 12:56:23', 'Bradford', '2704 Pickards Point', '', '37086', 'Tennessee ', 'LaVergne ', 'CTG_89798', NULL, 0),
(7, '1606031992', 'robertbankins300@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'United States', '2693418750', NULL, NULL, NULL, 'IMG-20201024-WA0002.jpg', '8302826510', NULL, '2021-11-07 13:16:49', NULL, NULL, NULL, NULL, NULL, NULL, 'CTG_91399', NULL, 0),
(8, '6276321189', 'aribigbola2018@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Nigeria', '0369471825', NULL, NULL, NULL, 'Screenshot_20211013-090131_Chrome.jpg', '08165603928', NULL, '2021-11-18 07:07:48', NULL, NULL, NULL, NULL, NULL, NULL, 'CTG_19306', NULL, 0),
(9, '1044914622', 'Tonymaks8@Gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Kenya', '6095312784', NULL, NULL, 'Clinton ', '16414220240234349166670277791780.jpg', '0740245534', 'Male', '2022-01-05 22:49:00', 'Mayeku ', '3162-3200', '', '3200', 'Bungoma ', 'Nairobi', 'CTG_22981', NULL, 0),
(10, '5416631753', 'jigar.ashar98@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'India', '2471908536', NULL, NULL, NULL, 'Snapchat-1692727392.jpg', '+91 7738900931', NULL, '2022-01-07 06:40:35', NULL, NULL, NULL, NULL, NULL, NULL, 'CTG_37660', NULL, 0),
(11, '6114526847', 'dustinwehler@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'United States', '1236948750', NULL, NULL, 'Dustin', 'IMG-20220105-WA0000.jpeg', '8143350817', 'Male', '2022-01-08 21:44:14', 'Wehler', '129 Fern Ln', '', '15846', 'PA', 'Kersey', 'CTG_78276', NULL, 0),
(12, '5256765145', 'riolandadedamola@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Unknown', '0973168542', NULL, NULL, NULL, 'IMG-20220115-WA0037.jpg', '(081) 499-1672', NULL, '2022-06-15 03:59:34', NULL, NULL, NULL, NULL, NULL, NULL, 'CTG_66358', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `sn` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `amt` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `apis`
--
ALTER TABLE `apis`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `authorization`
--
ALTER TABLE `authorization`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `btc_transaction`
--
ALTER TABLE `btc_transaction`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `address` (`address`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_trasact`
--
ALTER TABLE `payments_trasact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apis`
--
ALTER TABLE `apis`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authorization`
--
ALTER TABLE `authorization`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `btc_transaction`
--
ALTER TABLE `btc_transaction`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payments_trasact`
--
ALTER TABLE `payments_trasact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
