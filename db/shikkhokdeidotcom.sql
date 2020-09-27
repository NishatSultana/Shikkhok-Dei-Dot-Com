-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2020 at 03:26 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `applications_user_id_foreign` (`user_id`),
  KEY `applications_job_id_foreign` (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `status`, `created_at`, `updated_at`, `user_id`, `job_id`) VALUES
(1, 1, '2020-07-24 00:08:57', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `display`, `created_at`, `updated_at`) VALUES
(1, 'System Admin', 0, '2020-07-24 00:06:34', '2020-07-24 00:06:34'),
(2, 'Admin', 1, '2020-07-24 00:06:34', '2020-07-24 00:06:34'),
(3, 'Student/Guardian', 1, '2020-07-24 00:06:34', '2020-07-24 00:06:34'),
(4, 'Tutor', 1, '2020-07-24 00:06:34', '2020-07-24 00:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

DROP TABLE IF EXISTS `group_permission`;
CREATE TABLE IF NOT EXISTS `group_permission` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_permission_group_id_permission_id_unique` (`group_id`,`permission_id`),
  KEY `group_permission_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_03_25_124218_create_modules_table', 1),
(3, '2020_03_25_124833_create_permissions_table', 1),
(4, '2020_03_25_130323_create_groups_table', 1),
(5, '2020_03_25_130857_create_users_table', 1),
(6, '2020_04_08_201538_create_notifications_table', 1),
(7, '2020_07_23_132139_create_tutor_jobs_table', 1),
(8, '2020_07_24_052400_create_applications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `label`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Modules', 'modules', '2020-07-24 00:06:34', '2020-07-24 00:06:34'),
(2, 'Permissions', 'permissions', '2020-07-24 00:06:34', '2020-07-24 00:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `sender_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  KEY `notifications_sender_type_sender_id_index` (`sender_type`,`sender_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_module_id_foreign` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `codename`, `created_at`, `updated_at`, `module_id`) VALUES
(1, 'View Module', 'view_modules', NULL, NULL, 1),
(2, 'Add Module', 'add_modules', NULL, NULL, 1),
(3, 'Change Module', 'change_modules', NULL, NULL, 1),
(4, 'Delete Module', 'delete_modules', NULL, NULL, 1),
(5, 'View Permissions', 'view_Permissions', NULL, NULL, 2),
(6, 'Add Permissions', 'add_Permissions', NULL, NULL, 2),
(7, 'Change Permissions', 'change_Permissions', NULL, NULL, 2),
(8, 'Delete Permissions', 'delete_Permissions', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tutor_jobs`
--

DROP TABLE IF EXISTS `tutor_jobs`;
CREATE TABLE IF NOT EXISTS `tutor_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tutor_type` tinyint(4) DEFAULT NULL,
  `institute_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_location` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_of_students` int(11) DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day_per_week` tinyint(4) DEFAULT NULL,
  `student_category` int(11) DEFAULT NULL,
  `hiring_time` timestamp NULL DEFAULT NULL,
  `student_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_gender` smallint(6) DEFAULT NULL,
  `tutor_gender` smallint(6) DEFAULT NULL,
  `requirements` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tutor_jobs_users_foreign` (`users`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutor_jobs`
--

INSERT INTO `tutor_jobs` (`id`, `tutor_type`, `institute_name`, `job_location`, `no_of_students`, `salary`, `day_per_week`, `student_category`, `hiring_time`, `student_class`, `subject_list`, `student_gender`, `tutor_gender`, `requirements`, `created_at`, `updated_at`, `users`) VALUES
(1, 1, 'IDC', 'Dhaka, Khilgaon', 1, '5000', 4, 2, '2020-12-30 18:00:00', '7', 'English, Math', 1, 3, 'Nothing', '2020-07-24 00:07:34', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` smallint(6) DEFAULT NULL,
  `present_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_system_user` tinyint(4) NOT NULL DEFAULT 0,
  `is_staff` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_group_id_foreign` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `mobile`, `profile_pic`, `dob`, `gender`, `present_address`, `permanent_address`, `email`, `password`, `is_system_user`, `is_staff`, `remember_token`, `status`, `bio`, `email_verification_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `group_id`) VALUES
(1, 'System Admin', '01516112348', NULL, NULL, NULL, NULL, NULL, 'system@shikkhonkhuji.com', '$2y$10$Pqmi84W7Mnf6921ntVxF.e/U4KuZLIQ4KZz/F3k2OAMctMNPuuVXu', 1, 0, NULL, 1, NULL, NULL, NULL, NULL, '2020-07-24 00:06:34', '2020-07-24 00:06:34', 1),
(2, 'Admin', '', NULL, NULL, NULL, NULL, NULL, 'admin@shikkhonkhuji.com', '$2y$10$4fNSR8Pihmwm01eLGMdKj.PGPIdTjAv4yKuTgcHvRBZMHRexOMc4m', 0, 1, NULL, 1, NULL, NULL, NULL, NULL, '2020-07-24 00:06:34', '2020-07-24 00:06:34', 2),
(3, 'Student/Guardian', '', NULL, NULL, NULL, NULL, NULL, 'student_guardian@shikkhonkhuji.com', '$2y$10$nG7TDpoeuyhvG5Pjhyph4ekewPAMJ3NFVIWRt4J3Reft8Szx.JOmK', 0, 1, NULL, 1, NULL, NULL, NULL, NULL, '2020-07-24 00:06:34', '2020-07-24 00:06:34', 3),
(4, 'Tutor', '', NULL, NULL, NULL, NULL, NULL, 'tutor@shikkhonkhuji.com', '$2y$10$p8Y5kwYPQC3OghniAZ1YIekOC7jyn7DQ.RE8hIbMwTK7w6qntQAqe', 0, 0, NULL, 1, NULL, NULL, NULL, NULL, '2020-07-24 00:06:34', '2020-07-24 00:06:34', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
