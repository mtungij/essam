-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 07:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `essam_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintanance`
--

CREATE TABLE `maintanance` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `expenses` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `suggestion` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL COMMENT 'Created At'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `expenses` text DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salio`
--

CREATE TABLE `salio` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `created_time` date DEFAULT NULL,
  `income` int(11) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `position`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'juma', 'juma1', 'Admin', '$2y$12$S0X3.UluQh24dhcus3RcsuhYKhKVGbnnGw6CR9mIK/i1PiQ7U7W3a', '2023-12-26 12:48:50', '2023-12-27 12:25:39', '2023-12-27 12:25:39'),
(8, 'Kilian', 'kilian', 'Staff', '$2y$12$xcZEiMAdwzUjW99AUsDOueS/MgxeQwhC4lFaXTmMk4vVIbtfcLV92', '2023-12-25 23:04:04', '2023-12-26 17:46:18', '2023-12-26 17:46:18'),
(9, 'kado', 'kado', 'Admin', '$2y$12$Yl4wpa.2s.r8ucLL8Dp9t.Zl0atTZqmR.zLDEXVe0u5COaT9TVVCm', '2023-12-26 17:47:08', '2023-12-31 08:38:46', '2023-12-31 08:38:46'),
(10, 'nill', 'nill1', 'Admin', '$2y$12$O2/8vvL7sT1ccQZTtCemK.0TKBkZXkVjDKz9/xCBl0iY6I0UMlsSm', '2023-12-26 17:47:36', '2023-12-31 08:38:49', '2023-12-31 08:38:49'),
(11, 'AZAM ENERGY new', 'jonson20', 'Admin', '$2y$12$s1hjPt3EVhK.hb8xA01n5uX25KGBHn3jnNcx8AactzhsHc9n71AfO', '2023-12-27 12:17:49', '2023-12-31 08:38:51', '2023-12-31 08:38:51'),
(12, 'GLAND MALT', 'kad0', 'Admin', '$2y$12$6EPqTm8mZR5c9ngjKoHKjuwtY4I9CYZUJQ.HWzqG0bEI3cxa/IXdG', '2023-12-30 18:00:05', '2023-12-31 08:38:54', '2023-12-31 08:38:54'),
(13, 'Jonson James', 'Jonson', 'Admin', '$2y$12$xNMQRIPwsE58FYnbYtdH.e6Ki439QSSzGnmrddUHUT5PHl4ckd4c6', '2023-12-31 08:54:44', '2024-01-02 09:13:53', '2024-01-02 09:13:53'),
(14, 'Test', 'test', 'Staff', '$2y$12$I7QUaPif3G1w1ab/unXpvehX20wqA5lRDNQFTW5TWgkW036K8MTG.', '2023-12-31 10:34:50', '2024-01-02 09:17:47', '2024-01-02 09:17:47'),
(15, 'Finaltest', 'demo', 'Staff', '$2y$12$0a7OGavWW1lQsYa4jh/3g.B.M6FptfyWW.fV/cajqMQ/Ftiq.ICwS', '2023-12-31 10:39:04', '2024-01-02 09:19:47', '2024-01-02 09:19:47'),
(16, 'ESSAM', 'essam', 'Staff', '$2y$12$rB0/Wj3yu1Je5XUzz7booOLXUq8rR5sSDb.7irMs1imyNQe8jUC3u', '2024-01-01 19:45:00', '2024-01-02 09:21:00', '2024-01-02 09:21:00'),
(17, 'FINDOS', 'FINDO', 'Staff', '$2y$12$LhJWht4Jy2NNz7hVQr04Zu48jmIlFhEEScPikTIIpGXqWjPlpx3Ay', '2024-01-01 23:04:11', '2024-01-02 09:21:55', '2024-01-02 09:21:55'),
(18, 'GLAND MALT', 'elli', 'Admin', '$2y$12$3xglCwHKN6WpMNW/QQTCzOHaUEG60yqBchDX1ez6E/LfBDTk63gS6', '2024-01-02 08:46:37', '2024-01-02 09:24:36', '2024-01-02 09:24:36'),
(19, 'SON ', 'JAMES', 'Staff', '$2y$12$pZB1.jQDhwK3FBCAKF7FA.lLGNya/33uty1lCAvJpfeyyM3VPJice', '2024-01-02 09:33:02', '2024-01-04 20:00:36', '2024-01-04 20:00:36'),
(20, 'JOHNS', 'JOHN', 'Admin', '$2y$12$y6upK6qs0zQwZFXGO.mbTuqSyYHf5kp4Vawk4i7u4iS2QuIjNbTV2', '2024-01-02 09:34:51', '2024-01-04 20:00:45', '2024-01-04 20:00:45'),
(21, 'ILOMBA', 'ILOLO', 'Staff', '$2y$12$DiXUtrTTbfyS8g3vUgCluuBNGWKSXZKgEHZ4D9VlmBfCHyL8eK4ha', '2024-01-02 09:53:45', '2024-01-04 20:00:48', '2024-01-04 20:00:48'),
(22, 'JAMAA', 'kadoooo', 'Staff', '$2y$12$q0LIEMKrg7s7eDlCJeJv/.5OQCrH/TDs5bTn35xLltDK3YLxMugMa', '2024-01-02 09:58:31', '2024-01-04 20:00:52', '2024-01-04 20:00:52'),
(23, 'uyole', 'uyolo', 'Staff', '$2y$12$isamaCuxnsUbRes77OLhl.2RGNMpA0dFkYSpdUWVFAMj9URKbXBJ.', '2024-01-02 10:37:25', '2024-01-04 20:00:55', '2024-01-04 20:00:55'),
(24, 'Jonson20', 'Jonso', 'Staff', '$2y$12$BCNcdpIPEOCuhR6gCzUwNOmlMML59X0xnMcL8ZncihVDJIKt96gum', '2024-01-03 19:36:46', '2024-01-04 20:01:00', '2024-01-04 20:01:00'),
(26, 'james', 'Jons', 'Admin', '1234', NULL, '2024-01-11 10:45:44', '2024-01-11 10:45:44'),
(27, 'winn', 'winn', 'Admin', '1234', NULL, NULL, NULL),
(29, 'winnfrida', 'winner', 'Admin', '$2y$12$rfd8rGMg8cPg/M0edNoL0uZlGVde0p22EZMRP9OLSzMXmBQ2uoTbu', '2024-01-04 20:22:59', '2024-01-04 20:25:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintanance`
--
ALTER TABLE `maintanance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_fkey_idx` (`user_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_user_fkey_idx` (`user_id`);

--
-- Indexes for table `salio`
--
ALTER TABLE `salio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fkey` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintanance`
--
ALTER TABLE `maintanance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salio`
--
ALTER TABLE `salio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_user_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salio`
--
ALTER TABLE `salio`
  ADD CONSTRAINT `user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
