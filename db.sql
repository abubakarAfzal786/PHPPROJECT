-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 03, 2020 at 02:12 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `EmailServices`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `id` bigint(20) NOT NULL,
  `user_token` varchar(100) NOT NULL,
  `emails` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daily_report`
--

INSERT INTO `daily_report` (`id`, `user_token`, `emails`) VALUES
(3, '4uOfjsiR2Q1n571P0Rd32bCzqeEvCN', 15),
(4, 'GzI2EGUUmmBpGTyin1yqW29lidUWd0', 16);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint(20) NOT NULL,
  `email_from` varchar(200) NOT NULL,
  `email_to` varchar(200) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `bcc` varchar(100) DEFAULT NULL,
  `cc` varchar(100) DEFAULT NULL,
  `webhook_url` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'received',
  `reference` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `udpated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email_from`, `email_to`, `subject`, `body`, `bcc`, `cc`, `webhook_url`, `status`, `reference`, `created_at`, `udpated_at`, `user_id`) VALUES
(1, 'abubakar@gmail.com', '', '', '', '', '', 'https://test.com/webhook_url', 'processed', 'request_reference', NULL, NULL, 0),
(2, 'abubakar@gmail.com', '', '', '', '', '', 'https://test.com/webhook_url', 'processed', 'request_reference', '2002-04-19 18:00:00', NULL, 0),
(3, 'abubakar@gmail.com', '', '', '', '', '', 'https://test.com/webhook_url', 'processed', 'request_reference', '2002-04-19 18:00:00', NULL, 0),
(4, 'abubakar@gmail.com', '', '', '', '', '', 'https://test.com/webhook_url', 'processed', 'request_reference', '2002-04-19 18:00:00', NULL, 0),
(5, 'abubakar@gmail.com', '', '', '', '', '', 'https://test.com/webhook_url', 'processed', 'request_reference', '2002-04-19 18:00:00', NULL, 0),
(6, 'abubakar@gmail.com', 'abubakar@gmail.com', 'subject', 'body', 'bcc', 'abubakar@gmail.com', 'https://test.com/webhook_url', 'processed', 'request_reference', '2003-04-19 19:00:00', NULL, 12),
(7, 'abubakar@gmail.com', 'abubakar@gmail.com', 'subject', 'body', 'bcc', 'abubakar@gmail.com', 'https://test.com/webhook_url', 'processed', 'request_reference', '2003-04-19 19:00:00', NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `permission`) VALUES
(1, 'add edited'),
(2, 'sdfsaf edired'),
(3, 'sdfsaf'),
(4, 'new'),
(5, 'new 1'),
(6, 'adsfadsf'),
(7, 'sdfsaf edired');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `plan_name` varchar(200) NOT NULL,
  `emails` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `description`, `plan_name`, `emails`, `price`) VALUES
(1, 'lkjlkjl', 'basic', 16, 24),
(2, 'lkjlkjlk edited', 'basic', 16, 24),
(3, 'lkjlkjlk edited', 'basic', 16, 24),
(4, 'lkjlkjlk', 'basic', 16, 24),
(5, 'lkjlkjlk', 'basic', 16, 24),
(6, 'lkjlkjlk', 'premimum', 16, 24),
(7, 'lkjlkjlk', 'advance', 16, 24),
(8, 'lkjlkjlk edite', 'advance', 16, 24),
(9, 'lkjlkjlk', 'advance', 16, 24),
(10, 'lkjlkjlk', 'advance', 16, 24),
(11, 'lkjlkjlk', 'advance', 16, 24),
(12, 'lkjlkjlk', 'advance', 16, 24),
(13, 'lkjlkjlk', 'advance', 16, 24),
(14, 'ljlkjkljkljlkjlkjjl', 'advance', 21, 20),
(15, 'sadfasdfadsfasdfasdfwesfewrwe', 'basic', 1, 1),
(16, 'sadfasdf 897987897', 'basic', 1, 1),
(17, 'sadfasdfadsfasdfasdfwesfewrwe', 'basic', 1, 1),
(18, 'sadfasdfadsfasdfasdfwesfewrwe', 'basic', 1, 1),
(19, 'sdafasdfasdf', 'basic', 25, 26),
(20, 'dfasdf', 'basic', 42, 31),
(21, 'sadfasdfasdfas9098098090938234532', 'advance', 30, 23),
(22, 'sadfasdfasdfas9098098090938234532', 'advance', 30, 23),
(23, 'lkjkljkljkljlkjlkjklj', 'basic', 34, 47),
(24, 'asdfasdfasdf', 'advance', 1, 1),
(25, 'asfasfdasdfadsf', 'basic', 15, 29),
(26, 'sadfsadf', 'basic', 1, 1),
(27, 'asdfasdf', 'basic', 1, 1),
(28, 'sadfasdfasdf', 'basic', 1, 1),
(29, 'asdfasdfasdf', 'premimum', 1, 1),
(30, 'Hello World', 'basic', 23, 22),
(31, 'woring', 'basic', 30, 45),
(32, 'Hello World edited', 'basic', 34, 40),
(33, 'alkjlkjlkj', 'abubakar', 2, 1),
(34, 'alkjlkjlkj', 'abubakar', 2, 1),
(35, 'alkjlkjlkj', 'abubakar', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(9, 'Admin'),
(10, 'Marchent');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) NOT NULL,
  `role_id` int(200) NOT NULL,
  `permission_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`) VALUES
(12, 9, 2),
(13, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `address` text,
  `image` text,
  `email_verified` int(11) NOT NULL DEFAULT '0',
  `phone_verified` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT '10',
  `activate` int(30) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `image`, `email_verified`, `phone_verified`, `created_at`, `updated_at`, `token`, `role`, `activate`) VALUES
(1, 'Abubakar', 'abubakar@gmail.com', 'asss', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(2, 'Abubakar', 'abubakar@gmail.com', 'asss', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(3, 'Abubakar', 'abubakar1122@gmail.com', '$2y$10$26r.YhsfW/XeLO9WYhKnFuhBcB.EgZiRIWdN2LAQ6JRYbrfGU0Svy', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(4, 'Abubakar', 'abubakar786@gmail.com', '$2y$10$3Zx8NsB2DVR7w0Ts7tggHOcGox8ZIIKRgXykhpe7DwzdjgQ8st7e2', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(5, 'Abubakar', 'abubakar.afzal@pf.com.pk', '$2y$10$REFpDR1ekjuT.OacHxnL3eMaJDCUsKdwHtXL8RQ6wUFeuhb48SBv6', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(6, 'Abubakar', 'abubakar112209890@gmail.com', '$2y$10$hKKKsrlLgGbwhpQ.HPiSGuGzvVZT2AE5Z/KjzY1sbwwEliI.dnIRG', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(7, 'Abubakar', 'abubakar111@gmail.com', '$2y$10$fV0Wo5J6Mxcg1g9HoHhat.svfibxRvuBhylcbcGkSHzmmy/4vbUAq', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(8, 'Abubakarkjklj', 'adfsasdfasdf@gmal.com', '$2y$10$qroXpKU5De1MAyI7MfTAcOCBFYmdzzN0eyA0W9tCJPBlXlZiHWKNu', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(9, 'Abubakar', 'abubakar@hotmail.com', '$2y$10$XoOm6ctTzpbNSZE9bKO9Heh2if5lAy.15Qgtc2.YmGGNIbTALbJci', NULL, NULL, 0, 0, NULL, NULL, 'jXLk5Z2c79', 10, 1),
(10, 'Abubakar', 'abubakar.afzal@pf.com.pk', '$2y$10$dSXCFnQArytNsp0nBNVmIunGOkBX7bRbIpEHQIXCdDNgERJkFEAEm', NULL, NULL, 0, 0, NULL, NULL, 'Vwu9pks9IKUBEZxhxgOhoYTiXy8UaV', 9, 1),
(11, 'Abubakar', 'abubakar786@hotmail.com', '$2y$10$FhyOTX1I8Asr1t8/kSQwteooaOZ1RdAfh6EaRVqMcqGy2RuceS9Xm', NULL, NULL, 0, 0, NULL, NULL, 'TyAawu1Ko8hsjxB7mAvKFMbSrTeb1Y', 10, 1),
(12, 'Abubakar', 'abubakar112200@gmail.com', '$2y$10$KIK3dOPrTaXneBp1kHMKT.RRNQt/OhP.qwb8EXsC16b0BB1tz4cfu', NULL, NULL, 0, 0, NULL, NULL, '4uOfjsiR2Q1n571P0Rd32bCzqeEvCN', 10, 1),
(13, 'Abubakar', 'abubakar112200@gmail.com', '$2y$10$QIjWonG5oo9RuMDIvG09f.l/ATwEx2b6kvwBikt5M4RA15nOThONS', NULL, NULL, 0, 0, NULL, NULL, 'J6TDHFqCMmYwP1kvDXOt0ErudRT8By', 10, 1),
(14, 'Abubakar', 'abubakar00@gmail.com', '$2y$10$ps3bcbIguGHjKeHhSg0tKez96WJlb13s0h7mYAzQCk3Dg6RHP5eRm', NULL, NULL, 0, 0, NULL, NULL, 'dRrRmnZs1PcRPopuQT7CP1NzAJ9FmK', 10, 1),
(15, 'Abubakar', 'abubakar1100@gmail.com', '$2y$10$Vv6hBsq8/oaGhewoaY1U2OBoniuME9KhxQ4QIcjsH4TnRp26BUARa', NULL, NULL, 0, 0, NULL, NULL, 'GzI2EGUUmmBpGTyin1yqW29lidUWd0', 10, 1),
(16, 'Abubakar', 'abubakar0099@gmail.com', '$2y$10$o97j.MQNk9M5lyOso9qr.OpO4ktnzpHg./YpDkSu.1MEV.jY1OEbC', NULL, NULL, 0, 0, NULL, NULL, '', 10, 1),
(17, 'Abubakar', 'abubakar66@gmail.com', '$2y$10$/5t3gz.hVgcohyVZeFmy6OLl.A7xsP0ZO7PMwrMhlo7/2LXz/BaOa', NULL, NULL, 0, 0, NULL, NULL, 'GzI2EGUUmmBpGTyin1yqW29lidUWd0', 10, 1),
(18, 'tututyu', 'abubakar777@gmail.com', '$2y$10$ib6kKwLg381wuFEP3mLoyul47S40k8pWif865.Ywi8Ozf.cMXwHci', NULL, NULL, 0, 0, NULL, NULL, 'GzI2EGUUmmBpGTyin1yqW29lidUWd0', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `id` bigint(20) NOT NULL,
  `plan_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `expiry_date` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`id`, `plan_id`, `user_id`, `expiry_date`) VALUES
(1, 1, 11, '02/06/2020'),
(2, 1, 11, '02/06/2020'),
(3, 2, 11, '02/06/2020'),
(4, 2, 11, '02/06/2020'),
(5, 1, 11, '02/06/2020'),
(6, 1, 11, '02/06/2020'),
(7, 2, 11, '02/06/2020'),
(8, 1, 11, '02/06/2020'),
(9, 2, 11, '02/06/2020'),
(10, 2, 11, '02/06/2020'),
(11, 2, 11, '02/06/2020'),
(12, 1, 11, '02/06/2020'),
(13, 1, 11, '02/06/2020'),
(14, 2, 11, '02/06/2020'),
(15, 1, 11, '02/06/2020'),
(16, 2, 11, '02/06/2020'),
(17, 2, 11, '02/06/2020'),
(18, 1, 11, '02/06/2020'),
(19, 3, 11, '02/06/2020'),
(20, 2, 11, '02/06/2020'),
(21, 2, 11, '02/06/2020'),
(22, 1, 11, '02/06/2020'),
(23, 1, 11, '02/06/2020'),
(24, 1, 11, '02/06/2020'),
(25, 1, 11, '02/06/2020'),
(26, 2, 11, '02/06/2020'),
(27, 1, 11, '02/06/2020'),
(36, 1, 12, '03/05/2020'),
(37, 1, 15, '03/05/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_plan`
--
ALTER TABLE `user_plan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
