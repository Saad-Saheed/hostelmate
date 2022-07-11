-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 03:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostelmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `staff_number`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Aja Nlekoko', 'KP-COM-2948HG', 'janbaodade2020@gmail.com', '2022-03-08 13:05:57', '$2y$10$680HlD7ug2vkicI2H7/4iOEiNo/to62Wn9Udzog2XTu7SX.s3bgpS', 'ynTZc1Qlx7Vkxsz3zh9KcZBmbDfjfpWSGei4Et9TrB8NLNUz2sTDL0XZeCvr', '2022-03-08 08:53:29', '2022-05-31 14:23:41'),
(3, 'Hassan enitan', 'KP-COM-7648Gj', 'hassanenitan78@gmail.com', NULL, '$2y$10$duDe412VT4rBY7VHUiZjXuM04PAeHQDOUwMDOv98hPxxDfvrDCg6i', NULL, '2022-05-23 19:24:28', '2022-05-23 19:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `admin_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computer Science', 'The home of ICT and  backbone of the whole institution', '2022-03-07 10:48:40', '2022-03-07 10:48:40'),
(2, 1, 'Mass COMM', 'Talkertive', '2022-03-07 10:50:51', '2022-05-25 04:09:33'),
(3, 1, 'OTM', 'Ebo poo ju', '2022-05-24 18:12:40', '2022-05-24 18:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_page_slides`
--

CREATE TABLE `home_page_slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_slides`
--

INSERT INTO `home_page_slides` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'slider_1651493136.jpg', '2022-05-01 16:54:05', '2022-05-02 11:05:36'),
(2, 'slider_1651433482.jpg', '2022-05-01 18:31:22', '2022-05-01 18:31:22'),
(3, 'slider_1651435348.jpg', '2022-05-01 19:02:28', '2022-05-01 19:02:28'),
(5, 'slider_1651491403.jpg', '2022-05-02 10:36:43', '2022-05-02 10:36:43'),
(7, 'slider_1654449292.jpg', '2022-05-28 15:07:44', '2022-06-05 16:14:52'),
(8, 'slider_1654449355.jpg', '2022-06-05 16:15:55', '2022-06-05 16:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hostel_category_id` bigint(20) UNSIGNED NOT NULL,
  `block_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bed` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `hostel_category_id`, `block_name`, `room_no`, `total_bed`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Block A', '12', NULL, 1, '2022-05-28 04:29:33', '2022-05-28 05:52:52'),
(2, 1, 'Block A', '9', 5, 1, '2022-05-28 04:37:37', '2022-05-28 05:07:20'),
(3, 2, 'Block A', '1', 4, 1, '2022-06-07 07:53:23', '2022-06-07 07:53:23'),
(4, 2, 'Block A', '2', 4, 1, '2022-06-07 07:53:51', '2022-06-07 07:53:51'),
(5, 2, 'Block A', '3', NULL, 1, '2022-06-07 08:02:55', '2022-06-07 08:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_assigns`
--

CREATE TABLE `hostel_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bed_no` int(11) NOT NULL,
  `hostel_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_assigns`
--

INSERT INTO `hostel_assigns` (`id`, `bed_no`, `hostel_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(13, 3, 1, 3, 1, '2022-05-28 22:19:16', '2022-05-28 22:19:16'),
(25, 3, 3, 2, 1, '2022-06-07 12:50:41', '2022-06-07 12:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_categories`
--

CREATE TABLE `hostel_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facilities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bed_per_room` int(11) NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_categories`
--

INSERT INTO `hostel_categories` (`id`, `admin_id`, `name`, `description`, `facilities`, `amount`, `address`, `total_bed_per_room`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Classic Villa', 'The best among the rest hostel although this is grade three hostel category.', '[\"Water\",\"Electricity\",\"Air Condition\",\"Wardrobe\",\"Security\"]', '9000.00', 'round about', 3, 'female', 1, '2022-05-27 13:09:01', '2022-05-28 04:14:37'),
(2, 1, 'Olympic Hostel', 'The most Cool, Calm, tidy environment hostel.', '[\"Water\",\"Electricity\",\"Air Condition\"]', '5000.00', 'Stadium Road, Yankari', 3, 'male', 1, '2022-06-07 05:01:32', '2022-06-07 05:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_03_05_123244_create_admins_table', 1),
(5, '2022_03_07_102305_create_departments_table', 1),
(6, '2022_10_12_000000_create_users_table', 1),
(7, '2022_03_09_035910_create_hostel_categories_table', 2),
(9, '2022_03_09_042106_create_transactions_table', 2),
(10, '2022_03_13_143205_create_complains_table', 2),
(11, '2022_03_13_160306_create_messages_table', 2),
(12, '2022_03_09_040732_create_hostels_table', 3),
(13, '2022_05_12_141901_create_hostel_assigns_table', 3),
(14, '2022_05_25_051123_create_photos_table', 4),
(15, '2022_05_01_115844_create_sites_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('janbaodade2020@gmail.com', '$2y$10$xL5Qij49hAcXq8JHHJD2QO1jPBIiVbwNfHPXoxbeufgZg7aY68h6G', '2022-05-31 15:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `imageable_type`, `imageable_id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\HostelCategory', 1, '2022_05_27_0946484.png', '2022-05-27 13:09:01', '2022-05-27 13:09:01'),
(4, 'App\\Models\\HostelCategory', 1, '2022_05_27_09343910.jpg', '2022-05-27 20:34:39', '2022-05-27 20:34:39'),
(5, 'App\\Models\\HostelCategory', 1, '2022_05_27_093519FB_IMG_1588365177973.jpg', '2022-05-27 20:34:39', '2022-05-27 20:34:39'),
(7, 'App\\Models\\HostelCategory', 1, '2022_05_27_09343915-london.jpg', '2022-05-27 20:46:48', '2022-05-27 20:46:48'),
(11, 'App\\Models\\HostelCategory', 2, 'hostelcat_1654582375_6Zo6b.jpg', '2022-06-07 05:12:55', '2022-06-07 05:12:55'),
(12, 'App\\Models\\HostelCategory', 2, 'hostelcat_1654582375_rHmSE.jpg', '2022-06-07 05:12:55', '2022-06-07 05:12:55'),
(13, 'App\\Models\\HostelCategory', 2, 'hostelcat_1654582375_a0bq5.jpg', '2022-06-07 05:12:55', '2022-06-07 05:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_logo`, `created_at`, `updated_at`) VALUES
(1, 'logo_1653919913.png', '2022-05-28 15:01:05', '2022-05-30 13:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `testimonies`
--

CREATE TABLE `testimonies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT 'Student',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonies`
--

INSERT INTO `testimonies` (`id`, `name`, `occupation`, `image`, `comment`, `created_at`, `updated_at`) VALUES
(2, 'jambaoda Ishola', 'Student', 'user_1651392206.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum porro soluta, rerum quaerat et consequatur fuga voluptates, doloremque dolorem commodi dolor molestiae assumenda sequi fugit eaque nemo expedita provident voluptate!', '2022-05-01 07:03:26', '2022-05-02 10:35:04'),
(3, 'Saheed Saad', 'Student', 'user_1651392345.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum porro soluta, rerum quaerat et consequatur fuga voluptates, doloremque dolorem commodi dolor molestiae assumenda sequi fugit eaque nemo expedita provident voluptate!', '2022-05-01 07:05:45', '2022-05-01 07:05:45'),
(4, 'alao ibrahim', 'Student', 'user_1651393339.jpg', 'Their services are top-notch, you will always keep on partnering with them once you try them.\r\nThey are the best of the best!!!', '2022-05-01 07:22:19', '2022-05-02 11:03:03'),
(5, 'Amaka Onuora', 'Student', 'user_1653754952.jpg', 'I can say it openly that, this is the best Campus hostel in the whole of Nigeria', '2022-05-28 15:22:32', '2022-05-28 15:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hostel_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_no`, `payment_method`, `payment_ref`, `user_id`, `hostel_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '06227646BX911064L', 'PayPal', 'default', 2, 3, '5000.00', 'COMPLETED', '2022-06-07 12:39:41', '2022-06-07 12:39:41'),
(2, '0JR995009T236630J', 'PayPal', 'yC570QUL07062022015041', 2, 3, '5000.00', 'COMPLETED', '2022-06-07 12:50:42', '2022-06-07 12:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('ND1','ND2','HND1','HND2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `student_id`, `department_id`, `dob`, `gender`, `level`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alabi jamiu', 'janbaoda@gmail.com', 'KPHNDFT2021_0388', 1, '2022-04-05', 'male', 'HND1', '0', '2022-03-08 08:24:48', '$2y$10$0vk0S3BlSjpJfq.A02iS.O1qkKlF05iHk6XYHn.21ypOe.CqAhKbu', '1kuIlKJ43pIrXHfpFYT4HLAbsnE9QhqeGheuE3ko4XJ9I80c7fjzh97p4UoW', '2022-03-07 13:45:03', '2022-06-01 09:36:40'),
(2, 'Saad Saheed', 'janbaodade2020@gmail.com', 'HND/21/COM/FT/121', 1, '2022-05-19', 'male', 'HND1', '1', '2022-05-23 12:40:14', '$2y$10$PLLAEB.rnauoE.0bILOJfeOEMdoGIbzgNeqcSDE5GXS20iBht40oi', 'Eu2tiBuobuzJrZJI9yh07YqUeuF3MWBSowXBqaINNcUvD4e6dDQaSBQTRVqN', '2022-05-20 10:47:16', '2022-05-23 12:40:14'),
(3, 'issa fatimoh', 'fatimoh@gmail.com', 'HND/20/COM/FT/091', 1, '1997-08-24', 'female', 'ND2', '1', NULL, '$2y$10$xQEsngUV5E0eH1LIGCl9kuDw1llhazxkvVuU4kh5DplYpRi7AjYPu', NULL, '2022-05-24 14:00:17', '2022-05-24 14:00:17'),
(4, 'Saheed Saad!,.;', 'janbaodade2021@gmail.com', 'KPHNDFT2021_0362', 1, '1999-05-25', 'male', 'HND1', '1', NULL, '$2y$10$tSN43oqrRI.StcPHl1hGZOADCISBDDGLryBm6s1LeSOVm2m93RhbO', NULL, '2022-05-25 12:08:58', '2022-05-25 12:08:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complains_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_admin_id` (`admin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_page_slides`
--
ALTER TABLE `home_page_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostels_hostel_category_id_foreign` (`hostel_category_id`);

--
-- Indexes for table `hostel_assigns`
--
ALTER TABLE `hostel_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hostel_assigns_hostel_id_foreign` (`hostel_id`),
  ADD KEY `hostel_assigns_user_id_foreign` (`user_id`);

--
-- Indexes for table `hostel_categories`
--
ALTER TABLE `hostel_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `hostel_category_admin_id` (`admin_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonies`
--
ALTER TABLE `testimonies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_hostel_id_foreign` (`hostel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_department_id_foreign` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_page_slides`
--
ALTER TABLE `home_page_slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hostel_assigns`
--
ALTER TABLE `hostel_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hostel_categories`
--
ALTER TABLE `hostel_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonies`
--
ALTER TABLE `testimonies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `complains_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `department_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `hostels`
--
ALTER TABLE `hostels`
  ADD CONSTRAINT `hostels_hostel_category_id_foreign` FOREIGN KEY (`hostel_category_id`) REFERENCES `hostel_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hostel_assigns`
--
ALTER TABLE `hostel_assigns`
  ADD CONSTRAINT `hostel_assigns_hostel_id_foreign` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`),
  ADD CONSTRAINT `hostel_assigns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hostel_categories`
--
ALTER TABLE `hostel_categories`
  ADD CONSTRAINT `hostel_category_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_hostel_id_foreign` FOREIGN KEY (`hostel_id`) REFERENCES `hostels` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
