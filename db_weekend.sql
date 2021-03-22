-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2017 at 10:32 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_weekend`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `timeslot_id` int(11) NOT NULL,
  `court` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `player_type` int(11) NOT NULL,
  `paid` float DEFAULT '1',
  `team` enum('A','B') NOT NULL,
  `date` date DEFAULT NULL,
  `cancel` int(11) NOT NULL DEFAULT '0',
  `bib_number` varchar(1000) DEFAULT 'N/A',
  `cash_id` varchar(1100) DEFAULT 'N/A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bookings_users1_idx` (`user_id`),
  KEY `fk_bookings_timeslots1_idx` (`timeslot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credit_requests`
--

DROP TABLE IF EXISTS `credit_requests`;
CREATE TABLE IF NOT EXISTS `credit_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float DEFAULT NULL,
  `credit` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_point_requests_users_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_id` int(11) UNSIGNED NOT NULL,
  `from_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `to_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expire_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_from_id_index` (`from_id`),
  KEY `notifications_from_type_index` (`from_type`),
  KEY `notifications_to_id_index` (`to_id`),
  KEY `notifications_to_type_index` (`to_type`),
  KEY `notifications_category_id_index` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications_categories_in_groups`
--

DROP TABLE IF EXISTS `notifications_categories_in_groups`;
CREATE TABLE IF NOT EXISTS `notifications_categories_in_groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_categories_in_groups_category_id_index` (`category_id`),
  KEY `notifications_categories_in_groups_group_id_index` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_categories`
--

DROP TABLE IF EXISTS `notification_categories`;
CREATE TABLE IF NOT EXISTS `notification_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `notification_categories_name_unique` (`name`),
  KEY `notification_categories_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification_categories`
--

INSERT INTO `notification_categories` (`id`, `name`, `text`) VALUES
(1, 'register', 'Registered with Weekend Warriors.'),
(2, 'book', 'Booked {extra.timeslot} timeslot to play in court {extra.court} on {extra.date}.'),
(3, 'transferwallet', '{extra.user} transferred {extra.amount} credit to your wallet.'),
(4, 'addwallet', 'Admin added {extra.amount} credit to your wallet.'),
(5, 'addpoint', 'Admin added {extra.amount} points to your account.'),
(6, 'creditrequest', 'requested for {extra.credit} credit.'),
(7, 'creditrequestcancel', 'Your request of {extra.credit} credit has been cancelled by Admin.'),
(8, 'creditrequestaccept', 'Your request of {extra.credit} credit(s) has been approved & credited to your wallet'),
(9, 'cancel', 'Cancelled {extra.timeslot} timeslot to play in court {extra.court} on {extra.date}.'),
(10, 'cancel.user', 'You cancelled {extra.timeslot} timeslot to play in court {extra.court} on {extra.date}.');

-- --------------------------------------------------------

--
-- Table structure for table `notification_groups`
--

DROP TABLE IF EXISTS `notification_groups`;
CREATE TABLE IF NOT EXISTS `notification_groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `notification_groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('info@wwfutsal.com', '9699bf7e3429d6c665160e95037cbdf826a3c14c96d611cb0d47c1db94cf9bae', '2016-08-09 18:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `player_types`
--

DROP TABLE IF EXISTS `player_types`;
CREATE TABLE IF NOT EXISTS `player_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player_types`
--

INSERT INTO `player_types` (`id`, `type`) VALUES
(1, 'Goal Keeper'),
(2, 'Left Back'),
(3, 'Center Back'),
(4, 'Right Back'),
(5, 'Left Midfield'),
(6, 'Center Midfield'),
(7, 'Right Midfield'),
(8, 'Center Forward');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point` bigint(20) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `top_scorer` int(11) NOT NULL,
  `top_goalkeeper` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `fk_points_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `score_details`
--

DROP TABLE IF EXISTS `score_details`;
CREATE TABLE IF NOT EXISTS `score_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `season` enum('1','2','3','4') DEFAULT '2',
  `team` enum('A','B') DEFAULT NULL,
  `result` int(11) DEFAULT NULL,
  `goals` int(11) DEFAULT NULL,
  `goals_conceded` int(11) DEFAULT NULL,
  `clean_sheet` int(11) DEFAULT NULL,
  `red_card` int(11) DEFAULT NULL,
  `yellow_card` int(11) DEFAULT NULL,
  `assist` int(11) DEFAULT NULL,
  `timeslot_id` int(11) NOT NULL,
  `court` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_score_details_users_idx` (`user_id`),
  KEY `fk_score_details_timeslots1_idx` (`timeslot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

DROP TABLE IF EXISTS `timeslots`;
CREATE TABLE IF NOT EXISTS `timeslots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `block` enum('0','1') NOT NULL DEFAULT '0',
  `hidden` enum('0','1') NOT NULL DEFAULT '0',
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `start`, `end`, `block`, `hidden`, `msg`) VALUES
(16, '12:00:00', '12:30:00', '0', '1', 'This game time-slot is block booked . For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(18, '12:30:00', '13:00:00', '0', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(20, '13:00:00', '13:30:00', '0', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(21, '13:30:00', '14:00:00', '0', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(23, '14:30:00', '15:00:00', '1', '0', 'This game time-slot is block booked By the KFM FT. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(24, '15:00:00', '15:30:00', '0', '1', 'This game time-slot is block booked By the Ladies Player. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(26, '16:00:00', '16:30:00', '1', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(28, '17:00:00', '17:30:00', '1', '1', 'This game time-slot is block booked By KFM Team. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(30, '18:00:00', '18:30:00', '0', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(31, '18:30:00', '19:00:00', '0', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(32, '19:00:00', '19:30:00', '0', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(33, '19:30:00', '20:00:00', '0', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(41, '10:00:00', '10:30:00', '1', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(42, '10:30:00', '11:00:00', '0', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(43, '11:00:00', '11:30:00', '1', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(44, '11:30:00', '12:00:00', '0', '0', 'This game time-slot is block booked for the "Law Society Futsal Tournament 2016" For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(54, '21:00:00', '21:30:00', '0', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(55, '20:00:00', '20:30:00', '0', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(56, '20:30:00', '21:00:00', '1', '1', 'This game time-slot is block booked by iCentre x DARE For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(57, '09:00:00', '09:30:00', '0', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(61, '08:30:00', '09:00:00', '0', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(62, '16:30:00', '17:00:00', '1', '1', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(64, '08:00:00', '08:30:00', '0', '0', ''),
(70, '14:00:00', '14:30:00', '1', '0', 'This game time-slot is block booked By the KFM FT. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(71, '09:30:00', '10:00:00', '0', '0', 'This game time-slot is block booked. For more info on Full Slot booking and Tournament Management, kindly contact though Whatsapp +673 823 7789'),
(72, '17:30:00', '18:00:00', '1', '1', 'This game time-slot is block booked By KFM Team. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(73, '21:30:00', '22:00:00', '0', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789'),
(75, '15:30:00', '16:00:00', '0', '1', 'This game time-slot is block booked By. For more info on Full Slot booking and Tournament Management, kindly contact through Whatsapp +673 823 7789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '3' COMMENT '1 = Superadmin , 2 = Admin , 3 = User',
  `ww_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public/avatar/default.jpg',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `telephone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quote` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `team_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package` enum('Gold','Silver') COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1067 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `ww_id`, `pic`, `name`, `email`, `password`, `dob`, `status`, `telephone`, `quote`, `team_name`, `company_name`, `package`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'WWFUTSAL0001', 'public/avatar/Admin_1', 'Admin', 'info@wwfutsal.com', '$2y$10$sor4RCD8K5UVHM6zDM8Q0eLCpXF9EwcSEmH0uZrD0KE2HKIgLixzO', NULL, '1', '', '', NULL, NULL, NULL, 'HhP8jL71ulxstZnVGefGmAdKXNfEKYqoSiFtvjRweFCRjqeRWsWpn8hnkNxZ', NULL, '2016-12-13 13:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
CREATE TABLE IF NOT EXISTS `wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` bigint(20) NOT NULL,
  `action` varchar(100) NOT NULL,
  `data` varchar(100) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_wallets_users_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_timeslots1` FOREIGN KEY (`timeslot_id`) REFERENCES `timeslots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bookings_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_requests`
--
ALTER TABLE `credit_requests`
  ADD CONSTRAINT `fk_point_requests_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `notification_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications_categories_in_groups`
--
ALTER TABLE `notifications_categories_in_groups`
  ADD CONSTRAINT `notifications_categories_in_groups_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `notification_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_categories_in_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `notification_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `score_details`
--
ALTER TABLE `score_details`
  ADD CONSTRAINT `fk_score_details_timeslots1` FOREIGN KEY (`timeslot_id`) REFERENCES `timeslots` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_score_details_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `fk_wallets_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
