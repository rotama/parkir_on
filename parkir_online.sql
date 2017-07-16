-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2017 at 07:04 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_rek` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `atas_nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nm_bank` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `no_rek`, `atas_nama`, `nm_bank`, `created_at`, `updated_at`) VALUES
(1, '3247094843', 'Parkir Online', 'BCA', '2017-07-16 09:46:43', '2017-07-16 09:46:43'),
(2, '3857594937', 'Parkir Online', 'BRI', '2017-07-16 09:46:43', '2017-07-16 09:46:43'),
(3, '9585749404', 'Parkir Online', 'Danamon', '2017-07-16 09:46:43', '2017-07-16 09:46:43'),
(4, '9474834950', 'Parkir Online', 'Mandiri', '2017-07-16 09:46:43', '2017-07-16 09:46:43'),
(5, '9048473948', 'Parkir Online', 'Bank BJB', '2017-07-16 09:46:43', '2017-07-16 09:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_trans` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `parkir_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `perawatan` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `kode_trans`, `tgl_booking`, `parkir_id`, `user_id`, `perawatan`, `tgl_keluar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trans-000001', '2017-07-14 05:00:00', 1, 2, 'Ya', '2017-07-16 18:00:00', 'Sudah Transfer', NULL, NULL),
(2, 'Trans-000002', '2017-07-17 23:00:00', 7, 2, 'Ya', '2017-07-21 05:00:00', 'Sudah Transfer', NULL, NULL),
(3, 'Trans-000003', '2017-07-12 12:00:00', 8, 2, 'Tidak', '2017-07-20 08:00:00', 'Sudah Transfer', NULL, NULL),
(4, 'Trans-000004', '2017-07-09 04:00:00', 1, 2, 'Tidak', '2017-07-14 14:00:00', 'Keluar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bukti_trans`
--

CREATE TABLE `bukti_trans` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `gambar` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bukti_trans`
--

INSERT INTO `bukti_trans` (`id`, `tgl_upload`, `booking_id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '2017-07-16 04:47:55', 1, 'efe98495fbfc72dc6dba0c1458c42b88.png', NULL, NULL),
(2, '2017-07-16 04:55:56', 2, 'a55111a6ff9d2ee0eb681877a694e38e.jpg', NULL, NULL),
(3, '2017-07-16 04:57:17', 3, 'f7c7c0c5c7f1e45a22bbdbd11188b91c.jpg', NULL, NULL),
(4, '2017-07-16 04:58:43', 4, '25e867e119680ca2934d38a31f7c523b.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dendas`
--

CREATE TABLE `dendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga` double UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dendas`
--

INSERT INTO `dendas` (`id`, `harga`, `created_at`, `updated_at`) VALUES
(1, 5000, '2017-07-16 09:46:43', '2017-07-16 09:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `keluars`
--

CREATE TABLE `keluars` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_kel` datetime NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `keterlambatan` int(11) NOT NULL,
  `denda` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keluars`
--

INSERT INTO `keluars` (`id`, `tgl_kel`, `booking_id`, `keterlambatan`, `denda`) VALUES
(1, '2017-07-16 23:48:50', 1, 0, 0),
(2, '2017-07-16 23:56:23', 2, 0, 0),
(3, '2017-07-16 23:57:43', 3, 0, 0),
(4, '2017-07-16 23:59:18', 4, 2, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(191, '2014_10_12_000000_create_users_table', 1),
(192, '2014_10_12_100000_create_password_resets_table', 1),
(193, '2017_06_07_061339_laratrust_setup_tables', 1),
(194, '2017_06_07_063556_create_parking_table', 1),
(195, '2017_06_07_063713_create_dend_table', 1),
(196, '2017_06_07_063834_create_rawat_table', 1),
(197, '2017_06_07_063943_create_book_table', 1),
(198, '2017_06_15_121023_create_bukti_trans_table', 1),
(199, '2017_06_18_053312_create_keluar_table', 1),
(200, '2017_07_14_012457_create_banks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parkirs`
--

CREATE TABLE `parkirs` (
  `id` int(10) UNSIGNED NOT NULL,
  `slot` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `harga` double UNSIGNED NOT NULL,
  `posisi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parkirs`
--

INSERT INTO `parkirs` (`id`, `slot`, `harga`, `posisi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'R01', 10000, 'Lantai 1', 'Available', '2017-07-16 09:46:41', '2017-07-16 09:46:41'),
(2, 'R02', 10000, 'Lantai 1', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42'),
(3, 'R03', 10000, 'Lantai 1', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42'),
(4, 'R04', 15000, 'Lantai 2', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42'),
(5, 'R05', 15000, 'Lantai 2', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42'),
(6, 'R06', 15000, 'Lantai 2', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42'),
(7, 'R07', 20000, 'Lantai 3', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42'),
(8, 'R08', 20000, 'Lantai 3', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42'),
(9, 'R09', 20000, 'Lantai 3', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42'),
(10, 'R10', 20000, 'Lantai 3', 'Available', '2017-07-16 09:46:42', '2017-07-16 09:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perawatans`
--

CREATE TABLE `perawatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `harga` double NOT NULL,
  `servis` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `perawatans`
--

INSERT INTO `perawatans` (`id`, `harga`, `servis`, `created_at`, `updated_at`) VALUES
(1, 10000, 'Cuci 1X sehari, Tune Up 1x sehari', '2017-07-16 09:46:43', '2017-07-16 09:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2017-07-16 09:46:40', '2017-07-16 09:46:40'),
(2, 'member', 'Member', NULL, '2017-07-16 09:46:40', '2017-07-16 09:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$8u4MYgPNvJ04qVYYkErYN.gOVMcsv3VZNtZwfUzCbzy/AiMiEUbPe', NULL, '2017-07-16 09:46:40', '2017-07-16 09:46:40'),
(2, 'Sample Member', 'member@gmail.com', '$2y$10$ZO94CzTxRHQ3XV2U2YTKOOTVy8Km/DaPGUnkF0U1VGQnYUkZndTMe', NULL, '2017-07-16 09:46:40', '2017-07-16 09:46:40'),
(3, 'Saha', 'saha@gmail.com', '$2y$10$cCa2KCpgtmWLg.cct3xDMegnLe9Iqj19Em7AEpupSVrc4tsOcUVd6', NULL, '2017-07-16 09:46:41', '2017-07-16 09:46:41'),
(4, 'Ronaldo', 'ronaldo@gmail.com', '$2y$10$1lcNfExYuvPVbikgL8ZulOdx6kRsUp5rMJI8Cnm4bhsr7ZsIxzcvq', NULL, '2017-07-16 09:46:41', '2017-07-16 09:46:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_parkir_id_index` (`parkir_id`),
  ADD KEY `bookings_user_id_index` (`user_id`);

--
-- Indexes for table `bukti_trans`
--
ALTER TABLE `bukti_trans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bukti_trans_booking_id_index` (`booking_id`);

--
-- Indexes for table `dendas`
--
ALTER TABLE `dendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluars`
--
ALTER TABLE `keluars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluars_booking_id_index` (`booking_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkirs`
--
ALTER TABLE `parkirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perawatans`
--
ALTER TABLE `perawatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bukti_trans`
--
ALTER TABLE `bukti_trans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dendas`
--
ALTER TABLE `dendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `keluars`
--
ALTER TABLE `keluars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `parkirs`
--
ALTER TABLE `parkirs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `perawatans`
--
ALTER TABLE `perawatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_parkir_id_foreign` FOREIGN KEY (`parkir_id`) REFERENCES `parkirs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bukti_trans`
--
ALTER TABLE `bukti_trans`
  ADD CONSTRAINT `bukti_trans_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keluars`
--
ALTER TABLE `keluars`
  ADD CONSTRAINT `keluars_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
