-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 05:47 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dormfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@example.com', NULL, '$2y$10$xFs.XyCRTYDz/s4a3CET7eC3P0nFuOe.5RIS2gxRAWEcs9C5J7B1W', NULL, '2021-07-23 22:46:55', '2021-07-23 22:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) NOT NULL,
  `dormitory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenities` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `dormitory`, `amenities`) VALUES
(10, 'Tabaniag Dormitory', 'Airconditioned Rooms');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stud_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dormitory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dorm`
--

CREATE TABLE `dorm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dorm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nearest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_space` int(20) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dorm`
--

INSERT INTO `dorm` (`id`, `first_name`, `middle_name`, `last_name`, `dorm_name`, `barangay`, `street`, `house_num`, `nearest`, `mobile_num`, `available_space`, `description`) VALUES
(36, 'Henry', 'G', 'Tabaniag', 'Tabaniag Dormitory', '16-S Quiling Sur', 'Bacucang Road', '0', 'Teatro Ilocandia', '09355350600', 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec arcu purus, faucibus in pulvinar id, dictum non purus. Pellentesque a est justo. Ut nec urna ac quam dictum dictum.'),
(47, 'Benjamin', NULL, 'Agres', 'Beljoms Residence Hall', NULL, NULL, NULL, NULL, '09196914900', NULL, NULL),
(48, 'Heidee Rhoss', 'F.', 'Baptista', 'Baptista Boarding House', NULL, NULL, NULL, NULL, '09959862639', NULL, NULL),
(49, 'Rogelio', 'R.', 'Dumlao', 'Tablang Dormitory', NULL, NULL, NULL, NULL, '09171240562', NULL, NULL),
(50, 'Ferdinand', NULL, 'Flojo', 'Paulin Boarding House', NULL, NULL, NULL, NULL, '09456056852', NULL, NULL),
(51, 'Maryline', 'L.', 'Flojo', 'WestView Dormitory', NULL, NULL, NULL, NULL, '09268543512', NULL, NULL),
(52, 'Jocelyn', 'M.', 'Fuentes', 'JHM Apartment', NULL, NULL, NULL, NULL, '09175484904', NULL, NULL),
(53, 'Avelina', 'P.', 'Laud', 'Cami Dorm', NULL, NULL, NULL, NULL, '09478909954', NULL, NULL),
(54, 'Teosfisto', 'M.', 'Rangcapan', 'Bholsbecs Boarding House', NULL, NULL, NULL, NULL, '792-3986', NULL, NULL),
(55, 'Ofelia', 'C.', 'Orcino', 'Felmar\'s Dormitory', NULL, NULL, NULL, NULL, '09292510126', NULL, NULL),
(57, 'Hadji', NULL, 'Pugat', 'Doc Hadj Dormitory', NULL, NULL, NULL, NULL, '09178857576', NULL, NULL);

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) NOT NULL,
  `dormitory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `dormitory`, `filename`) VALUES
(29, 'Tabaniag Dormitory', '2.jpg'),
(30, 'Tabaniag Dormitory', '3.jpg'),
(31, 'Tabaniag Dormitory', 'sample.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dorm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `email_verified_at`, `password`, `dorm_name`, `mobile_num`, `remember_token`, `created_at`, `updated_at`) VALUES
(36, 'Henry', 'G', 'Tabaniag', 'manager@asd.com', NULL, '$2y$10$mxIPQstCW.x7mEzarjXr3ewIDzddi8G285wobaqTDpAMxCUzucyW6', 'Tabaniag Dormitory', '09454596560', NULL, '2021-07-28 04:31:34', '2021-08-03 20:34:25');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_18_000000_create_admins_table', 1),
(5, '2021_07_24_000000_create_managers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `occupants`
--

CREATE TABLE `occupants` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stud_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `college` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dormitory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupants`
--

INSERT INTO `occupants` (`id`, `first_name`, `middle_name`, `last_name`, `suffix`, `stud_num`, `sex`, `email`, `mobile_num`, `guardian_name`, `guardian_num`, `barangay`, `street`, `city`, `province`, `college`, `course`, `dormitory`, `room_type`) VALUES
(66, 'Michael Edrei', 'Casil', 'Miguel', NULL, '18-020196', 'Male', 'drei@example.com', '09454596560', 'Edward P. Miguel', '09259615825', 'Barangay 16', 'Villanueva Street', 'Laoag City', 'Ilocos Norte', 'CAS', 'BSCS', 'Tabaniag Dormitory', 'Transient');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registrants`
--

CREATE TABLE `registrants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dorm_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrants`
--

INSERT INTO `registrants` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `email_verified_at`, `password`, `dorm_name`, `mobile_num`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Benjamin', NULL, 'Agres', 'agresbenjamin@gmail.com', NULL, '$2y$10$eu22YTNBzgWYJjbNrxlCjOMSFVZgoCK5F1siwxYLVivISPcEyH7ne', 'Beljoms Residence Hall', '09196914900', NULL, '2021-08-06 03:43:50', '2021-08-06 03:43:50'),
(6, 'Heidee Rhoss', 'F.', 'Baptista', 'bheideerhoss@yahoo.com', NULL, '$2y$10$W5Um/Mg3ilyti8AKZ9PFYumPXCSHDZ/LKyOd/EwWPPsslUlP6VUqG', 'Baptista Boarding House', '09959862639', NULL, '2021-08-06 03:44:41', '2021-08-06 03:44:41'),
(7, 'Rogelio', 'R.', 'Dumlao', 'franz_dumlao@yahoo.com', NULL, '$2y$10$T5eUX3DAa6vORaHZ2h/CR.ipspR2/gzrvyKsammVO2f09BMxbWEOW', 'Tablang Dormitory', '09171240562', NULL, '2021-08-06 03:45:16', '2021-08-06 03:45:16'),
(8, 'Ferdinand', NULL, 'Flojo', 'paulinboardhouse@gmail.com', NULL, '$2y$10$GUxwDQ08tXR1VOYrs7yaseIbo0VSoWwSpxJ81WelqdH2PLhOzUB.2', 'Paulin Boarding House', '09456056852', NULL, '2021-08-06 03:45:54', '2021-08-06 03:45:54'),
(9, 'Maryline', 'L.', 'Flojo', 'maryline_flojo@yahoo.com', NULL, '$2y$10$hnyhN7sTUICqjrf.1xJrk.Ok9ObakexHlaP/n//w8xsi0slQACisq', 'WestView Dormitory', '09268543512', NULL, '2021-08-06 03:46:38', '2021-08-06 03:46:38'),
(10, 'Jocelyn', 'M.', 'Fuentes', 'jocelyn.fuentes18@yahoo.com', NULL, '$2y$10$jkdqtkZ5rH0NbVE8njrdm.IWg/SXSD89J4iLaOaN927ncsMDWOeve', 'JHM Apartment', '09175484904', NULL, '2021-08-06 03:47:18', '2021-08-06 03:47:18'),
(11, 'Avelina', 'P.', 'Laud', 'west_avcherry@yahoo.com', NULL, '$2y$10$OkamLyn673Mgn2qJwP5UteJSaq6m5e151u.lEbxiusNB7AYwUBLGy', 'Cami Dorm', '09478909954', NULL, '2021-08-06 03:47:53', '2021-08-06 03:47:53'),
(12, 'Teosfisto', 'M.', 'Rangcapan', 'maveeshan@yahoo.com', NULL, '$2y$10$6WieFsGsFNmbykZEBZlqq.vKqPz1L7TUlRrR2YjouVSvGWGOJ/aB.', 'Bholsbecs Boarding House', '792-3986', NULL, '2021-08-06 03:48:33', '2021-08-06 03:48:33'),
(13, 'Ofelia', 'C.', 'Orcino', 'felmardorm@gmail.com', NULL, '$2y$10$uVmCalX6jPa58lZsl2IowO0X3huIKC35/a8fScU59M.Dz6S.kUGm2', 'Felmar\'s Dormitory', '09292510126', NULL, '2021-08-06 03:50:08', '2021-08-06 03:50:08'),
(14, 'Hadji', NULL, 'Pugat', 'hadjidoc@yahoo.com', NULL, '$2y$10$z9U1EakvjoRuNDOepdUw5.VrvA9yg321LkihWlHw1BI4HHdrUwusa', 'Doc Hadj Dormitory', '09178857576', NULL, '2021-08-06 03:52:38', '2021-08-06 03:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` bigint(20) NOT NULL,
  `dormitory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacancy` int(255) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `dormitory`, `room_type`, `vacancy`, `price`) VALUES
(46, 'Tabaniag Dormitory', 'Single Room', 5, '1300'),
(89, 'Tabaniag Dormitory', 'Transient', NULL, '1500'),
(90, 'Tabaniag Dormitory', 'Transient', 7, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stud_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `middle_name`, `suffix`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `stud_num`, `sex`, `barangay`, `street`, `city`, `province`, `mobile_num`, `guardian_name`, `guardian_num`, `college`, `course`) VALUES
(2, 'Miguel', 'Michael Edrei', 'Casil', NULL, 'drei@example.com', NULL, '$2y$10$yHwo8h13NxdJF9yJd/RJyugTCRFHXp2OraEAlfnwPp0f21LphrkVe', NULL, '2021-07-22 00:27:29', '2021-08-05 04:31:01', '18-020196', 'Male', 'Barangay 16', 'Villanueva Street', 'Laoag City', 'Ilocos Norte', '09454596560', 'Edward P. Miguel', '09259615825', 'CAS', 'BSCS'),
(5, 'Francisco', 'Paola Joy', 'Nuque', 'NONE', 'pjnfrancisco@gmail.com', NULL, '$2y$10$cVlJmznBYODBXDDX54EUAOl68h6NPDdzDCatHa8rNZ5Csu1subYfe', NULL, '2021-08-04 23:21:17', '2021-08-04 23:21:17', '18-020008', NULL, NULL, NULL, NULL, NULL, '09355350600', NULL, NULL, NULL, NULL),
(6, 'Barruga', 'Milagros', 'B', 'NONE', 'milagrosbarruga@example.com', NULL, '$2y$10$jYhGMNWykW2uRP5hboV.puqXvO2APmef5vuenY3gwqviZ.gUyDURe', NULL, '2021-08-06 00:52:14', '2021-08-06 00:54:06', '18-020014', 'Male', '21', 'Sample Street', 'Sample City', 'Sample Province', '09454596560', 'Sample Guardian', '09529683912', 'CAS', 'BSCS');

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
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dorm`
--
ALTER TABLE `dorm`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dorm_name` (`dorm_name`),
  ADD UNIQUE KEY `owner_name` (`first_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `managers_email_unique` (`email`),
  ADD UNIQUE KEY `name` (`first_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupants`
--
ALTER TABLE `occupants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `registrants`
--
ALTER TABLE `registrants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `stud_num` (`stud_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `dorm`
--
ALTER TABLE `dorm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `occupants`
--
ALTER TABLE `occupants`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `registrants`
--
ALTER TABLE `registrants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
