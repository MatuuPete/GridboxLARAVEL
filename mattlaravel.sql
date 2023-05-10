-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 05:20 PM
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
-- Database: `mattlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopters`
--

CREATE TABLE `adopters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_fname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_lname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_adopted` date DEFAULT NULL,
  `address` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adopters`
--

INSERT INTO `adopters` (`id`, `a_fname`, `a_lname`, `date_adopted`, `address`, `phone`, `user_id`) VALUES
(14, 'Joakim', 'Sas', '2021-10-15', 'Taguig', 123, NULL),
(15, 'Andors', 'Cgor', '2021-09-16', 'Makati', 789, 5),
(16, 'Salina', 'Satrs', '2021-08-17', 'Taguig', 456, NULL),
(17, 'Aries', 'Sax', '2021-07-17', 'Makati', 678, NULL),
(18, 'Kimmy', 'Rosa', '2021-08-17', 'Mandaluyong', 234, NULL),
(23, 'Jordan', 'Mege', NULL, 'Taguig', 123, 18),
(27, 'Koko', 'Max', NULL, 'Taguig', 123, 21),
(28, 'Caleb', 'Roem', NULL, 'Manalili', 912124141, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `date_rescued` date NOT NULL,
  `place_rescued` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rescuer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `personnel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `adopter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_checked` date NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_adopted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `type`, `breed`, `name`, `gender`, `age`, `date_rescued`, `place_rescued`, `image`, `rescuer_id`, `personnel_id`, `adopter_id`, `date_checked`, `status`, `date_adopted`) VALUES
(1, 'Dog', 'German Shepherd', 'Kevin', 'Male', 1, '2021-08-15', 'Taguig', 'storage/images/dog3.jpg', NULL, NULL, NULL, '2021-08-15', 'Rehabilitated', NULL),
(2, 'Cat', 'Persan', 'Pillow', 'Female', 1, '2021-09-15', 'Makati', 'storage/images/dog2.jpg', 4, 3, 14, '2021-09-15', 'Adopted', '2021-01-01'),
(4, 'Dog', 'Bulldog', 'Frank', 'Female', 1, '2021-07-15', 'Mandaluyong', 'storage/images/dog4.jpg', NULL, NULL, NULL, '2021-07-15', 'Rehabilitated', NULL),
(5, 'Dog', 'Bully', 'Nilo', 'Male', 1, '2021-08-15', 'Marikina', 'storage/images/dog5.jpg', 2, 1, 15, '2021-08-15', 'Adopted', '2021-02-23'),
(6, 'Cat', 'Ragdoll', 'Pipe', 'Female', 1, '2021-09-15', 'Taguig', 'storage/images/dog6.png', 1, 3, 15, '2021-09-15', 'Adopted', '2021-03-10'),
(7, 'Dog', 'Doberman', 'Jigi', 'Male', 1, '2021-06-17', 'Mandaluyong', 'storage/images/doggy.jpg', 2, 1, NULL, '2021-06-17', 'Treatment', NULL),
(8, 'Dog', 'Chihuahua', 'Rex', 'Female', 1, '2021-07-17', 'Paranaque', 'storage/images/doggy.jpg', 4, 3, NULL, '2021-07-17', 'Treatment', NULL),
(9, 'Cat', 'Siamese', 'Tub', 'Female', 1, '2021-05-17', 'Marikina', 'storage/images/dog2.jpg', 1, 4, NULL, '2021-05-17', 'Treatment', NULL),
(10, 'Dog', 'Bully', 'Alden', 'Male', 1, '2021-05-17', 'Taguig', 'storage/images/dog4.jpg', 2, 4, NULL, '2021-05-17', 'Rehabilitated', NULL),
(11, 'Dog', 'Bulldog', 'Tam', 'Male', 1, '2021-05-17', 'Makati', 'storage/images/dog4.jpg', 1, 1, NULL, '2021-05-17', 'Rehabilitated', NULL),
(12, 'Cat', 'British Shorthairs', 'Taba', 'Female', 1, '2021-10-17', 'Pasig', 'storage/images/dog4.jpg', NULL, NULL, NULL, '2021-10-17', 'Treatment', NULL),
(13, 'Dog', 'Shiba Inu', 'Fax', 'Male', 1, '2021-09-17', 'Taguig', 'storage/images/dog4.jpg', 4, 4, NULL, '2021-09-17', 'Treatment', NULL),
(14, 'Cat', 'Birman', 'Pico', 'Male', 1, '2021-04-17', 'Mandaluyong', 'storage/images/dog4.jpg', 3, 4, 17, '2021-04-17', 'Adopted', '2021-02-09'),
(15, 'Cat', 'Ragamuffin', 'Jelly', 'Female', 1, '2021-08-17', 'Marikina', 'storage/images/doggy.jpg', 1, 4, 16, '2021-08-17', 'Adopted', '2021-02-24'),
(16, 'Cat', 'Himalayan', 'Vagi', 'Female', 1, '2021-04-17', 'Paranaque', 'storage/images/dog2.jpg', 2, 3, 17, '2021-04-17', 'Adopted', '2021-02-12'),
(17, 'Dog', 'Pomeranian', 'Dick', 'Male', 1, '2021-08-17', 'Pasig', 'storage/images/dog6.png', 1, 4, 16, '2021-08-17', 'Adopted', '2021-03-27'),
(18, 'Dog', 'Siberian Husky', 'Hush', 'Female', 1, '2021-09-17', 'Taguig', 'storage/images/doggy.jpg', 4, 1, 18, '2021-09-17', 'Adopted', '2021-03-19'),
(37, 'Dog', 'Golden Retriever', 'Barney', 'Male', 1, '2021-08-28', 'Taguig', 'storage/images/dog2.jpg', 2, 1, NULL, '2021-08-28', 'Rehabilitated', NULL),
(38, 'Cat', 'Persian', 'Boy', 'Female', 1, '2021-09-03', 'Taguig', 'storage/images/dog6.png', 1, 3, NULL, '2021-09-03', 'Rehabilitated', NULL),
(39, 'Dog', 'American Bully', 'Matt', 'Male', 2, '2022-01-13', 'Taguig', 'storage/images/dog6.png', 4, 1, NULL, '2022-01-07', 'Treatment', '2021-01-13'),
(41, 'Dog', 'Corgi', 'Lilywonder', 'Female', 1, '2022-01-03', 'Makati City', 'storage/images/dog6.png', NULL, NULL, NULL, '2022-01-06', 'Rehabilitated', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `animal_condition`
--

CREATE TABLE `animal_condition` (
  `animal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `disease_injury_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_condition`
--

INSERT INTO `animal_condition` (`animal_id`, `disease_injury_id`) VALUES
(1, 2),
(7, 2),
(7, 3),
(8, 3),
(8, 4),
(9, 1),
(10, 2),
(11, 2),
(12, 3),
(13, 4),
(39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `animal_log`
--

CREATE TABLE `animal_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `animal_id` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animal_log`
--

INSERT INTO `animal_log` (`id`, `animal_id`, `created_at`, `updated_at`) VALUES
(1, 37, '2021-08-27 23:40:32', '2021-08-27 23:40:32'),
(2, 38, '2021-09-02 16:36:08', '2021-09-02 16:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commenter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commenter_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 1,
  `child_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commenter_id`, `commenter_type`, `guest_name`, `guest_email`, `commentable_type`, `commentable_id`, `comment`, `approved`, `child_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Animal', '3', 'Nice!', 1, NULL, '2021-08-26 16:06:30', '2021-08-25 02:47:37', '2021-08-26 16:06:30'),
(2, NULL, NULL, 'Guest', 'guest@test.com', 'App\\Models\\Animal', '3', 'Let\'s go!', 1, NULL, '2021-08-26 16:06:30', '2021-08-25 03:04:56', '2021-08-26 16:06:30'),
(12, NULL, NULL, 'wtf', 'wtfhahaha@gmail.com', 'App\\Models\\Animal', '4', 'wtf so cute', 1, NULL, NULL, '2022-01-03 18:00:17', '2022-01-03 18:00:17'),
(13, NULL, NULL, 'Matt Libres', 'mattyoupete@gmail.com', 'App\\Models\\Animal', '1', 'Cute amwala', 1, NULL, NULL, '2022-01-04 21:54:31', '2022-01-04 21:54:31'),
(14, '23', 'App\\Models\\User', NULL, NULL, 'App\\Models\\Animal', '1', 'Anessd', 1, NULL, NULL, '2022-01-04 23:56:35', '2022-01-04 23:56:35'),
(15, NULL, NULL, 'John', 'john@gmail.com', 'App\\Models\\Animal', '1', 'comment', 1, NULL, NULL, '2022-01-05 18:21:43', '2022-01-05 18:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `disease_injuries`
--

CREATE TABLE `disease_injuries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dis_inj` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disease_injuries`
--

INSERT INTO `disease_injuries` (`id`, `type`, `dis_inj`, `description`) VALUES
(1, 'Injury', 'Chokingss', 'Swallowed Object'),
(2, 'Disease', 'Rabies', 'Brain and spinal cord'),
(3, 'Disease', 'Diabetes', 'Lack hormone insulin'),
(4, 'Injury', 'Tail', 'Bitten'),
(29, 'Injury', 'Tail Slap', '+1 Energy'),
(30, 'Disease', 'Numbing Lechon', 'No turn'),
(36, 'Disease', 'Disease', 'Edit');

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
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'Hello', 'hello@test.com', '123', 'Hi', 'How');

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
(4, '2021_04_23_055720_rescuers', 1),
(5, '2021_04_23_055734_adopters', 1),
(6, '2021_04_23_055748_disease_injuries', 1),
(7, '2021_04_23_060157_shelter_personnels', 1),
(8, '2021_04_23_060158_animals', 1),
(9, '2021_05_06_080815_create_inquiries_table', 1),
(10, '2018_06_30_113500_create_comments_table', 2),
(11, '2021_08_28_053542_create_animal_logs_table', 3);

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
-- Table structure for table `rescuers`
--

CREATE TABLE `rescuers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_fname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_lname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rescuers`
--

INSERT INTO `rescuers` (`id`, `image`, `r_fname`, `r_lname`, `address`, `phone`, `user_id`) VALUES
(1, 'storage/images/resc1.png', 'Alexis', 'Jonathan', 'Taguig', 857575575, NULL),
(2, 'storage/images/resc2.png', 'Lilian', 'Korina', 'Makati', 12232345, NULL),
(3, 'storage/images/resc3.png', 'Beast', 'Pure', 'Mandaluyong', 67744322, NULL),
(4, 'storage/images/resc4.png', 'Gurl', 'Rescuer', 'Marikina', 9666363, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shelter_personnels`
--

CREATE TABLE `shelter_personnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_fname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_lname` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelter_personnels`
--

INSERT INTO `shelter_personnels` (`id`, `image`, `p_fname`, `p_lname`, `job_description`, `address`, `phone`, `user_id`) VALUES
(1, 'storage/images/employee4.png', 'Mike', 'Mendez', 'Employee', 'Taguig', 97565223, NULL),
(2, 'storage/images/employee1.png', 'Pablo', 'Job', 'Veterinarian', 'Makati', 957652752, NULL),
(3, 'storage/images/employee2.png', 'Mia', 'Lore', 'Volunteer', 'Marikina', 9646432, NULL),
(4, 'storage/images/employee3.png', 'Jordan', 'Tagalog', 'Employee', 'Mandaluyong', 967934421, 4),
(10, 'storage/images/employee3.png', 'Jayron', 'Samsoung', 'Veterinarian', 'tagiosaf', 924252521, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isBan` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `isBan`) VALUES
(1, 'admin', 'admin@test.com', '2021-08-27 17:38:10', '$2y$10$CfXZhiqni18TIK32E5pSSefy5Tuw4k7XvStP6yVgfpclc95zo3Yvy', NULL, '2021-08-15 01:32:30', '2021-08-15 01:32:30', 'admin', 0),
(3, 'Jaja Cool', 'rescuer@test.com', '2021-08-27 17:38:10', '$2y$10$bP.1khL6Qjfw.DZB2EBRhugSu9ht4FHaWlnUKUWhZywIjE39xSV2m', NULL, '2021-08-15 02:45:41', '2021-08-27 19:15:47', 'rescuer', 0),
(4, 'Kiki Bolt', 'employee@test.com', '2021-08-27 17:38:10', '$2y$10$PG.CxOi/li0cEqFXV9FLJOTDlBjLaXJfdwQVAUY5EaFUt4prngt9C', NULL, '2021-08-15 02:49:54', '2021-08-27 19:16:54', 'employee', 0),
(5, 'Pipo Bull', 'adopter@test.com', '2021-08-27 17:38:10', '$2y$10$qBVOsy/MPYjcX/im6T5E0u9r0pqW2O0u83Tr1uTETAN7VDSs6RaUi', NULL, '2021-08-15 07:32:40', '2021-08-27 19:19:57', 'adopter', 0),
(18, 'Lanz Castillo', 'lanzlaurence.castillo@tup.edu.ph', '2021-08-27 17:38:10', '$2y$10$EHT7.pnvFJAJuCf1kH1IKen7IjbVduS6B9BAKpL1vwW/tgg3bAECe', NULL, '2021-08-27 17:37:34', '2021-08-27 17:40:59', 'adopter', 0),
(21, 'Koko Max', 'koko@test.com', '2021-09-02 16:33:57', '$2y$10$nirLPkrIDM9.9W4kNOoxm.jCBvgTrRX4qgdVVh21vlLF7bQmCEJ2i', NULL, '2021-09-02 16:33:35', '2021-09-02 16:33:57', 'adopter', 0),
(22, 'Jang', 'jang@gmail.com', NULL, '$2y$10$nNlxNx5CrpqZQch8tnKFKOEfjuZpOIb1yEZgpPpVaTrS54eVwxoYW', NULL, '2021-11-26 06:23:06', '2021-11-26 06:23:06', NULL, 0),
(23, 'Caleb Roem', 'user@useradmin.company', NULL, '$2y$10$4fUcfih.HRLCBoaDlGHPveqKbIgf/M28zpJkYLYoY/wsqg5iVyrpa', NULL, '2022-01-02 23:28:12', '2022-01-02 23:28:12', 'adopter', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopters`
--
ALTER TABLE `adopters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animals_rescuer_id_foreign` (`rescuer_id`),
  ADD KEY `animals_personnel_id_foreign` (`personnel_id`),
  ADD KEY `animals_adopter_id_foreign` (`adopter_id`);

--
-- Indexes for table `animal_condition`
--
ALTER TABLE `animal_condition`
  ADD KEY `animal_condition_animal_id_foreign` (`animal_id`),
  ADD KEY `animal_condition_disease_injury_id_foreign` (`disease_injury_id`);

--
-- Indexes for table `animal_log`
--
ALTER TABLE `animal_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commenter_id_commenter_type_index` (`commenter_id`,`commenter_type`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_child_id_foreign` (`child_id`);

--
-- Indexes for table `disease_injuries`
--
ALTER TABLE `disease_injuries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rescuers`
--
ALTER TABLE `rescuers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelter_personnels`
--
ALTER TABLE `shelter_personnels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopters`
--
ALTER TABLE `adopters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `animal_log`
--
ALTER TABLE `animal_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `disease_injuries`
--
ALTER TABLE `disease_injuries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rescuers`
--
ALTER TABLE `rescuers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shelter_personnels`
--
ALTER TABLE `shelter_personnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_adopter_id_foreign` FOREIGN KEY (`adopter_id`) REFERENCES `adopters` (`id`),
  ADD CONSTRAINT `animals_personnel_id_foreign` FOREIGN KEY (`personnel_id`) REFERENCES `shelter_personnels` (`id`),
  ADD CONSTRAINT `animals_rescuer_id_foreign` FOREIGN KEY (`rescuer_id`) REFERENCES `rescuers` (`id`);

--
-- Constraints for table `animal_condition`
--
ALTER TABLE `animal_condition`
  ADD CONSTRAINT `animal_condition_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `animal_condition_disease_injury_id_foreign` FOREIGN KEY (`disease_injury_id`) REFERENCES `disease_injuries` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
