-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 09:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lunarinia3`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(15, 'Letnja kolekcija', '1616523363.jpg', '2021-03-23 17:16:03', '2021-03-23 17:16:03'),
(16, 'Najnovija kolekcija', '1617649227.jpg', '2021-04-05 17:00:27', '2021-04-05 17:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` int(11) NOT NULL DEFAULT 1,
  `available_to_make` int(11) DEFAULT 1,
  `collection_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `product_id`, `name`, `price`, `discount`, `image`, `description`, `in_stock`, `available_to_make`, `collection_id`, `created_at`, `updated_at`) VALUES
(30, 11, 'Merkur', 1850, 0, '[\"detelina1.jpg\",\"detelina2.jpg\",\"detelina3.jpg\",\"detelina4.jpg\"]', 'Merkur je smisao zimske carolije blablabla...', 1, 1, 15, '2021-03-21 17:32:42', '2021-03-22 05:28:41'),
(31, 11, 'Pero', 1400, 0, '[\"pero1.jpg\",\"pero2.jpg\",\"pero3.jpg\",\"pero4.jpg\"]', 'Pero  je oznaka zivotinjskog carstva...', 0, 1, 15, '2021-03-21 17:34:58', '2021-04-07 10:10:02'),
(32, 11, 'Detelina', 1900, 0, '[\"merkur1.jpg\",\"merkur2.jpg\",\"merkur3.jpg\",\"merkur4.jpg\"]', 'Detelina je smisao trave i prirode...', 1, 0, 15, '2021-03-21 17:42:04', '2021-04-01 16:01:42'),
(33, 11, 'Sunce i mesec', 2300, 0, '[\"zagrljaj_sunca_i_meseca.jpg\"]', 'Njih dvoje cini mnogo toga zajedno...', 0, 1, 15, '2021-03-21 17:43:05', '2021-04-07 10:29:50'),
(66, 11, 'Merkur', 1850, 0, '[\"detelina1.jpg\",\"detelina2.jpg\",\"detelina3.jpg\",\"detelina4.jpg\"]', 'Merkur je smisao zimske carolije blablabla...', 1, 1, 16, '2021-03-21 17:32:42', '2021-03-22 05:28:41'),
(67, 11, 'Pero', 1400, 0, '[\"pero1.jpg\",\"pero2.jpg\",\"pero3.jpg\",\"pero4.jpg\"]', 'Pero  je oznaka zivotinjskog carstva...', 0, 1, 16, '2021-03-21 17:34:58', '2021-04-07 10:10:02'),
(68, 11, 'Detelina', 1900, 0, '[\"merkur1.jpg\",\"merkur2.jpg\",\"merkur3.jpg\",\"merkur4.jpg\"]', 'Detelina je smisao trave i prirode...', 0, 0, 16, '2021-03-21 17:42:04', '2021-04-01 16:01:42'),
(69, 11, 'Sunce i mesec', 2300, 0, '[\"zagrljaj_sunca_i_meseca.jpg\"]', 'Njih dvoje cini mnogo toga zajedno...', 0, 1, 16, '2021-03-21 17:43:05', '2021-04-08 09:27:01'),
(70, 12, 'slika1', 1850, 0, '[\"detelina1.jpg\",\"detelina2.jpg\",\"detelina3.jpg\",\"detelina4.jpg\"]', 'Merkur je smisao zimske carolije blablabla...', 1, 1, 16, '2021-03-21 17:32:42', '2021-03-22 05:28:41'),
(71, 12, 'slika2', 1400, 0, '[\"pero1.jpg\",\"pero2.jpg\",\"pero3.jpg\",\"pero4.jpg\"]', 'Pero  je oznaka zivotinjskog carstva...', 0, 1, 16, '2021-03-21 17:34:58', '2021-04-07 10:10:02'),
(72, 12, 'slika33', 1900, 0, '[\"merkur1.jpg\",\"merkur2.jpg\",\"merkur3.jpg\",\"merkur4.jpg\"]', 'Detelina je smisao trave i prirode...', 0, 0, 16, '2021-03-21 17:42:04', '2021-04-01 16:01:42'),
(73, 12, 'slika4', 2300, 0, '[\"zagrljaj_sunca_i_meseca.jpg\"]', 'Njih dvoje cini mnogo toga zajedno...', 0, 1, 16, '2021-03-21 17:43:05', '2021-04-07 10:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `main_collections`
--

CREATE TABLE `main_collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_collections`
--

INSERT INTO `main_collections` (`id`, `name`, `collection_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Najnovija kolekcija', 16, '1617649227.jpg', NULL, '2021-04-05 17:00:35');

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
(4, '2021_01_25_133556_create_carts_table', 2),
(5, '2021_01_25_133945_create_collections_table', 2),
(6, '2021_01_25_134026_create_items_table', 2),
(7, '2021_01_25_134300_create_orders_table', 2),
(8, '2021_01_25_135844_create_products_table', 2),
(9, '2021_02_11_101615_create_main_collection_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_and_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `firstname`, `lastname`, `email`, `phone`, `country`, `city_and_zipcode`, `street_number`, `payment`, `items`, `created_at`, `updated_at`) VALUES
(205, 35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', 'preko računa', '[{\"id\":33,\"user_id\":null,\"name\":\"Sunce i mesec\",\"price\":2300,\"discount\":0,\"image\":\"[\\\"zagrljaj_sunca_i_meseca.jpg\\\"]\",\"in_stock\":0,\"description\":\"Njih dvoje cini mnogo toga zajedno...\",\"quantity\":1},{\"id\":34,\"user_id\":null,\"name\":\"Saturn\",\"price\":3500,\"discount\":0,\"image\":\"[\\\"detelina1.jpg\\\",\\\"detelina2.jpg\\\",\\\"detelina3.jpg\\\",\\\"detelina4.jpg\\\"]\",\"in_stock\":1,\"description\":\"Merkur je smisao zimske carolije blablabla...\",\"quantity\":1}]', '2021-03-22 05:56:33', '2021-03-22 05:56:33'),
(206, 35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', 'preko računa', '[{\"id\":40,\"user_id\":null,\"name\":\"Detelina\",\"price\":1900,\"discount\":0,\"image\":\"[\\\"merkur1.jpg\\\",\\\"merkur2.jpg\\\",\\\"merkur3.jpg\\\",\\\"merkur4.jpg\\\"]\",\"in_stock\":1,\"description\":\"Detelina je smisao trave i prirode...\",\"quantity\":1},{\"id\":35,\"user_id\":null,\"name\":\"Sunce u zagrljaju\",\"price\":2300,\"discount\":0,\"image\":\"[\\\"zagrljaj_sunca_i_meseca.jpg\\\"]\",\"in_stock\":1,\"description\":\"Njih dvoje cini mnogo toga zajedno...\",\"quantity\":1}]', '2021-03-23 14:57:25', '2021-03-23 14:57:25'),
(207, 7375629, 'Dusan', 'Jankovic', 'djuki123@hotmail.com', '062 202775', 'Sirija', 'Svilajnac', 'Svetog Save 5', 'pouzećem', '[{\"id\":31,\"user_id\":null,\"name\":\"Pero\",\"price\":1400,\"discount\":0,\"image\":\"[\\\"pero1.jpg\\\",\\\"pero2.jpg\\\",\\\"pero3.jpg\\\",\\\"pero4.jpg\\\"]\",\"in_stock\":1,\"description\":\"Pero  je oznaka zivotinjskog carstva...\",\"quantity\":1}]', '2021-03-30 12:24:20', '2021-03-30 12:24:20'),
(208, 27, 'Dusan', 'Simic', 'dusansimic202@gmail.com', '0644001351', 'Srbija', 'Svilajnac', 'Svetog save', 'pouzećem', '[{\"id\":42,\"user_id\":null,\"name\":\"De si bre\",\"price\":2000,\"discount\":0,\"image\":\"[\\\"p.jpg\\\"]\",\"in_stock\":1,\"description\":\"blabla\",\"quantity\":1}]', '2021-03-30 18:03:21', '2021-03-30 18:03:21'),
(209, 27, 'Dusan', 'Simic', 'dusansimic202@gmail.com', '0644001351', 'Srbija', 'Svilajnac', 'Svetog save', 'preko računa', '[{\"id\":42,\"user_id\":null,\"name\":\"De si bre\",\"price\":2000,\"discount\":0,\"image\":\"[\\\"p.jpg\\\"]\",\"in_stock\":0,\"description\":\"blabla\",\"quantity\":1}]', '2021-03-30 18:04:52', '2021-03-30 18:04:52'),
(210, 35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', 'pouzećem', '[{\"id\":32,\"user_id\":null,\"name\":\"Detelina\",\"price\":1900,\"discount\":0,\"image\":\"[\\\"merkur1.jpg\\\",\\\"merkur2.jpg\\\",\\\"merkur3.jpg\\\",\\\"merkur4.jpg\\\"]\",\"in_stock\":2,\"description\":\"Detelina je smisao trave i prirode...\",\"quantity\":1},{\"id\":33,\"user_id\":null,\"name\":\"Sunce i mesec\",\"price\":2300,\"discount\":0,\"image\":\"[\\\"zagrljaj_sunca_i_meseca.jpg\\\"]\",\"in_stock\":1,\"description\":\"Njih dvoje cini mnogo toga zajedno...\",\"quantity\":1}]', '2021-04-01 15:04:52', '2021-04-01 15:04:52'),
(211, 35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', 'pouzećem', '[{\"id\":32,\"user_id\":null,\"name\":\"Detelina\",\"price\":1900,\"discount\":0,\"image\":\"[\\\"merkur1.jpg\\\",\\\"merkur2.jpg\\\",\\\"merkur3.jpg\\\",\\\"merkur4.jpg\\\"]\",\"in_stock\":2,\"description\":\"Detelina je smisao trave i prirode...\",\"quantity\":1},{\"id\":33,\"user_id\":null,\"name\":\"Sunce i mesec\",\"price\":2300,\"discount\":0,\"image\":\"[\\\"zagrljaj_sunca_i_meseca.jpg\\\"]\",\"in_stock\":1,\"description\":\"Njih dvoje cini mnogo toga zajedno...\",\"quantity\":1}]', '2021-04-01 15:05:22', '2021-04-01 15:05:22'),
(212, 35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', 'preko računa', '[{\"id\":31,\"user_id\":null,\"name\":\"Pero\",\"price\":1400,\"discount\":0,\"image\":\"[\\\"pero1.jpg\\\",\\\"pero2.jpg\\\",\\\"pero3.jpg\\\",\\\"pero4.jpg\\\"]\",\"in_stock\":2,\"description\":\"Pero  je oznaka zivotinjskog carstva...\",\"quantity\":2},{\"id\":32,\"user_id\":null,\"name\":\"Detelina\",\"price\":1900,\"discount\":0,\"image\":\"[\\\"merkur1.jpg\\\",\\\"merkur2.jpg\\\",\\\"merkur3.jpg\\\",\\\"merkur4.jpg\\\"]\",\"in_stock\":2,\"description\":\"Detelina je smisao trave i prirode...\",\"quantity\":2}]', '2021-04-01 16:01:42', '2021-04-01 16:01:42'),
(213, 35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', 'preko računa', '[{\"id\":31,\"user_id\":null,\"name\":\"Pero\",\"price\":1400,\"discount\":0,\"image\":\"[\\\"pero1.jpg\\\",\\\"pero2.jpg\\\",\\\"pero3.jpg\\\",\\\"pero4.jpg\\\"]\",\"in_stock\":1,\"description\":\"Pero  je oznaka zivotinjskog carstva...\",\"quantity\":1}]', '2021-04-07 10:10:02', '2021-04-07 10:10:02'),
(214, 35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', 'pouzećem', '[{\"id\":33,\"user_id\":null,\"name\":\"Sunce i mesec\",\"price\":2300,\"discount\":0,\"image\":\"[\\\"zagrljaj_sunca_i_meseca.jpg\\\"]\",\"in_stock\":1,\"description\":\"Njih dvoje cini mnogo toga zajedno...\",\"quantity\":1}]', '2021-04-07 10:29:50', '2021-04-07 10:29:50'),
(215, 35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', 'preko računa', '[{\"id\":69,\"user_id\":null,\"name\":\"Sunce i mesec\",\"price\":2300,\"discount\":0,\"image\":\"[\\\"zagrljaj_sunca_i_meseca.jpg\\\"]\",\"in_stock\":0,\"description\":\"Njih dvoje cini mnogo toga zajedno...\",\"quantity\":1}]', '2021-04-08 09:27:01', '2021-04-08 09:27:01');

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
('dusansimic202@gmail.com', '$2y$10$kJ.ayEyqV6Eto1mvmLu8V..lEOEf8tTD5YHr74BX9lm6QgRhh84k6', '2021-03-20 14:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(11, 'Ogrlice', '1616351452.jpg', '2021-03-21 17:30:52', '2021-03-21 17:30:52'),
(12, 'Umetnicke slike', '1617872315.jpg', '2021-04-08 06:58:35', '2021-04-08 06:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_and_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `country`, `city_and_zipcode`, `street_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(27, 'Dusan', 'Simic', 'dusansimic202@gmail.com', '0644001351', 'Srbija', 'Svilajnac', 'Svetog save', NULL, '$2y$10$82C2ILLlHiSjclxnZUMlxedoRoOUJsVE79rEDEPmSnnWus./w2XBq', NULL, '2021-01-28 10:44:26', '2021-01-28 10:44:26'),
(35, 'Dusko', 'Simic', 'dulija@hotmail.com', '06454545787', 'Srbija', 'Jagodin', 'Svetog hrista 4', NULL, '$2y$10$Mze01wkUZD965oZkG1eNmObIListng/c65442I0EF71V.aEe9hm4u', 'SxY9OYew59uzr8KJhz5agIWLbxKyjNzh96s8qj80ORLnG3JGvj9jgoq9HsSP', '2021-01-29 17:36:56', '2021-03-21 15:12:38'),
(36, 'Nikola', 'Vujanic', 'vuja@gmail.com', '06451545454', 'Srbija', 'Beograd', 'svetog Save 66', NULL, '$2y$10$fjcBHmQQdvIyMD0s2aCNu.94JaXbePKkDOq3GAgKyFXWr9Xa9m6q6', NULL, '2021-02-10 13:11:51', '2021-02-10 13:11:51'),
(37, 'Dusan', 'Kecman', 'kecman@gmail.com', '0654411231', 'Srbija', 'Beograd', 'Knez Mihailova 88', NULL, '$2y$10$LSCPSwub5b9G15HT86JGpOTMZMrYXl/GEARifAyPiJgL7SAS6hzvm', NULL, '2021-03-25 17:40:36', '2021-03-25 17:40:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_collections`
--
ALTER TABLE `main_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `main_collections`
--
ALTER TABLE `main_collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
